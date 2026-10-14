@extends('layouts.portal')

@section('title', 'Manage Consultations - ZYMIKA HEALTH')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-calendar-range me-1"></i> Diary Master</span>
            <span class="badge bg-success bg-opacity-10 text-success border border-success">MediRecords Sync</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">Consultation Management</h2>
        <p class="text-muted small mb-0">Full oversight of telehealth schedules and MediRecords EHR diary bookings.</p>
    </div>
    <div class="d-flex bg-white p-1 rounded-3 border shadow-xs gap-1">
        <a href="{{ route('admin.appointments', ['status' => 'all']) }}" class="btn btn-sm px-3 fw-semibold {{ (!$status || $status == 'all') ? 'btn-brand-primary' : 'btn-light text-muted' }}">All Slots</a>
        <a href="{{ route('admin.appointments', ['status' => 'confirmed']) }}" class="btn btn-sm px-3 fw-semibold {{ $status == 'confirmed' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Confirmed</a>
        <a href="{{ route('admin.appointments', ['status' => 'completed']) }}" class="btn btn-sm px-3 fw-semibold {{ $status == 'completed' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Completed</a>
    </div>
</div>

<div class="table-container-vip p-4">
    <div class="table-responsive">
        <table class="table table-vip align-middle">
            <thead>
                <tr>
                    <th>Appointment</th>
                    <th>Date & Time</th>
                    <th>Patient</th>
                    <th>Practitioner</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>MediRecords ID</th>
                    <th class="text-end">Update Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $apt)
                    <tr>
                        <td>
                            <span class="fw-bold text-brand-contrast">#{{ $apt->appointment_number }}</span>
                        </td>
                        <td>
                            <div class="fw-semibold text-brand-contrast">{{ $apt->appointment_date->format('d M Y') }}</div>
                            <div class="text-muted" style="font-size: 0.75rem;">{{ date('h:i A', strtotime($apt->start_time)) }} - {{ date('h:i A', strtotime($apt->end_time)) }}</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-vip" style="width: 32px; height: 32px; font-size: 0.75rem;">
                                    {{ strtoupper(substr($apt->patient->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-brand-contrast">{{ $apt->patient->name }}</div>
                                    <div class="text-muted" style="font-size: 0.72rem;">{{ $apt->patient->phone ?? $apt->patient->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-brand-contrast">{{ $apt->doctor->full_name }}</div>
                            <div class="text-muted" style="font-size: 0.72rem;">AHPRA: {{ $apt->doctor->ahpra_number }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-brand-contrast border">{{ $apt->service->name }}</span>
                        </td>
                        <td>
                            @if($apt->status == 'confirmed')
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Confirmed</span>
                            @elseif($apt->status == 'completed')
                                <span class="badge-vip badge-vip-secondary"><span class="badge-vip-dot"></span> Completed</span>
                            @elseif($apt->status == 'cancelled')
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> Cancelled</span>
                            @else
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> {{ ucfirst($apt->status) }}</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace" style="font-size: 0.72rem;">{{ $apt->medirecords_appointment_id ?? 'Pending MR Sync' }}</span>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.appointments.status', $apt->id) }}" method="POST" class="d-inline-flex align-items-center justify-content-end gap-1">
                                @csrf
                                <select name="status" class="form-select form-select-sm" style="width: 125px; font-size: 0.8rem;">
                                    <option value="confirmed" {{ $apt->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $apt->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $apt->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="no_show" {{ $apt->status == 'no_show' ? 'selected' : '' }}>No Show</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-brand-primary" title="Save Status"><i class="bi bi-check2"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">No appointments found for this filter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($appointments->hasPages())
        <div class="mt-4 pt-3 border-top">
            {{ $appointments->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection