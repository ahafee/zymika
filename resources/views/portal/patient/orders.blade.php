@extends('layouts.portal')

@section('title', 'My Dispensary Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">Dispensary Orders</h2>
        <p class="text-muted small mb-0">Track your medicinal cannabis orders and Australia Post Express deliveries.</p>
    </div>
    <a href="{{ route('shop.index') }}" class="btn btn-brand-primary">
        <i class="bi bi-bag-plus me-1"></i> Shop Dispensary
    </a>
</div>

<div class="card card-zovi p-4 bg-white border">
    @if($orders->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-box-seam fs-1 mb-2 d-block"></i>
            You have not placed any orders yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light small">
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Shipping Carrier & Tracking</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="fw-bold text-brand-contrast">{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>
                                @foreach($order->items as $item)
                                    <div class="small">&bull; {{ $item->product_name }} (&times;{{ $item->quantity }})</div>
                                @endforeach
                            </td>
                            <td>
                                <div class="fw-bold text-brand-primary">{{ $order->tracking_number }}</div>
                                <div class="small text-muted">{{ $order->tracking_carrier }}</div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $order->status == 'delivered' ? 'success' : ($order->status == 'dispatched' ? 'primary' : 'warning') }} text-capitalize">
                                    {{ str_replace('_', ' ', $order->status) }}
                                </span>
                            </td>
                            <td class="fw-bold text-brand-contrast">${{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection