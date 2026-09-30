@extends('layouts.portal')

@section('title', 'Practitioner Daily Schedule')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">Consultation Schedule</h2>
        <p class="text-muted small mb-0">Manage and conduct your daily patient appointments.</p>
    </div>
    <form action="{{ route('doctor.appointments') }}" method="GET" class="d-flex gap-2">
        <input type="date" name="date" class="form-control form-control-sm" value="{{ $date }}" onchange="this.form.submit()">
    </form>
</div>

<div class="table-container-vip mb-4">
    <div class="table-vip-header">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0">Schedule for {{ date('l, d F Y', strtotime($date)) }}</h5>
            <div class="small text-muted">Daily appointment queue and clinical consultation management</div>
        </div>
        <span class="badge-vip badge-vip-primary fw-bold">{{ count($appointments) }} booked slot(s)</span>
    </div>

    @if($appointments->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-event fs-1 mb-2 d-block text-brand-primary opacity-50"></i>
            <p class="mb-0 fw-semibold text-brand-contrast">No appointments booked for this date.</p>
            <div class="small text-muted">Select another date above to view past or future schedules.</div>
        </div>
    @else
        <div class="table-responsive">
            <table class="table-vip">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Patient</th>
                        <th>Service Type</th>
                        <th>Pre-Consult Snapform</th>
                        <th>Status</th>
                        <th>MediRecords Sync</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $apt)
                        <tr>
                            <td>
                                <span class="badge-vip badge-vip-primary font-monospace">
                                    {{ date('h:i A', strtotime($apt->start_time)) }} - {{ date('h:i A', strtotime($apt->end_time)) }}
                                </span>
                            </td>
                            <td>
                                <strong class="text-brand-contrast d-block">{{ $apt->patient->name }}</strong>
                                <div class="small text-muted">{{ $apt->patient->phone }} &bull; {{ $apt->patient->email }}</div>
                            </td>
                            <td><span class="small text-muted">{{ $apt->service->name }}</span></td>
                            <td>
                                @if($apt->preConsultForm)
                                    <span class="badge-vip badge-vip-success"><i class="bi bi-check2"></i> Submitted (Pain: {{ $apt->preConsultForm->form_data['fields']['pain_score'] ?? 'N/A' }}/10)</span>
                                @else
                                    <span class="badge-vip badge-vip-secondary">Not Submitted</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge-vip badge-vip-{{ $apt->status == 'confirmed' ? 'success' : ($apt->status == 'completed' ? 'secondary' : 'warning') }}">
                                    {{ ucfirst($apt->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="small text-muted font-monospace">{{ $apt->medirecords_appointment_id ?? 'Pending' }}</div>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('doctor.consultation', $apt->id) }}" class="btn-vip-action btn-vip-primary btn-sm">
                                        <i class="bi bi-file-earmark-medical me-1"></i> Record
                                    </a>
                                    <form action="{{ route('doctor.appointments.sync', $apt->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn-vip-action btn-vip-outline btn-sm" title="Sync with MediRecords">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection