@extends('layouts.portal')

@section('title', 'Doctor Dashboard - Dr. Suneetha Batthala')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4" data-aos="fade-down">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <h2 class="fw-bold text-brand-contrast mb-0">Doctor Portal: {{ $doctor->full_name }}</h2>
            <span class="badge-vip badge-vip-success"><i class="bi bi-patch-check-fill me-1"></i> AHPRA Prescriber</span>
        </div>
        <p class="text-muted small mb-0">AHPRA: <strong class="text-brand-contrast">{{ $doctor->ahpra_number }}</strong> | Provider: <strong class="text-brand-contrast">{{ $doctor->provider_number }}</strong> | <i class="bi bi-database-check text-brand-sage"></i> MediRecords Live Connected</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('doctor.prescriptions') }}" class="btn-vip-action btn-vip-primary">
            <i class="bi bi-prescription2 me-1"></i> Issue New Script
        </a>
        <a href="{{ route('doctor.appointments') }}" class="btn-vip-action btn-vip-secondary">
            <i class="bi bi-calendar-day me-1"></i> Today's Schedule
        </a>
    </div>
</div>

<!-- Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card-vip">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">Today's Consultations</span>
                <span class="badge-vip badge-vip-primary"><i class="bi bi-camera-video"></i></span>
            </div>
            <h3 class="display-6 fw-extrabold text-brand-primary mb-1">{{ count($todayAppointments) }}</h3>
            <div class="small text-muted">Telehealth Video & Phone Sessions</div>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-card-vip">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">Active Patient Cohort</span>
                <span class="badge-vip badge-vip-success"><i class="bi bi-people"></i></span>
            </div>
            <h3 class="display-6 fw-extrabold text-brand-contrast mb-1">{{ $totalPatientsCount }}</h3>
            <div class="small text-muted">Registered Australian Patients</div>
        </div>
    </div>
    <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="stat-card-vip">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold">TGA SAS-B Scripts Issued</span>
                <span class="badge-vip badge-vip-sage"><i class="bi bi-award"></i></span>
            </div>
            <h3 class="display-6 fw-extrabold text-brand-sage mb-1">{{ $totalScriptsCount }}</h3>
            <div class="small text-muted">Authorised Prescriptions</div>
        </div>
    </div>
</div>

<!-- Today's Consultations -->
<div class="table-container-vip mb-4" data-aos="fade-up" data-aos-delay="150">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0"><i class="bi bi-calendar-check text-brand-primary me-2"></i> Today's Appointments ({{ date('d M Y') }})</h5>
            <div class="small text-muted">Direct Telehealth Access & EHR Integration</div>
        </div>
        <a href="{{ route('doctor.appointments') }}" class="btn-vip-action btn-vip-outline btn-sm">Full Schedule <i class="bi bi-arrow-right ms-1"></i></a>
    </div>

    @if($todayAppointments->isEmpty())
        <div class="text-center py-4 text-muted small">
            <i class="bi bi-calendar-x fs-2 text-muted d-block mb-2"></i>
            No consultations scheduled for today.
        </div>
    @else
        <div class="table-responsive">
            <table class="table-vip">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Patient Name</th>
                        <th>Service</th>
                        <th>Medicare / Phone</th>
                        <th>Pre-Consult</th>
                        <th>MediRecords</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todayAppointments as $apt)
                        <tr>
                            <td><span class="badge-vip badge-vip-primary font-monospace">{{ date('h:i A', strtotime($apt->start_time)) }}</span></td>
                            <td>
                                <strong class="text-brand-contrast d-block">{{ $apt->patient->name }}</strong>
                                <div class="text-muted" style="font-size: 0.75rem;">DOB: {{ $apt->patient->date_of_birth?->format('d/m/Y') ?? 'N/A' }}</div>
                            </td>
                            <td><span class="small text-muted">{{ $apt->service->name }}</span></td>
                            <td>
                                <div class="font-monospace small">{{ $apt->patient->medicare_number ?? 'No Medicare' }}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">{{ $apt->patient->phone }}</div>
                            </td>
                            <td>
                                @if($apt->pre_consult_completed)
                                    <span class="badge-vip badge-vip-success"><i class="bi bi-check-circle me-1"></i> Intake Done</span>
                                @else
                                    <span class="badge-vip badge-vip-warning"><i class="bi bi-clock me-1"></i> Pending Intake</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge-vip badge-vip-{{ $apt->medirecords_sync_status == 'synced' ? 'success' : 'neutral' }}">
                                    {{ ucfirst($apt->medirecords_sync_status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('doctor.consultation', $apt->id) }}" class="btn-vip-action btn-vip-primary btn-sm">
                                    <i class="bi bi-file-earmark-medical me-1"></i> Clinical Record
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Upcoming Consultations -->
<div class="table-container-vip" data-aos="fade-up" data-aos-delay="200">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold text-brand-contrast mb-0"><i class="bi bi-calendar-week text-brand-contrast me-2"></i> Upcoming Appointments</h5>
            <div class="small text-muted">Future bookings in clinical queue</div>
        </div>
    </div>
    @if($upcomingAppointments->isEmpty())
        <div class="text-center py-4 text-muted small">
            <i class="bi bi-inbox fs-2 text-muted d-block mb-2"></i>
            No future bookings currently in queue.
        </div>
    @else
        <div class="table-responsive">
            <table class="table-vip">
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Patient</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($upcomingAppointments as $apt)
                        <tr>
                            <td>
                                <strong class="text-brand-contrast">{{ $apt->appointment_date->format('d M Y') }}</strong>
                                <span class="text-muted ms-1 small">({{ date('h:i A', strtotime($apt->start_time)) }})</span>
                            </td>
                            <td><strong class="text-brand-contrast">{{ $apt->patient->name }}</strong></td>
                            <td><span class="small text-muted">{{ $apt->service->name }}</span></td>
                            <td><span class="badge-vip badge-vip-primary">{{ ucfirst($apt->status) }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('doctor.consultation', $apt->id) }}" class="btn-vip-action btn-vip-outline btn-sm">
                                    View Record
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection