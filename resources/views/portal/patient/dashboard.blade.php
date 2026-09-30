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
    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="100">
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
    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="200">
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
</div>

<!-- Active Scripts List -->
<div class="table-container-vip mb-4" data-aos="fade-up" data-aos-delay="150">
    <div class="table-vip-header">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0"><i class="bi bi-capsule text-brand-primary me-2"></i> My Prescribed Medications</h5>
            <div class="small text-muted">Authorised TGA SAS-B Scripts with Prescribing Protocols</div>
        </div>
        <a href="{{ route('patient.prescriptions') }}" class="btn-vip-action btn-vip-outline btn-sm">View All Scripts <i class="bi bi-arrow-right ms-1"></i></a>
    </div>

    @if($activePrescriptions->isEmpty())
        <div class="text-center py-5 text-muted small">
            <i class="bi bi-capsule text-brand-primary fs-1 d-block mb-2 opacity-50"></i>
            <p class="mb-0 fw-semibold text-brand-contrast">No active prescriptions issued yet.</p>
            <div class="text-muted">Once Dr. Batthala completes your consultation, your SAS-B e-scripts will appear here.</div>
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
                        <th class="text-end">Status</th>
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
                                <span class="badge-vip badge-vip-success text-uppercase">{{ $script->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection