@extends('layouts.app')

@section('title', 'Dispensary Shopping Cart - ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom">
    <div class="container text-center">
        <h1 class="display-5 fw-bold text-brand-contrast">Your Dispensary Cart</h1>
        <p class="lead text-muted max-w-700 mx-auto">Review your prescribed medications and medical devices.</p>
    </div>
</div>

<div class="container py-5">
    @if(empty($cart))
        <div class="text-center py-5 bg-white rounded-3 border card-zovi p-5">
            <i class="bi bi-bag-x fs-1 text-muted mb-3 d-block"></i>
            <h4 class="fw-bold text-brand-contrast">Your cart is currently empty</h4>
            <p class="text-muted small max-w-500 mx-auto mb-4">Browse our dispensary catalog or book a telehealth consult to receive your personalized prescription.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('shop.index') }}" class="btn btn-brand-primary">Explore Dispensary</a>
                <a href="{{ route('booking.index') }}" class="btn btn-outline-secondary">Book Consultation</a>
            </div>
        </div>
    @else
        <form action="{{ route('shop.cart.update') }}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="card card-zovi p-4 bg-white border mb-4">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr class="text-muted small">
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th style="width: 120px;">Quantity</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="bg-light p-2 rounded text-center" style="width: 44px; height: 44px;">
                                                        <i class="bi bi-capsule text-brand-primary fs-5"></i>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('shop.show', $item['slug']) }}" class="fw-bold text-brand-contrast text-decoration-none">
                                                            {{ $item['name'] }}
                                                        </a>
                                                        <div class="small text-muted">{{ $item['form_factor'] }}</div>
                                                        @if($item['is_prescription_required'])
                                                            <span class="badge bg-secondary small" style="font-size: 0.68rem;">Rx Required</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-semibold text-brand-contrast">
                                                ${{ number_format($item['price'], 2) }}
                                            </td>
                                            <td>
                                                <input type="number" name="quantities[{{ $item['id'] }}]" class="form-control form-control-sm text-center" value="{{ $item['quantity'] }}" min="1" max="10">
                                            </td>
                                            <td class="fw-bold text-brand-primary">
                                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('shop.cart.remove', $item['id']) }}" class="btn btn-sm text-danger" title="Remove item">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('shop.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Continue Browsing
                            </a>
                            <button type="submit" class="btn btn-sm btn-brand-outline">
                                <i class="bi bi-arrow-clockwise"></i> Update Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="col-lg-4">
                    <div class="card card-zovi p-4 bg-white border">
                        <h5 class="fw-bold text-brand-contrast mb-3">Order Summary</h5>

                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Items Subtotal:</span>
                            <span class="fw-semibold text-brand-contrast">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-3 pb-3 border-bottom small">
                            <span class="text-muted">Australia Post Express Medical Shipping:</span>
                            <span class="fw-semibold text-brand-contrast">${{ number_format($shipping, 2) }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="fs-5 fw-bold text-brand-contrast">Total:</span>
                            <span class="fs-4 fw-extrabold text-brand-primary">${{ number_format($total, 2) }}</span>
                        </div>

                        <a href="{{ route('shop.checkout') }}" class="btn btn-brand-primary btn-lg w-100 py-3 fw-bold shadow-sm">
                            Proceed to Secure Checkout <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                        <div class="text-center mt-3 small text-muted">
                            <i class="bi bi-shield-lock text-brand-sage"></i> 100% Discreet Packaging & Express Delivery
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection