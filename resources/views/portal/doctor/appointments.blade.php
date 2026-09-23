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

<div class="card card-zovi p-4 bg-white border">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-brand-contrast mb-0">Schedule for {{ date('l, d F Y', strtotime($date)) }}</h5>
        <span class="badge bg-brand-primary text-white">{{ count($appointments) }} booked slot(s)</span>
    </div>

    @if($appointments->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-calendar-event fs-1 mb-2 d-block"></i>
            No appointments booked for this date.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="bg-light small">
                    <tr>
                        <th>Time</th>
                        <th>Patient</th>
                        <th>Service Type</th>
                        <th>Pre-Consult Snapform</th>
                        <th>Status</th>
                        <th>MediRecords Sync</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $apt)
                        <tr>
                            <td class="fw-bold text-brand-primary">
                                {{ date('h:i A', strtotime($apt->start_time)) }} - {{ date('h:i A', strtotime($apt->end_time)) }}
                            </td>
                            <td>
                                <strong>{{ $apt->patient->name }}</strong>
                                <div class="small text-muted">{{ $apt->patient->phone }} &bull; {{ $apt->patient->email }}</div>
                            </td>
                            <td>{{ $apt->service->name }}</td>
                            <td>
                                @if($apt->preConsultForm)
                                    <span class="badge bg-success"><i class="bi bi-check2"></i> Submitted (Pain: {{ $apt->preConsultForm->form_data['fields']['pain_score'] ?? 'N/A' }}/10)</span>
                                @else
                                    <span class="badge bg-secondary">Not Submitted</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $apt->status == 'confirmed' ? 'success' : ($apt->status == 'completed' ? 'secondary' : 'warning') }}">
                                    {{ ucfirst($apt->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="small text-muted">{{ $apt->medirecords_appointment_id ?? 'Pending' }}</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('doctor.consultation', $apt->id) }}" class="btn btn-sm btn-brand-primary">
                                        <i class="bi bi-file-earmark-medical"></i> Record
                                    </a>
                                    <form action="{{ route('doctor.appointments.sync', $apt->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Sync with MediRecords">
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