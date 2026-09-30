@extends('layouts.app')

@section('title', 'Book Telehealth Consultation - Dr. Suneetha Batthala | ZOVI LEAF')

@php
    $currentSelectedService = $services->firstWhere('id', $selectedServiceId) ?? $services->first();
    $currentDoctor = $doctors->firstWhere('id', $selectedDoctorId) ?? $doctors->first();
@endphp

@section('content')
<!-- VIP Luxury Dark Hero Banner -->
<div class="booking-hero-header text-white">
    <div class="container text-center position-relative" style="z-index: 2;">
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-20 mb-3 shadow-sm">
            <span class="badge-vip-dot" style="background-color: #2ECC71;"></span>
            <span class="small fw-semibold text-white">Live MediRecords EHR Diary Sync</span>
        </div>
        <h1 class="display-5 fw-extrabold text-white mb-2" style="letter-spacing: -0.02em;">Book Telehealth Consultation</h1>
        <p class="lead text-white text-opacity-85 max-w-700 mx-auto mb-4" style="font-size: 1.05rem; line-height: 1.6;">
            1-on-1 private video &amp; phone consultations with <strong>Dr. Suneetha Batthala</strong>. Direct AHPRA Authorised Prescriber for chronic pain, insomnia, anxiety &amp; natural medicine.
        </p>

        <!-- Trust Badges Strip -->
        <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-4 text-white text-opacity-80 small">
            <span class="d-inline-flex align-items-center gap-1.5"><i class="bi bi-patch-check-fill text-brand-primary"></i> AHPRA Registered Doctor</span>
            <span class="d-inline-flex align-items-center gap-1.5"><i class="bi bi-shield-lock-fill text-brand-sage"></i> 256-bit Encrypted Telehealth</span>
            <span class="d-inline-flex align-items-center gap-1.5"><i class="bi bi-qr-code text-brand-primary"></i> Direct e-Script via SMS</span>
            <span class="d-inline-flex align-items-center gap-1.5"><i class="bi bi-box-seam-fill text-brand-sage"></i> Express AusPost Delivery</span>
        </div>
    </div>
</div>

<div class="booking-page-wrap py-5" x-data="bookingApp()">
    <div class="container">
        <form action="{{ route('booking.store') }}" method="POST" @submit="validateForm($event)">
            @csrf
            @if($assessment)
                <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
            @endif

            <div class="row g-4 g-lg-5">
                <!-- Left Column: Interactive Wizard Steps -->
                <div class="col-lg-8" data-aos="fade-right">
                    
                    <!-- Step 1: Service Selection -->
                    <div class="booking-step-card">
                        <div class="booking-step-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="booking-step-num">1</span>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Select Consultation Pathway</h4>
                                    <span class="small text-muted">Choose your appointment type matching your clinical needs</span>
                                </div>
                            </div>
                            <span class="badge bg-brand-light text-brand-contrast border small d-none d-sm-inline-block px-2.5 py-1.5">
                                <i class="bi bi-shield-check text-brand-primary me-1"></i> TGA SAS-B AP
                            </span>
                        </div>

                        <div class="row g-3">
                            @foreach($services as $s)
                                <div class="col-md-4 col-sm-6">
                                    <div class="booking-service-item"
                                         :class="selectedServiceId == {{ $s->id }} ? 'active-service' : ''"
                                         @click="selectService({{ $s->id }}, {{ $s->price }}, '{{ addslashes(html_entity_decode($s->name)) }}', {{ $s->duration_minutes }})">
                                        
                                        <div class="d-flex justify-content-between align-items-center mb-2.5">
                                            <span class="badge bg-brand-light text-brand-contrast border small fw-bold">
                                                <i class="bi bi-clock-history me-1 text-brand-primary"></i> {{ $s->duration_minutes }} mins
                                            </span>
                                        </div>
                                        
                                        <h6 class="fw-bold text-brand-contrast mb-1" style="font-size: 0.98rem; line-height: 1.3;">{{ $s->name }}</h6>
                                        <p class="small text-muted mb-3 flex-grow-1" style="font-size: 0.8rem; line-height: 1.4;">
                                            {{ Str::limit($s->description, 65) }}
                                        </p>

                                        <div class="mt-auto pt-2.5 border-top d-flex align-items-baseline justify-content-between">
                                            <span class="small text-muted fw-semibold">Consult Fee</span>
                                            <span class="booking-service-price">${{ number_format($s->price, 0) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Step 2: Practitioner & Consult Mode -->
                    <div class="booking-step-card">
                        <div class="booking-step-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="booking-step-num">2</span>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Assigned Doctor &amp; Mode</h4>
                                    <span class="small text-muted">AHPRA-accredited telehealth doctor &amp; delivery mode</span>
                                </div>
                            </div>
                        </div>

                        <!-- Doctor Card -->
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-brand-contrast mb-2">Consulting Prescribing Doctor</label>
                            @foreach($doctors as $doc)
                                <div class="booking-doc-card active-doc">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="position-relative">
                                            <div class="avatar-vip" style="width: 52px; height: 52px; font-size: 1.15rem; background: linear-gradient(135deg, var(--brand-contrast) 0%, #1A2014 100%);">
                                                SB
                                            </div>
                                            <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle"></span>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-brand-contrast fs-6">{{ $doc->full_name }}</div>
                                            <div class="small text-muted">
                                                <span class="text-brand-contrast fw-semibold">{{ $doc->specialty }}</span> &bull; AHPRA: <span class="font-monospace text-brand-primary fw-bold">{{ $doc->ahpra_number }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2.5 py-1.5 d-none d-sm-inline-flex align-items-center gap-1">
                                        <i class="bi bi-patch-check-fill"></i> Verified Prescriber
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <!-- Consultation Format -->
                        <label class="form-label fw-bold small text-brand-contrast mb-2">Consultation Delivery Format *</label>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="booking-mode-card" :class="consultMode === 'telehealth_video' ? 'active-mode' : ''">
                                    <input type="radio" name="consult_type" value="telehealth_video" x-model="consultMode" class="form-check-input mt-0">
                                    <div class="footer-trust-icon footer-trust-ahpra" style="width: 42px; height: 42px; font-size: 1.25rem;">
                                        <i class="bi bi-camera-video-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast small">Secure HD Video Room</div>
                                        <div class="text-muted" style="font-size: 0.76rem;">Private WebRTC Browser Room (Recommended)</div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="booking-mode-card" :class="consultMode === 'telehealth_phone' ? 'active-mode' : ''">
                                    <input type="radio" name="consult_type" value="telehealth_phone" x-model="consultMode" class="form-check-input mt-0">
                                    <div class="footer-trust-icon footer-trust-medirecords" style="width: 42px; height: 42px; font-size: 1.25rem;">
                                        <i class="bi bi-telephone-fill"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast small">Phone Consultation</div>
                                        <div class="text-muted" style="font-size: 0.76rem;">Doctor calls your direct mobile number</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Date & Real-Time Time Slots -->
                    <div class="booking-step-card">
                        <div class="booking-step-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="booking-step-num">3</span>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Choose Date &amp; Time Slot</h4>
                                    <span class="small text-muted">Select an available appointment in Australian Eastern Time (AEST)</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-5">
                                <label class="form-label fw-bold small text-brand-contrast">Select Consultation Date *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-calendar-event booking-input-icon"></i>
                                    <input type="date" name="appointment_date" class="form-control form-control-lg fw-semibold" 
                                           min="{{ date('Y-m-d') }}" 
                                           x-model="selectedDate" 
                                           @change="fetchSlots()" required>
                                </div>
                                <div class="mt-2 text-muted small d-flex align-items-center gap-1.5" style="font-size: 0.78rem;">
                                    <i class="bi bi-info-circle-fill text-brand-sage"></i> Clinic diary operates Monday to Saturday.
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label fw-bold small text-brand-contrast mb-0">
                                        Available Slots (<span class="text-brand-primary" x-text="selectedDateDisplay"></span>) *
                                    </label>
                                    <span class="badge bg-light text-brand-contrast border small" x-show="!loadingSlots && slots.length > 0">
                                        <span x-text="slots.filter(s => s.is_available).length"></span> Available
                                    </span>
                                </div>
                                
                                <!-- Loading State -->
                                <div x-show="loadingSlots" class="text-center py-4 bg-light rounded-3 border">
                                    <div class="spinner-border spinner-border-sm text-brand-primary mb-1" role="status"></div>
                                    <div class="small text-muted">Checking MediRecords live calendar...</div>
                                </div>

                                <!-- Empty Slots State -->
                                <div x-show="!loadingSlots && slots.length === 0" class="p-4 bg-light rounded-3 text-center small text-muted border">
                                    <i class="bi bi-calendar-x fs-3 d-block text-muted mb-2"></i>
                                    No available appointments on this day. Please select another date above.
                                </div>

                                <!-- Slots Grid -->
                                <div x-show="!loadingSlots && slots.length > 0" class="booking-slot-grid">
                                    <template x-for="slot in slots" :key="slot.time">
                                        <div class="booking-slot-pill"
                                             :class="[
                                                 selectedSlot === slot.time ? 'active-slot' : '',
                                                 !slot.is_available ? 'disabled' : ''
                                             ]"
                                             @click="if(slot.is_available) { selectedSlot = slot.time; selectedSlotDisplay = slot.display; }">
                                            <input type="radio" name="start_time" :value="slot.time" x-model="selectedSlot" class="d-none" :disabled="!slot.is_available" required>
                                            <span x-text="slot.display"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Patient Demographics & Medicare -->
                    <div class="booking-step-card">
                        <div class="booking-step-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="booking-step-num">4</span>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Patient &amp; Medicare Details</h4>
                                    <span class="small text-muted">Required for clinical chart creation &amp; digital e-prescribing</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">First Name *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-person booking-input-icon"></i>
                                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', explode(' ', Auth::user()?->name ?? ($assessment?->full_name ?? ''))[0] ?? '') }}" required placeholder="e.g. Sarah">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">Last Name *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-person booking-input-icon"></i>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', explode(' ', Auth::user()?->name ?? ($assessment?->full_name ?? ''))[1] ?? '') }}" required placeholder="e.g. Jenkins">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">Email (for Video Link &amp; Receipts) *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-envelope booking-input-icon"></i>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()?->email ?? ($assessment?->email ?? '')) }}" required placeholder="sarah.j@example.com.au">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">Mobile Phone (for SMS e-Scripts) *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-phone booking-input-icon"></i>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()?->phone ?? ($assessment?->phone ?? '')) }}" required placeholder="0400 000 000">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">Date of Birth *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-calendar3 booking-input-icon"></i>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', Auth::user()?->date_of_birth?->format('Y-m-d') ?? '1990-05-15') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold small text-brand-contrast">Gender *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-gender-ambiguous booking-input-icon"></i>
                                    <select name="gender" class="form-select" required>
                                        <option value="Female" {{ (Auth::user()?->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                        <option value="Male" {{ (Auth::user()?->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                        <option value="Non-binary" {{ (Auth::user()?->gender == 'Non-binary') ? 'selected' : '' }}>Non-binary</option>
                                        <option value="Prefer not to say">Prefer not to say</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Medicare Fields Box -->
                            <div class="col-12 mt-3">
                                <div class="p-3 bg-light rounded-3 border" style="background-color: #F8F6F0 !important;">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <i class="bi bi-card-heading text-brand-sage fs-5"></i>
                                        <strong class="text-brand-contrast small">Australian Medicare Card Details (Optional for Telehealth)</strong>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <input type="text" name="medicare_number" class="form-control bg-white" placeholder="Medicare No. (10 digits)" value="{{ old('medicare_number', Auth::user()?->medicare_number) }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="medicare_ref" class="form-control bg-white" placeholder="Ref No. (e.g. 1)" value="{{ old('medicare_ref', Auth::user()?->medicare_ref ?? '1') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="medicare_expiry" class="form-control bg-white" placeholder="Expiry (MM/YY)" value="{{ old('medicare_expiry', Auth::user()?->medicare_expiry ?? '08/28') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Residential Address -->
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-brand-contrast">Residential Street Address *</label>
                                <div class="booking-input-wrap">
                                    <i class="bi bi-geo-alt booking-input-icon"></i>
                                    <input type="text" name="address_line1" class="form-control" placeholder="Level 1, 63-73 Ann street" value="{{ old('address_line1', Auth::user()?->address_line1 ?? 'Level 1, 63-73 Ann street') }}" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-semibold small text-brand-contrast">Suburb / City *</label>
                                <input type="text" name="city" class="form-control" placeholder="Surry Hills" value="{{ old('city', Auth::user()?->city ?? 'Surry Hills') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold small text-brand-contrast">State *</label>
                                <select name="state" class="form-select" required>
                                    <option value="NSW" selected>NSW</option>
                                    <option value="VIC">VIC</option>
                                    <option value="QLD">QLD</option>
                                    <option value="WA">WA</option>
                                    <option value="SA">SA</option>
                                    <option value="TAS">TAS</option>
                                    <option value="ACT">ACT</option>
                                    <option value="NT">NT</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold small text-brand-contrast">Postcode *</label>
                                <input type="text" name="postcode" class="form-control" placeholder="2010" value="{{ old('postcode', Auth::user()?->postcode ?? '2010') }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold small text-brand-contrast">Primary Symptoms &amp; Notes for Doctor</label>
                                <textarea name="patient_notes" class="form-control" rows="3" placeholder="Briefly describe your symptoms (chronic pain, insomnia, anxiety, past therapies)...">{{ old('patient_notes', $assessment ? 'Pre-assessment symptoms: ' . implode(', ', $assessment->primary_conditions ?? []) : '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Secure Payment Details -->
                    <div class="booking-step-card">
                        <div class="booking-step-header">
                            <div class="d-flex align-items-center gap-3">
                                <span class="booking-step-num">5</span>
                                <div>
                                    <h4 class="fw-bold text-brand-contrast mb-0 fs-5">Secure Consultation Payment</h4>
                                    <span class="small text-muted">256-bit encrypted checkout with instant receipt</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-1.5 text-muted small">
                                <i class="bi bi-shield-fill-check text-brand-primary fs-5"></i>
                                <span class="fw-semibold">SSL 256-Bit</span>
                            </div>
                        </div>

                        <div class="p-3 bg-light rounded-3 border mb-3" style="background-color: #FAF8F4 !important;">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-semibold small text-brand-contrast">Card Number *</label>
                                    <div class="booking-input-wrap">
                                        <i class="bi bi-credit-card booking-input-icon"></i>
                                        <input type="text" name="card_number" class="form-control bg-white font-monospace" placeholder="•••• •••• •••• 4242" value="4242 •••• •••• 4242" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-brand-contrast">Expiry Date (MM/YY) *</label>
                                    <div class="booking-input-wrap">
                                        <i class="bi bi-calendar-check booking-input-icon"></i>
                                        <input type="text" name="card_expiry" class="form-control bg-white" placeholder="12/28" value="12/28" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-brand-contrast">Security Code (CVC) *</label>
                                    <div class="booking-input-wrap">
                                        <i class="bi bi-shield-lock booking-input-icon"></i>
                                        <input type="text" name="card_cvc" class="form-control bg-white font-monospace" placeholder="123" value="123" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="consent_terms" required checked>
                            <label class="form-check-label small text-muted" for="consent_terms" style="line-height: 1.45;">
                                I consent to telehealth medical consultation under TGA SAS-B guidelines, cloud EHR record creation with MediRecords, and agree to the clinic consultation terms.
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Sticky Booking Summary Card -->
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="booking-summary-box">
                        <div class="booking-summary-header">
                            <div>
                                <h5 class="fw-bold text-brand-contrast mb-0">Booking Summary</h5>
                                <span class="small text-muted">Telehealth Order Details</span>
                            </div>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2.5 py-1">
                                <i class="bi bi-shield-check"></i> Secured
                            </span>
                        </div>

                        <!-- Itemized Breakdown -->
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="booking-summary-item">
                                <span class="text-muted">Clinical Pathway:</span>
                                <span class="fw-bold text-brand-contrast text-end ps-2" x-text="serviceName"></span>
                            </div>
                            <div class="booking-summary-item">
                                <span class="text-muted">Consult Duration:</span>
                                <span class="badge bg-brand-light text-brand-contrast border"><span x-text="serviceDuration"></span> mins</span>
                            </div>
                            <div class="booking-summary-item">
                                <span class="text-muted">Consulting Doctor:</span>
                                <span class="fw-semibold text-brand-contrast">Dr. Suneetha Batthala</span>
                            </div>
                            <div class="booking-summary-item">
                                <span class="text-muted">Format:</span>
                                <span class="fw-bold text-brand-primary" x-text="consultMode === 'telehealth_video' ? 'HD Video Room' : 'Direct Phone Call'"></span>
                            </div>
                        </div>

                        <!-- Appointment Time Slot Box -->
                        <div class="p-3 bg-brand-light rounded-3 border mb-3">
                            <div class="small text-muted mb-1"><i class="bi bi-clock-history text-brand-primary me-1"></i> Selected Appointment</div>
                            <div class="fw-bold text-brand-contrast fs-6">
                                <span x-text="selectedDateDisplay || selectedDate"></span>
                            </div>
                            <div class="fw-extrabold text-brand-primary fs-5 mt-0.5">
                                <span x-text="selectedSlotDisplay || 'Select a time slot'"></span>
                            </div>
                        </div>

                        <!-- Inclusions List -->
                        <div class="small text-muted mb-3">
                            <div class="d-flex align-items-center gap-2 mb-1.5">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>TGA SAS-B / AP Assessment Included</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-1.5">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>Instant e-Script SMS &amp; Pharmacy Dispatch</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>MediRecords EHR Patient File Sync</span>
                            </div>
                        </div>

                        <hr class="border-secondary border-opacity-25 my-3">

                        <!-- Total Price Display -->
                        <div class="d-flex justify-content-between align-items-baseline mb-4">
                            <span class="fs-5 fw-bold text-brand-contrast">Total Due:</span>
                            <div class="text-end">
                                <span class="fs-3 fw-extrabold text-brand-primary font-monospace">$<span x-text="servicePrice"></span>.00</span>
                                <div class="text-muted" style="font-size: 0.75rem;">AUD (GST Exempt)</div>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <button type="submit" class="btn-booking-confirm shadow">
                            <span>Confirm &amp; Book Consultation</span>
                            <i class="bi bi-arrow-right-circle-fill fs-5"></i>
                        </button>

                        <div class="text-center mt-3 small text-muted">
                            <i class="bi bi-lock-fill text-brand-sage me-1"></i> 100% Encrypted &bull; Instant Confirmation
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function bookingApp() {
    return {
        selectedServiceId: {{ $currentSelectedService->id ?? 1 }},
        selectedDoctorId: {{ $currentDoctor->id ?? 1 }},
        selectedDate: '{{ date("Y-m-d") }}',
        selectedDateDisplay: 'Today',
        selectedSlot: '10:00',
        selectedSlotDisplay: '10:00 AM',
        serviceName: {!! json_encode($currentSelectedService->name ?? 'Initial Telehealth Consultation') !!},
        servicePrice: {{ (int) ($currentSelectedService->price ?? 79) }},
        serviceDuration: {{ (int) ($currentSelectedService->duration_minutes ?? 20) }},
        consultMode: 'telehealth_video',
        slots: [],
        loadingSlots: false,
        init() {
            this.fetchSlots();
        },
        selectService(id, price, name, duration) {
            this.selectedServiceId = id;
            this.servicePrice = price;
            this.serviceName = name;
            this.serviceDuration = duration;
        },
        async fetchSlots() {
            if (!this.selectedDate) return;
            this.loadingSlots = true;
            try {
                const res = await fetch(`{{ route('booking.slots') }}?date=${this.selectedDate}&doctor_id=${this.selectedDoctorId}`);
                const data = await res.json();
                this.slots = data.slots || [];
                this.selectedDateDisplay = data.day_name || this.selectedDate;
                if (this.slots.length > 0 && !this.slots.some(s => s.time === this.selectedSlot && s.is_available)) {
                    const firstAvailable = this.slots.find(s => s.is_available);
                    if (firstAvailable) {
                        this.selectedSlot = firstAvailable.time;
                        this.selectedSlotDisplay = firstAvailable.display;
                    } else {
                        this.selectedSlot = '';
                        this.selectedSlotDisplay = '';
                    }
                }
            } catch (e) {
                console.error('Error fetching slots:', e);
            } finally {
                this.loadingSlots = false;
            }
        },
        validateForm(e) {
            if (!this.selectedSlot) {
                e.preventDefault();
                alert('Please select an available appointment time slot.');
            }
        }
    }
}
</script>
@endsection