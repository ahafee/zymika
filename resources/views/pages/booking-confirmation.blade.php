@extends('layouts.app')

@section('title', 'Appointment Confirmed - ZOVI LEAF')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="zoom-in">
            <div class="card card-zovi p-4 p-md-5 border bg-white shadow-lg text-center" style="border-radius: var(--radius-xl);">
                <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 d-inline-flex mb-3 border border-success border-opacity-25" style="width: 80px; height: 80px; align-items: center; justify-content: center; margin: 0 auto;">
                    <i class="bi bi-calendar-check-fill fs-1"></i>
                </div>

                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-brand-light border text-brand-contrast small fw-semibold mx-auto mb-2">
                    <i class="bi bi-patch-check-fill text-brand-primary"></i> Booking Ref: {{ $appointment->appointment_number }}
                </div>

                <h2 class="display-6 fw-extrabold text-brand-contrast mb-2">Telehealth Consultation Confirmed!</h2>
                <p class="lead text-muted mb-4" style="font-size: 1.05rem;">
                    Your appointment with <strong>{{ $appointment->doctor->full_name }}</strong> is confirmed and synchronized directly with MediRecords EHR.
                </p>

                <!-- Appointment Details Card -->
                <div class="p-4 bg-light rounded-3 text-start mb-4 border" style="border-radius: 16px;">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <span class="small text-muted d-block mb-0.5">Clinical Service:</span>
                            <div class="fw-bold text-brand-contrast">{{ $appointment->service->name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted d-block mb-0.5">Assigned Practitioner:</span>
                            <div class="fw-bold text-brand-contrast">{{ $appointment->doctor->full_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted d-block mb-0.5">Date &amp; Time:</span>
                            <div class="fw-bold text-brand-primary">
                                <i class="bi bi-clock-history me-1"></i>
                                {{ $appointment->appointment_date->format('l, d F Y') }} at {{ date('h:i A', strtotime($appointment->start_time)) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted d-block mb-0.5">Consultation Mode:</span>
                            <div class="fw-bold text-brand-contrast">
                                <i class="bi bi-camera-video text-brand-primary me-1"></i> Secure Video Telehealth Room
                            </div>
                        </div>
                        <div class="col-12 pt-3 border-top">
                            <span class="small text-muted fw-semibold">Your Direct Telehealth Video Room Link:</span>
                            <div class="input-group mt-1.5">
                                <span class="input-group-text bg-white"><i class="bi bi-link-45deg text-brand-primary"></i></span>
                                <input type="text" class="form-control font-monospace small bg-white" value="{{ $appointment->video_meeting_url }}" readonly>
                                <a href="{{ $appointment->video_meeting_url }}" target="_blank" class="btn btn-brand-primary px-3">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Open Room
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pre-consult form reminder -->
                <div class="p-3.5 bg-brand-light rounded-3 border mb-4 text-start d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h6 class="fw-bold text-brand-contrast mb-1">
                            <i class="bi bi-file-earmark-medical-fill text-brand-sage me-1.5"></i> Step 2: Snapform Pre-Consult Questionnaire
                        </h6>
                        <p class="small text-muted mb-0">Please share your symptoms &amp; health history so Dr. Batthala can review prior to the call.</p>
                    </div>
                    <a href="{{ route('patient.snapform', ['appointment_id' => $appointment->id]) }}" class="btn btn-sm btn-brand-contrast px-3 py-2 fw-semibold">
                        Complete Pre-Consult Form &rarr;
                    </a>
                </div>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-brand-primary py-2.5 px-4 fw-bold">
                        Go to Patient Portal <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary py-2.5 px-4">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection