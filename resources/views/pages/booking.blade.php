@extends('layouts.app')

@section('title', 'Book Telehealth Consultation - Dr. Suneetha Batthala | ZOVI LEAF')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Telehealth Booking Wizard</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Book Your Telehealth Consultation</h1>
        <p class="lead text-muted max-w-700 mx-auto">1-on-1 private video or phone consult with <strong>Dr. Suneetha Batthala</strong>. Integrated directly with MediRecords.</p>
    </div>
</div>

<div class="container py-5" x-data="bookingApp()">
    <form action="{{ route('booking.store') }}" method="POST" @submit="validateForm($event)">
        @csrf
        @if($assessment)
            <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
        @endif

        <div class="row g-5">
            <!-- Left Column: Steps -->
            <div class="col-lg-8" data-aos="fade-right">
                
                <!-- Step 1: Service Selection -->
                <div class="card card-zovi p-4 mb-4 bg-white border shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">1</span>
                        <h4 class="fw-bold text-brand-contrast mb-0">Select Consultation Type</h4>
                    </div>

                    <div class="row g-3">
                        @foreach($services as $s)
                            <div class="col-md-4">
                                <label class="border rounded-3 p-3 w-100 h-100 d-flex flex-column cursor-pointer" 
                                       :class="selectedServiceId == {{ $s->id }} ? 'border-brand-primary bg-brand-light' : 'bg-white'"
                                       style="cursor: pointer;">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <input type="radio" name="service_id" value="{{ $s->id }}" x-model="selectedServiceId" @change="updateServicePrice({{ $s->id }}, {{ $s->price }}, '{{ $s->name }}', {{ $s->duration_minutes }})" class="form-check-input mt-0">
                                        <span class="fw-extrabold text-brand-primary">${{ number_format($s->price, 0) }}</span>
                                    </div>
                                    <strong class="text-brand-contrast small mb-1">{{ $s->name }}</strong>
                                    <span class="text-muted small mt-auto"><i class="bi bi-clock me-1"></i> {{ $s->duration_minutes }} mins</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step 2: Doctor & Consult Format -->
                <div class="card card-zovi p-4 mb-4 bg-white border shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">2</span>
                        <h4 class="fw-bold text-brand-contrast mb-0">Select Practitioner & Mode</h4>
                    </div>

                    <div class="row g-3 mb-3">
                        @foreach($doctors as $doc)
                            <div class="col-12">
                                <label class="border rounded-3 p-3 w-100 d-flex align-items-center gap-3 cursor-pointer"
                                       :class="selectedDoctorId == {{ $doc->id }} ? 'border-brand-primary bg-brand-light' : 'bg-white'"
                                       style="cursor: pointer;">
                                    <input type="radio" name="doctor_id" value="{{ $doc->id }}" x-model="selectedDoctorId" @change="fetchSlots()" class="form-check-input mt-0">
                                    <div class="bg-brand-contrast text-white rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="bi bi-person-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-brand-contrast">{{ $doc->full_name }}</div>
                                        <div class="small text-muted">{{ $doc->specialty }} | AHPRA: {{ $doc->ahpra_number }}</div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <label class="form-label fw-semibold small text-brand-contrast">Consultation Format *</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consult_type" id="mode_video" value="telehealth_video" checked>
                            <label class="form-check-label small" for="mode_video"><i class="bi bi-camera-video me-1"></i> Secure Video Consult (Recommended)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="consult_type" id="mode_phone" value="telehealth_phone">
                            <label class="form-check-label small" for="mode_phone"><i class="bi bi-telephone me-1"></i> Phone Consultation</label>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Date & Real-Time Time Slots -->
                <div class="card card-zovi p-4 mb-4 bg-white border shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">3</span>
                        <h4 class="fw-bold text-brand-contrast mb-0">Choose Date & Time Slot</h4>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label fw-semibold small text-brand-contrast">Select Consultation Date *</label>
                            <input type="date" name="appointment_date" class="form-control form-control-lg" 
                                   min="{{ date('Y-m-d') }}" 
                                   x-model="selectedDate" 
                                   @change="fetchSlots()" required>
                        </div>

                        <div class="col-md-7">
                            <label class="form-label fw-semibold small text-brand-contrast">Available Time Slots (<span x-text="selectedDateDisplay"></span>) *</label>
                            
                            <div x-show="loadingSlots" class="text-center py-4">
                                <span class="spinner-border spinner-border-sm text-brand-primary"></span>
                                <span class="small text-muted ms-2">Checking practitioner diary...</span>
                            </div>

                            <div x-show="!loadingSlots && slots.length === 0" class="p-3 bg-light rounded text-center small text-muted">
                                No available slots for this date. Please select another day (Monday to Saturday).
                            </div>

                            <div x-show="!loadingSlots && slots.length > 0" class="row g-2" style="max-height: 220px; overflow-y: auto;">
                                <template x-for="slot in slots" :key="slot.time">
                                    <div class="col-4">
                                        <label class="btn btn-sm w-100 border"
                                               :class="selectedSlot === slot.time ? 'btn-brand-primary' : (slot.is_available ? 'btn-outline-secondary' : 'btn-light disabled opacity-50')"
                                               :style="!slot.is_available ? 'pointer-events: none;' : 'cursor: pointer;'">
                                            <input type="radio" name="start_time" :value="slot.time" x-model="selectedSlot" class="d-none" :disabled="!slot.is_available" required>
                                            <span x-text="slot.display"></span>
                                        </label>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Patient Demographics & Medicare -->
                <div class="card card-zovi p-4 mb-4 bg-white border shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">4</span>
                        <h4 class="fw-bold text-brand-contrast mb-0">Patient & Medicare Details</h4>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">First Name *</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', explode(' ', Auth::user()?->name ?? ($assessment?->full_name ?? ''))[0] ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Last Name *</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', explode(' ', Auth::user()?->name ?? ($assessment?->full_name ?? ''))[1] ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Email Address (for Video Consult Link) *</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()?->email ?? ($assessment?->email ?? '')) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Mobile Phone *</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()?->phone ?? ($assessment?->phone ?? '')) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Date of Birth *</label>
                            <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', Auth::user()?->date_of_birth?->format('Y-m-d') ?? '1990-05-15') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Gender *</label>
                            <select name="gender" class="form-select" required>
                                <option value="Female" {{ (Auth::user()?->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                <option value="Male" {{ (Auth::user()?->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                <option value="Non-binary" {{ (Auth::user()?->gender == 'Non-binary') ? 'selected' : '' }}>Non-binary</option>
                                <option value="Prefer not to say">Prefer not to say</option>
                            </select>
                        </div>

                        <!-- Medicare Fields -->
                        <div class="col-md-5">
                            <label class="form-label fw-semibold small text-brand-contrast">Medicare Card Number</label>
                            <input type="text" name="medicare_number" class="form-control" placeholder="2938 10293" value="{{ old('medicare_number', Auth::user()?->medicare_number) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-brand-contrast">Ref No.</label>
                            <input type="text" name="medicare_ref" class="form-control" placeholder="1" value="{{ old('medicare_ref', Auth::user()?->medicare_ref ?? '1') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Expiry (MM/YY)</label>
                            <input type="text" name="medicare_expiry" class="form-control" placeholder="08/28" value="{{ old('medicare_expiry', Auth::user()?->medicare_expiry ?? '08/2028') }}">
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Residential Street Address *</label>
                            <input type="text" name="address_line1" class="form-control" placeholder="Level 1, 63-73 Ann street" value="{{ old('address_line1', Auth::user()?->address_line1 ?? 'Level 1, 63-73 Ann street') }}" required>
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
                            <label class="form-label fw-semibold small text-brand-contrast">Clinical Symptoms & Reason for Visit</label>
                            <textarea name="patient_notes" class="form-control" rows="3" placeholder="Briefly describe your main symptoms and pain/sleep issues...">{{ old('patient_notes', $assessment ? 'Pre-assessment symptoms: ' . implode(', ', $assessment->primary_conditions ?? []) : '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Secure Payment Details -->
                <div class="card card-zovi p-4 mb-4 bg-white border shadow-sm">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="bg-brand-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">5</span>
                        <h4 class="fw-bold text-brand-contrast mb-0">Secure Consultation Payment</h4>
                    </div>

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Card Number *</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                <input type="text" name="card_number" class="form-control" placeholder="•••• •••• •••• 4242" value="4242 •••• •••• 4242" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Expiry Date (MM/YY) *</label>
                            <input type="text" name="card_expiry" class="form-control" placeholder="12/28" value="12/28" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Security Code (CVC) *</label>
                            <input type="text" name="card_cvc" class="form-control" placeholder="123" value="123" required>
                        </div>
                    </div>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="consent_terms" required checked>
                        <label class="form-check-label small text-muted" for="consent_terms">
                            I consent to telehealth medical consultation under TGA SAS-B guidelines, secure recording in MediRecords EHR, and agree to the consultation cancellation terms.
                        </label>
                    </div>
                </div>

            </div>

            <!-- Right Column: Booking Summary & Checkout Button -->
            <div class="col-lg-4" data-aos="fade-left">
                <div class="card card-zovi p-4 bg-white border sticky-top shadow-sm" style="top: 100px;">
                    <h5 class="fw-bold text-brand-contrast mb-3">Booking Summary</h5>

                    <div class="mb-3 pb-3 border-bottom">
                        <div class="small text-muted">Service:</div>
                        <div class="fw-bold text-brand-contrast" x-text="serviceName"></div>
                        <div class="small text-muted"><span x-text="serviceDuration"></span> minutes consultation</div>
                    </div>

                    <div class="mb-3 pb-3 border-bottom">
                        <div class="small text-muted">Practitioner:</div>
                        <div class="fw-bold text-brand-contrast">Dr. Suneetha Batthala</div>
                        <div class="small text-muted">AHPRA Authorised Prescriber</div>
                    </div>

                    <div class="mb-3 pb-3 border-bottom">
                        <div class="small text-muted">Appointment Time:</div>
                        <div class="fw-bold text-brand-primary">
                            <span x-text="selectedDate"></span> at <span x-text="selectedSlotDisplay || 'Select a time slot'"></span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fs-5 fw-bold text-brand-contrast">Total Fee:</span>
                        <span class="fs-4 fw-extrabold text-brand-primary">$<span x-text="servicePrice"></span>.00</span>
                    </div>

                    <button type="submit" class="btn btn-brand-primary btn-lg w-100 py-3 fw-bold shadow">
                        Confirm & Pay Consultation <i class="bi bi-lock-fill ms-1"></i>
                    </button>

                    <div class="text-center mt-3 small text-muted">
                        <i class="bi bi-shield-check text-brand-sage"></i> 256-bit Encrypted Telehealth Booking
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function bookingApp() {
    return {
        selectedServiceId: {{ $selectedServiceId ?? 1 }},
        selectedDoctorId: {{ $selectedDoctorId ?? 1 }},
        selectedDate: '{{ date("Y-m-d") }}',
        selectedDateDisplay: 'Today',
        selectedSlot: '10:00',
        selectedSlotDisplay: '10:00 AM',
        serviceName: 'Initial Telehealth Consultation',
        servicePrice: 79,
        serviceDuration: 20,
        slots: [],
        loadingSlots: false,
        init() {
            this.fetchSlots();
        },
        updateServicePrice(id, price, name, duration) {
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
                if (this.slots.length > 0 && !this.slots.some(s => s.time === this.selectedSlot)) {
                    const firstAvailable = this.slots.find(s => s.is_available);
                    if (firstAvailable) {
                        this.selectedSlot = firstAvailable.time;
                        this.selectedSlotDisplay = firstAvailable.display;
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