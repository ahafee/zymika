@extends('layouts.portal')

@section('title', 'Patient Dashboard')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4" data-aos="fade-down">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <h2 class="fw-bold text-brand-contrast mb-0">Welcome, {{ $user->name }}</h2>
            <span class="badge-vip badge-vip-success"><i class="bi bi-shield-check me-1"></i> Patient Portal</span>
        </div>
        <p class="text-muted small mb-0">MediRecords Patient ID: <strong class="text-brand-primary">{{ $user->medirecords_patient_id ?? 'MR-'.strtoupper(substr(md5($user->id), 0, 8)) }}</strong> &bull; Active Care Plan</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('booking.index') }}" class="btn-vip-action btn-vip-primary">
            <i class="bi bi-calendar-plus me-1"></i> Book Consult
        </a>
        <a href="{{ route('shop.index') }}" class="btn-vip-action btn-vip-secondary">
            <i class="bi bi-bag me-1"></i> Dispensary
        </a>
    </div>
</div>

@if($preConsultPending)
    <div class="alert alert-warning d-flex align-items-center justify-content-between mb-4 border-warning shadow-sm" data-aos="zoom-in">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-exclamation-triangle-fill fs-3 text-warning"></i>
            <div>
                <strong class="d-block text-dark">Pre-Consult Health Assessment Form Required</strong>
                <div class="small text-muted">Please complete your Snapform clinical intake prior to your upcoming video consult with Dr. Batthala.</div>
            </div>
        </div>
        <a href="{{ route('patient.snapform', ['appointment_id' => $upcomingAppointment->id]) }}" class="btn btn-sm btn-dark px-3 fw-semibold">
            Complete Form Now <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>
@endif

<!-- Summary Cards -->
<div class="row g-4 mb-4">
    <!-- Next Consult -->
    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card-vip d-flex flex-column h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">Next Consultation</span>
                <span class="badge-vip badge-vip-primary"><i class="bi bi-camera-video"></i></span>
            </div>
            @if($upcomingAppointment)
                <h4 class="fw-bold text-brand-contrast mb-1">{{ $upcomingAppointment->appointment_date->format('d M Y') }}</h4>
                <div class="text-brand-primary fw-bold fs-5 mb-2">{{ date('h:i A', strtotime($upcomingAppointment->start_time)) }}</div>
                <div class="small text-muted mb-3"><i class="bi bi-person-check-fill text-brand-sage me-1"></i> {{ $upcomingAppointment->doctor->full_name }}</div>
                <a href="{{ $upcomingAppointment->video_meeting_url }}" target="_blank" class="btn-vip-action btn-vip-primary w-100 mt-auto text-center justify-content-center">
                    <i class="bi bi-camera-video me-1"></i> Join Telehealth Room
                </a>
            @else
                <div class="py-3 text-muted small">No upcoming consultations booked.</div>
                <a href="{{ route('booking.index') }}" class="btn-vip-action btn-vip-outline w-100 mt-auto text-center justify-content-center">Schedule Consultation</a>
            @endif
        </div>
    </div>

    <!-- Active Scripts -->
    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card-vip d-flex flex-column h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">Active Prescriptions</span>
                <span class="badge-vip badge-vip-success"><i class="bi bi-capsule"></i></span>
            </div>
            <h3 class="display-6 fw-extrabold text-brand-contrast mb-1">{{ count($activePrescriptions) }}</h3>
            <div class="small text-muted mb-3">TGA Authorised Prescriber Formulations</div>
            <a href="{{ route('patient.prescriptions') }}" class="btn-vip-action btn-vip-secondary w-100 mt-auto text-center justify-content-center">
                <i class="bi bi-capsule me-1"></i> View Scripts & Repeats
            </a>
        </div>
    </div>

    <!-- Orders -->
    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="stat-card-vip d-flex flex-column h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">Recent Dispensary Orders</span>
                <span class="badge-vip badge-vip-warning"><i class="bi bi-box-seam"></i></span>
            </div>
            <h3 class="display-6 fw-extrabold text-brand-primary mb-1">{{ $user->orders()->count() }}</h3>
            <div class="small text-muted mb-3">Australia Post Express Deliveries</div>
            <a href="{{ route('patient.orders') }}" class="btn-vip-action btn-vip-outline w-100 mt-auto text-center justify-content-center">
                <i class="bi bi-box-seam me-1"></i> View Order History
            </a>
        </div>
    </div>
</div>

<!-- Active Scripts List -->
<div class="table-container-vip mb-4" data-aos="fade-up" data-aos-delay="150">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0">My Prescribed Medications</h5>
            <div class="small text-muted">Authorised TGA SAS-B Scripts with Online Repeat Ordering</div>
        </div>
        <a href="{{ route('patient.prescriptions') }}" class="btn-vip-action btn-vip-outline btn-sm">View All Scripts <i class="bi bi-arrow-right ms-1"></i></a>
    </div>

    @if($activePrescriptions->isEmpty())
        <div class="text-center py-4 text-muted small">
            <i class="bi bi-capsule fs-2 text-muted d-block mb-2"></i>
            No active prescriptions issued yet. Once Dr. Batthala completes your consultation, your e-scripts will appear here.
        </div>
    @else
        <div class="table-responsive">
            <table class="table-vip">
                <thead>
                    <tr>
                        <th>Script ID</th>
                        <th>Medication</th>
                        <th>Dosage Protocol</th>
                        <th>Repeats Left</th>
                        <th>Valid Until</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activePrescriptions as $script)
                        <tr>
                            <td><span class="badge-vip badge-vip-neutral fw-bold font-monospace">{{ $script->prescription_number }}</span></td>
                            <td>
                                <strong class="text-brand-contrast d-block">{{ $script->medication_name }}</strong>
                                <div class="text-muted" style="font-size: 0.75rem;">{{ $script->tga_sas_category }}</div>
                            </td>
                            <td><span class="text-muted small">{{ Str::limit($script->dosage_instructions, 60) }}</span></td>
                            <td>
                                <span class="badge-vip badge-vip-success">{{ $script->repeats_left }} / {{ $script->repeats_total }} repeats</span>
                            </td>
                            <td><span class="small text-muted">{{ $script->expiry_date->format('d M Y') }}</span></td>
                            <td class="text-end">
                                @if($script->product)
                                    <form action="{{ route('shop.cart.add') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $script->product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn-vip-action btn-vip-primary btn-sm" {{ $script->repeats_left <= 0 ? 'disabled' : '' }}>
                                            <i class="bi bi-cart-check me-1"></i> Order Repeat
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Recent Orders -->
<div class="table-container-vip" data-aos="fade-up" data-aos-delay="200">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0">Recent Dispensary Shipments</h5>
            <div class="small text-muted">Real-time Australia Post tracking & dispensary status</div>
        </div>
        <a href="{{ route('patient.orders') }}" class="btn-vip-action btn-vip-outline btn-sm">View All Orders <i class="bi bi-arrow-right ms-1"></i></a>
    </div>

    @if($recentOrders->isEmpty())
        <div class="text-center py-4 text-muted small">
            <i class="bi bi-box-seam fs-2 text-muted d-block mb-2"></i>
            No recent orders placed.
        </div>
    @else
        <div class="table-responsive">
            <table class="table-vip">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>AusPost Tracking</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                        <tr>
                            <td><strong class="text-brand-contrast font-monospace">{{ $order->order_number }}</strong></td>
                            <td><span class="small text-muted">{{ $order->created_at->format('d M Y') }}</span></td>
                            <td><span class="badge-vip badge-vip-neutral">{{ $order->items->count() }} formulation(s)</span></td>
                            <td>
                                @if($order->status === 'delivered')
                                    <span class="badge-vip badge-vip-success"><i class="bi bi-check2 me-1"></i> Delivered</span>
                                @elseif($order->status === 'dispatched')
                                    <span class="badge-vip badge-vip-primary"><i class="bi bi-truck me-1"></i> Dispatched</span>
                                @elseif($order->status === 'processing')
                                    <span class="badge-vip badge-vip-warning"><i class="bi bi-hourglass-split me-1"></i> Pharmacy Dispensing</span>
                                @else
                                    <span class="badge-vip badge-vip-neutral">{{ ucfirst($order->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($order->tracking_number)
                                    <span class="badge-vip badge-vip-primary font-monospace"><i class="bi bi-upc me-1"></i> {{ $order->tracking_number }}</span>
                                @else
                                    <span class="text-muted small">Pending Dispatch</span>
                                @endif
                            </td>
                            <td class="text-end fw-bold text-brand-contrast">${{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection