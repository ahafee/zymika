@extends('layouts.portal')

@section('title', 'My Consultations')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">My Consultations</h2>
        <p class="text-muted small mb-0">History of your telehealth appointments with Dr. Suneetha Batthala.</p>
    </div>
    <a href="{{ route('booking.index') }}" class="btn btn-brand-primary">
        <i class="bi bi-plus-circle me-1"></i> Book New Consult
    </a>
</div>

<div class="card card-zovi p-4 bg-white border">
    @if($appointments->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-x fs-1 mb-2 d-block"></i>
            You have no booked consultations.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light small">
                    <tr>
                        <th>Booking #</th>
                        <th>Date & Time</th>
                        <th>Doctor</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Video Room</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $apt)
                        <tr>
                            <td class="fw-bold text-brand-contrast">{{ $apt->appointment_number }}</td>
                            <td>
                                <div class="fw-semibold">{{ $apt->appointment_date->format('d M Y') }}</div>
                                <div class="small text-muted">{{ date('h:i A', strtotime($apt->start_time)) }}</div>
                            </td>
                            <td>{{ $apt->doctor->full_name }}</td>
                            <td>{{ $apt->service->name }}</td>
                            <td>
                                <span class="badge bg-{{ $apt->status == 'confirmed' ? 'success' : ($apt->status == 'completed' ? 'secondary' : 'warning') }}">
                                    {{ ucfirst($apt->status) }}
                                </span>
                            </td>
                            <td>
                                @if($apt->status === 'confirmed' && $apt->appointment_date >= now()->toDateString())
                                    <a href="{{ $apt->video_meeting_url }}" target="_blank" class="btn btn-sm btn-brand-primary">
                                        <i class="bi bi-camera-video me-1"></i> Join Room
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

        <div class="mt-3">
            {{ $appointments->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection