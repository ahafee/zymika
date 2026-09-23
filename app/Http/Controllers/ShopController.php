<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $search = $request->get('search');

        $query = Product::where('is_active', true);

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('terpene_profile', 'like', "%{$search}%");
            });
        }

        $products = $query->paginate(9)->withQueryString();

        $categories = [
            'all' => 'All Formulations',
            'cbd_oil' => 'CBD Tinctures & Isolates',
            'balanced_extract' => 'Balanced 1:1 Formulations',
            'thc_oil' => 'High-THC Night Extracts',
            'medicinal_flower' => 'Dried Medical Flower',
            'vaporiser' => 'TGA Medical Devices',
        ];

        return view('pages.shop.index', compact('products', 'categories', 'category', 'search'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedProducts = Product::where('is_active', true)
            ->where('id', '!=', $product->id)
            ->where('category', $product->category)
            ->take(3)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::where('is_active', true)
                ->where('id', '!=', $product->id)
                ->take(3)
                ->get();
        }

        return view('pages.shop.show', compact('product', 'relatedProducts'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => (float) $product->price,
                'quantity' => (int) $request->quantity,
                'image' => $product->image,
                'form_factor' => $product->form_factor,
                'is_prescription_required' => $product->is_prescription_required,
                'tga_schedule' => $product->tga_schedule,
            ];
        }

        session()->put('cart', $cart);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'cart_count' => count($cart),
                'message' => "{$product->name} added to your cart.",
            ]);
        }

        return redirect()->route('shop.cart')->with('success', "{$product->name} added to your cart.");
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shipping = $subtotal > 0 ? 15.00 : 0.00;
        $total = $subtotal + $shipping;

        return view('pages.shop.cart', compact('cart', 'subtotal', 'shipping', 'total'));
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1|max:10',
        ]);

        $cart = session()->get('cart', []);

        foreach ($request->quantities as $id => $qty) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = (int) $qty;
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('shop.cart')->with('success', 'Cart updated successfully.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('shop.cart')->with('success', 'Product removed from cart.');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop.index')->with('warning', 'Your dispensary cart is currently empty.');
        }

        $subtotal = 0;
        $hasPrescriptionRequiredItems = false;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            if (! empty($item['is_prescription_required'])) {
                $hasPrescriptionRequiredItems = true;
            }
        }

        $shipping = 15.00;
        $total = $subtotal + $shipping;

        $user = Auth::user();
        $prescriptions = [];

        if ($user && $user->isPatient()) {
            $prescriptions = Prescription::where('patient_id', $user->id)
                ->where('status', 'active')
                ->where('expiry_date', '>=', now()->toDateString())
                ->get();
        }

        return view('pages.shop.checkout', compact('cart', 'subtotal', 'shipping', 'total', 'user', 'prescriptions', 'hasPrescriptionRequiredItems'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'payment_method' => 'required|in:card,medpay,direct_debit',
            'customer_notes' => 'nullable|string|max:1000',
            'card_number' => 'required_if:payment_method,card|nullable|string',
            'card_expiry' => 'required_if:payment_method,card|nullable|string',
            'card_cvc' => 'required_if:payment_method,card|nullable|string',
            'prescription_ack' => 'required|accepted',
        ]);

        $user = Auth::user();
        if (! $user) {
            $user = User::where('email', $validated['email'])->first();
            if (! $user) {
                $user = User::create([
                    'name' => $validated['first_name'].' '.$validated['last_name'],
                    'email' => $validated['email'],
                    'password' => Hash::make(Str::random(12)),
                    'role' => 'patient',
                    'phone' => $validated['phone'],
                    'address_line1' => $validated['address_line1'],
                    'city' => $validated['city'],
                    'state' => $validated['state'],
                    'postcode' => $validated['postcode'],
                ]);
            }
            Auth::login($user);
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shipping = 15.00;
        $total = $subtotal + $shipping;

        $orderNumber = 'ORD-ZOV-'.rand(10000, 99999);
        $trackingNumber = 'AP'.rand(10000000, 99999999).'AU';

        $order = Order::create([
            'order_number' => $orderNumber,
            'patient_id' => $user->id,
            'subtotal' => $subtotal,
            'shipping_amount' => $shipping,
            'discount_amount' => 0.00,
            'total_amount' => $total,
            'status' => 'processing',
            'payment_status' => 'paid',
            'payment_method' => $validated['payment_method'],
            'transaction_id' => 'tx_'.Str::random(16),
            'shipping_name' => $validated['first_name'].' '.$validated['last_name'],
            'shipping_phone' => $validated['phone'],
            'shipping_address_line1' => $validated['address_line1'],
            'shipping_address_line2' => $validated['address_line2'] ?? null,
            'shipping_city' => $validated['city'],
            'shipping_state' => $validated['state'],
            'shipping_postcode' => $validated['postcode'],
            'tracking_number' => $trackingNumber,
            'tracking_carrier' => 'Australia Post Express Medical (Signature Required)',
            'customer_notes' => $validated['customer_notes'] ?? null,
        ]);

        foreach ($cart as $item) {
            // Check if user has active prescription
            $activePrescription = Prescription::where('patient_id', $user->id)
                ->where('product_id', $item['id'])
                ->where('status', 'active')
                ->where('repeats_left', '>', 0)
                ->first();

            if ($activePrescription) {
                $activePrescription->decrement('repeats_left');
                if ($activePrescription->repeats_left <= 0) {
                    $activePrescription->update(['status' => 'exhausted']);
                }
            }

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'prescription_id' => $activePrescription?->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('shop.order-confirmation', ['order_number' => $order->order_number])
            ->with('success', 'Thank you! Your medicinal cannabis dispensary order has been placed and sent for compounding.');
    }

    public function orderConfirmation($orderNumber)
    {
        $order = Order::with(['items.product', 'patient'])
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return view('pages.shop.order-confirmation', compact('order'));
    }
}
