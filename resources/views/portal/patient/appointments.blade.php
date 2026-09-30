@extends('layouts.portal')

@section('title', 'My Consultations')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">My Telehealth Consultations</h2>
        <p class="text-muted small mb-0">History of your encrypted video appointments with Dr. Suneetha Batthala.</p>
    </div>
    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Book New Consult
    </a>
</div>

<div class="table-container-vip p-3 p-md-4">
    @if($appointments->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-x fs-1 mb-2 d-block text-brand-primary"></i>
            <h5 class="fw-bold text-brand-contrast">No Consultations Booked Yet</h5>
            <p class="small text-muted mb-3">Book your initial telehealth assessment with Dr. Batthala.</p>
            <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-sm">Book Consult ($79)</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-vip align-middle">
                <thead>
                    <tr>
                        <th>Booking #</th>
                        <th>Schedule</th>
                        <th>Doctor</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th class="text-end">Telehealth Room</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $apt)
                        <tr>
                            <td><span class="badge-vip badge-vip-neutral fw-bold font-monospace">{{ $apt->appointment_number }}</span></td>
                            <td>
                                <div class="fw-semibold text-brand-contrast">{{ $apt->appointment_date->format('d M Y') }}</div>
                                <div class="small text-muted">{{ date('h:i A', strtotime($apt->start_time)) }}</div>
                            </td>
                            <td>
                                <div class="fw-semibold text-brand-contrast">{{ $apt->doctor->full_name }}</div>
                                <div class="text-muted" style="font-size: 0.72rem;">AHPRA Prescriber</div>
                            </td>
                            <td><span class="badge bg-light text-brand-contrast border">{{ $apt->service->name }}</span></td>
                            <td>
                                <span class="badge-vip badge-vip-{{ $apt->status == 'confirmed' ? 'success' : ($apt->status == 'completed' ? 'secondary' : 'warning') }}">
                                    <span class="badge-vip-dot"></span> {{ ucfirst($apt->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                @if($apt->status === 'confirmed' && $apt->appointment_date >= now()->toDateString())
                                    <a href="{{ $apt->video_meeting_url }}" target="_blank" class="btn btn-sm btn-brand-primary fw-semibold px-3 shadow-xs">
                                        <i class="bi bi-camera-video-fill me-1"></i> Join Room
                                    </a>
                                @else
                                    <span class="text-muted small">Consult Completed</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 pt-3 border-top">
            {{ $appointments->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection