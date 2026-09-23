@extends('layouts.portal')

@section('title', 'Executive Practice Dashboard - ZOVI LEAF')

@section('content')
<!-- Header & Quick Operations Bar -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-building me-1"></i> HQ Practice Hub</span>
            <span class="pulse-dot"></span>
            <span class="badge bg-success bg-opacity-10 text-success border border-success">AHPRA Compliant</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">Practice Operations & Analytics</h2>
        <p class="text-muted small mb-0">ZOVI LEAF &bull; Zovi Health Pty Ltd &bull; Level 1, 63-73 Ann St, Surry Hills NSW 2010</p>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('admin.medirecords.reconcile') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-brand-primary shadow-sm">
                <i class="bi bi-arrow-repeat me-1"></i> Sync MediRecords
            </button>
        </form>
        <a href="{{ route('admin.medirecords') }}" class="btn btn-brand-contrast shadow-sm">
            <i class="bi bi-cloud-arrow-up me-1"></i> EHR Gateway
        </a>
    </div>
</div>

<!-- VIP Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Registered Patients</span>
                    <h3 class="display-6 fw-extrabold text-brand-contrast my-1 num-font">{{ $stats['total_patients'] }}</h3>
                </div>
                <div class="stat-icon-wrapper stat-icon-contrast">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top border-light">
                <span class="small text-success fw-semibold"><i class="bi bi-check-circle-fill me-1"></i> EHR Linked</span>
                <span class="text-muted small" style="font-size: 0.75rem;">MediRecords Active</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Telehealth Consults</span>
                    <h3 class="display-6 fw-extrabold text-brand-primary my-1 num-font">{{ $stats['total_appointments'] }}</h3>
                </div>
                <div class="stat-icon-wrapper stat-icon-primary">
                    <i class="bi bi-calendar2-check-fill"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top border-light">
                <span class="small text-muted"><strong class="text-brand-contrast">{{ $stats['pending_appointments'] }}</strong> awaiting consult</span>
                <span class="badge bg-warning bg-opacity-10 text-dark border border-warning" style="font-size: 0.68rem;">Live Queue</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Dispensary Orders</span>
                    <h3 class="display-6 fw-extrabold text-brand-sage my-1 num-font">{{ $stats['total_orders'] }}</h3>
                </div>
                <div class="stat-icon-wrapper stat-icon-sage">
                    <i class="bi bi-box-seam-fill"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top border-light">
                <span class="small text-muted"><strong class="text-brand-sage">{{ $stats['processing_orders'] }}</strong> in pharmacy dispatch</span>
                <span class="badge bg-success bg-opacity-10 text-success border border-success" style="font-size: 0.68rem;">TGA SAS-B</span>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem; letter-spacing: 0.05em;">Gross Revenue</span>
                    <h3 class="display-6 fw-extrabold text-success my-1 num-font">${{ number_format($stats['total_revenue'], 0) }}</h3>
                </div>
                <div class="stat-icon-wrapper stat-icon-success">
                    <i class="bi bi-currency-dollar"></i>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-2 border-top border-light">
                <span class="small text-muted">AUD Financial Inflow</span>
                <span class="badge bg-success text-white" style="font-size: 0.68rem;">AUD (GST Inc.)</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Recent Appointments Table Card -->
    <div class="col-lg-6">
        <div class="table-container-vip h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="fw-bold text-brand-contrast mb-0">Recent Consultations</h5>
                    <div class="text-muted small" style="font-size: 0.75rem;">Real-time clinic bookings</div>
                </div>
                <a href="{{ route('admin.appointments') }}" class="btn btn-sm btn-vip-action">
                    View All <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-vip align-middle">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Schedule</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentAppointments as $apt)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-vip" style="width: 32px; height: 32px; font-size: 0.75rem;">
                                            {{ strtoupper(substr($apt->patient->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-brand-contrast">{{ $apt->patient->name }}</div>
                                            <div class="text-muted" style="font-size: 0.72rem;">#{{ $apt->appointment_number }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ $apt->appointment_date->format('d M Y') }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ date('h:i A', strtotime($apt->start_time)) }}</div>
                                </td>
                                <td>
                                    @if($apt->status == 'confirmed')
                                        <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Confirmed</span>
                                    @elseif($apt->status == 'completed')
                                        <span class="badge-vip badge-vip-secondary"><span class="badge-vip-dot"></span> Completed</span>
                                    @else
                                        <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> Pending</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.appointments') }}" class="btn btn-sm btn-vip-action py-1 px-2">
                                        Manage
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Orders Table Card -->
    <div class="col-lg-6">
        <div class="table-container-vip h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="fw-bold text-brand-contrast mb-0">Dispensary Orders</h5>
                    <div class="text-muted small" style="font-size: 0.75rem;">Medical cannabis fulfillment</div>
                </div>
                <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-vip-action">
                    View All <i class="bi bi-chevron-right"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-vip align-middle">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Patient</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $ord)
                            <tr>
                                <td class="fw-bold text-brand-contrast">{{ $ord->order_number }}</td>
                                <td>
                                    <div class="fw-semibold">{{ $ord->shipping_name }}</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">{{ $ord->created_at->format('d M, h:i A') }}</div>
                                </td>
                                <td class="fw-bold text-brand-primary num-font">${{ number_format($ord->total_amount, 2) }}</td>
                                <td>
                                    <span class="badge-vip badge-vip-info text-capitalize">
                                        <span class="badge-vip-dot"></span> {{ str_replace('_', ' ', $ord->status) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-vip-action py-1 px-2">
                                        Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Integration Logs Stream Card -->
<div class="table-container-vip p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0"><i class="bi bi-activity text-brand-primary me-2"></i> Real-Time EHR Sync Activity</h5>
            <div class="text-muted small" style="font-size: 0.75rem;">Live audit stream from MediRecords & Snapforms</div>
        </div>
        <a href="{{ route('admin.sync-logs') }}" class="btn btn-sm btn-vip-action">
            Full Audit Trail <i class="bi bi-chevron-right"></i>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-vip align-middle mb-0">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Entity Type</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>MediRecords Response Summary</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentLogs as $log)
                    <tr>
                        <td class="text-muted font-monospace" style="font-size: 0.8rem;">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><span class="badge bg-light text-brand-contrast border text-uppercase px-2 py-1" style="font-size: 0.72rem;">{{ $log->entity_type }}</span></td>
                        <td class="fw-semibold text-brand-contrast">{{ $log->action }}</td>
                        <td>
                            @if($log->status == 'success')
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Success</span>
                            @else
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> Failed</span>
                            @endif
                        </td>
                        <td class="text-muted font-monospace" style="font-size: 0.78rem;">
                            {{ Str::limit(json_encode($log->response_payload ?? $log->error_message), 65) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No audit logs recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection