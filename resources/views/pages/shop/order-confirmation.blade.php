@extends('layouts.app')

@section('title', 'Order Confirmed - ZOVI LEAF')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-zovi p-4 p-md-5 border bg-white shadow text-center">
                <div class="bg-brand-sage-light text-brand-sage rounded-circle p-3 d-inline-flex mb-3">
                    <i class="bi bi-box2-heart-fill display-4"></i>
                </div>

                <span class="badge badge-tga mb-2">Order #{{ $order->order_number }}</span>
                <h2 class="display-6 fw-bold text-brand-contrast mb-2">Dispensary Order Confirmed!</h2>
                <p class="lead text-muted mb-4">
                    Thank you, <strong>{{ $order->shipping_name }}</strong>. Your medicinal cannabis order has been received and routed to our compounding pharmacy partner.
                </p>

                <!-- Order Details -->
                <div class="p-4 bg-brand-light rounded-3 text-start mb-4 border">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <span class="small text-muted">Order Number:</span>
                            <div class="fw-bold text-brand-contrast">{{ $order->order_number }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Payment Status:</span>
                            <div class="fw-bold text-success"><i class="bi bi-check-circle-fill"></i> Paid (${{ number_format($order->total_amount, 2) }})</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Australia Post Tracking:</span>
                            <div class="fw-bold text-brand-primary">{{ $order->tracking_number }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Shipping Method:</span>
                            <div class="fw-bold text-brand-contrast">{{ $order->tracking_carrier }}</div>
                        </div>
                        <div class="col-12 pt-2 border-top">
                            <span class="small text-muted">Delivery Address:</span>
                            <div class="fw-semibold text-brand-contrast">
                                {{ $order->shipping_address_line1 }}, {{ $order->shipping_city }} {{ $order->shipping_state }} {{ $order->shipping_postcode }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Items Ordered -->
                <div class="text-start mb-4">
                    <h6 class="fw-bold text-brand-contrast mb-3">Dispensed Items</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle small">
                            <thead class="bg-light">
                                <tr>
                                    <th>Item</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product_name }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-end">${{ number_format($item->price, 2) }}</td>
                                        <td class="text-end fw-bold text-brand-primary">${{ number_format($item->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('patient.orders') }}" class="btn btn-brand-primary">
                        View Order in Patient Portal <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('shop.index') }}" class="btn btn-outline-secondary">
                        Back to Dispensary
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection