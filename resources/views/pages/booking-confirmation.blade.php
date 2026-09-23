@extends('layouts.app')

@section('title', 'Appointment Confirmed - ZOVI LEAF')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-zovi p-4 p-md-5 border bg-white shadow text-center">
                <div class="bg-brand-sage-light text-brand-sage rounded-circle p-3 d-inline-flex mb-3">
                    <i class="bi bi-calendar-check-fill display-4"></i>
                </div>

                <span class="badge badge-tga mb-2">Booking ID: {{ $appointment->appointment_number }}</span>
                <h2 class="display-6 fw-bold text-brand-contrast mb-2">Telehealth Consultation Confirmed!</h2>
                <p class="lead text-muted mb-4">
                    Your appointment with <strong>{{ $appointment->doctor->full_name }}</strong> is officially booked and synchronized with MediRecords EHR.
                </p>

                <!-- Appointment Details Card -->
                <div class="p-4 bg-brand-light rounded-3 text-start mb-4 border">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <span class="small text-muted">Service:</span>
                            <div class="fw-bold text-brand-contrast">{{ $appointment->service->name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Practitioner:</span>
                            <div class="fw-bold text-brand-contrast">{{ $appointment->doctor->full_name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Date & Time:</span>
                            <div class="fw-bold text-brand-primary">
                                {{ $appointment->appointment_date->format('l, d F Y') }} at {{ date('h:i A', strtotime($appointment->start_time)) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <span class="small text-muted">Consultation Mode:</span>
                            <div class="fw-bold text-brand-contrast">
                                <i class="bi bi-camera-video text-brand-primary me-1"></i> Video Telehealth Room
                            </div>
                        </div>
                        <div class="col-12 pt-2 border-top">
                            <span class="small text-muted">Your Telehealth Video Room URL:</span>
                            <div class="input-group mt-1">
                                <input type="text" class="form-control" value="{{ $appointment->video_meeting_url }}" readonly>
                                <a href="{{ $appointment->video_meeting_url }}" target="_blank" class="btn btn-brand-primary">
                                    <i class="bi bi-box-arrow-up-right"></i> Open Room
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pre-consult form reminder -->
                <div class="p-3 bg-brand-sage-light rounded-3 border mb-4 text-start">
                    <h6 class="fw-bold text-brand-contrast mb-1"><i class="bi bi-file-earmark-medical-fill text-brand-sage me-2"></i> Next Step: Snapform Pre-Consult Questionnaire</h6>
                    <p class="small text-muted mb-2">Please complete your pre-consult medical background so Dr. Batthala can review your case prior to the call.</p>
                    <a href="{{ route('patient.snapform', ['appointment_id' => $appointment->id]) }}" class="btn btn-sm btn-brand-contrast">
                        Complete Pre-Consult Form Now
                    </a>
                </div>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-brand-primary">
                        Go to Patient Dashboard <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection