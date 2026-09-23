@extends('layouts.portal')

@section('title', 'Manage Dispensary Orders - ZOVI LEAF')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-box-seam me-1"></i> Pharmacy Dispatch</span>
            <span class="badge bg-success bg-opacity-10 text-success border border-success">Australia Post Express</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">Dispensary Fulfillment & Orders</h2>
        <p class="text-muted small mb-0">Track pharmacy compounding, prescription verification, and update Australia Post tracking.</p>
    </div>
    <div class="d-flex bg-white p-1 rounded-3 border shadow-xs gap-1">
        <a href="{{ route('admin.orders', ['status' => 'all']) }}" class="btn btn-sm px-3 fw-semibold {{ (!$status || $status == 'all') ? 'btn-brand-primary' : 'btn-light text-muted' }}">All Orders</a>
        <a href="{{ route('admin.orders', ['status' => 'processing']) }}" class="btn btn-sm px-3 fw-semibold {{ $status == 'processing' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Processing</a>
        <a href="{{ route('admin.orders', ['status' => 'dispatched']) }}" class="btn btn-sm px-3 fw-semibold {{ $status == 'dispatched' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Dispatched</a>
        <a href="{{ route('admin.orders', ['status' => 'delivered']) }}" class="btn btn-sm px-3 fw-semibold {{ $status == 'delivered' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Delivered</a>
    </div>
</div>

<div class="table-container-vip p-4">
    <div class="table-responsive">
        <table class="table table-vip align-middle">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Patient / Address</th>
                    <th>Dispensed Formulations</th>
                    <th>Amount</th>
                    <th>Tracking</th>
                    <th class="text-end">Fulfillment Controls</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>
                            <span class="fw-bold text-brand-contrast font-monospace">{{ $order->order_number }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-brand-contrast">{{ $order->created_at->format('d M Y') }}</div>
                            <div class="text-muted" style="font-size: 0.72rem;">{{ $order->created_at->format('h:i A') }}</div>
                        </td>
                        <td>
                            <div class="fw-bold text-brand-contrast">{{ $order->shipping_name }}</div>
                            <div class="text-muted" style="font-size: 0.75rem;"><i class="bi bi-geo-alt me-1"></i>{{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_postcode }}</div>
                        </td>
                        <td>
                            @foreach($order->items as $item)
                                <div class="small fw-semibold text-brand-contrast d-flex align-items-center gap-1 mb-1">
                                    <span class="badge bg-light text-dark border">&times;{{ $item->quantity }}</span>
                                    <span>{{ $item->product_name }}</span>
                                </div>
                            @endforeach
                        </td>
                        <td>
                            <span class="fw-bold text-brand-primary num-font fs-6">${{ number_format($order->total_amount, 2) }}</span>
                            <div class="text-muted" style="font-size: 0.7rem;">Paid &bull; Stripe</div>
                        </td>
                        <td>
                            @if($order->tracking_number)
                                <span class="badge bg-light text-dark border font-monospace" style="font-size: 0.72rem;">
                                    <i class="bi bi-truck me-1 text-brand-primary"></i> {{ $order->tracking_number }}
                                </span>
                            @else
                                <span class="badge-vip badge-vip-secondary" style="font-size: 0.7rem;">Pending Dispatch</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" class="d-inline-flex align-items-center justify-content-end gap-1">
                                @csrf
                                <select name="status" class="form-select form-select-sm" style="width: 120px; font-size: 0.78rem;">
                                    <option value="pending_approval" {{ $order->status == 'pending_approval' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="dispatched" {{ $order->status == 'dispatched' ? 'selected' : '' }}>Dispatched</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <input type="text" name="tracking_number" class="form-control form-control-sm font-monospace" placeholder="AusPost Tracking" value="{{ $order->tracking_number }}" style="width: 130px; font-size: 0.78rem;">
                                <button type="submit" class="btn btn-sm btn-brand-primary" title="Update Fulfillment"><i class="bi bi-check2"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">No dispensary orders found for this filter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($orders->hasPages())
        <div class="mt-4 pt-3 border-top">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection