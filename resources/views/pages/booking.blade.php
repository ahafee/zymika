@extends('layouts.app')

@section('title', 'Book Appointment - Zymika Health | A Smoother Way to Book Your Care Visit')

@section('content')
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f0fafb 0%, #e7f9fb 50%, #f6fcfe 100%); min-height: 90vh;">
    <div class="container py-lg-4" style="max-width: 1240px;">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4 g-lg-5 align-items-stretch">
            
            <!-- Left Info Panel (Matches Reference Screenshot 100%) -->
            <div class="col-lg-5 d-flex" data-aos="fade-right">
                <div class="p-4 p-md-5 rounded-5 text-white d-flex flex-column justify-content-between w-100 shadow-lg" style="background: linear-gradient(165deg, #0f2d59 0%, #0d264c 50%, #081a33 100%);">
                    <div>
                        <span class="badge px-3 py-1.5 rounded-pill fw-bold text-uppercase mb-3" style="background-color: rgba(58, 163, 162, 0.25); color: #72e3d8; font-size: 0.75rem; letter-spacing: 0.08em;">
                            BOOK AN APPOINTMENT
                        </span>
                        <h2 class="display-6 fw-bold text-white mb-2 lh-sm">
                            A smoother way to book your care visit.
                        </h2>
                        <p class="text-white-50 small mb-4 pb-2" style="font-size: 0.95rem; line-height: 1.6;">
                            Move from doctor selection to slot confirmation without distractions or extra steps.
                        </p>

                        <!-- 3 Step Items -->
                        <div class="d-flex flex-column gap-3 mb-4">
                            <!-- Step 1 -->
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background-color: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; background-color: rgba(58, 163, 162, 0.3); color: #72e3d8;">
                                    <i class="bi bi-person-badge fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1 fs-6">Choose a doctor</h6>
                                    <p class="text-white-50 small mb-0 lh-base">Browse available specialists for your appointment.</p>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background-color: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; background-color: rgba(58, 163, 162, 0.3); color: #72e3d8;">
                                    <i class="bi bi-calendar-event fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1 fs-6">See live slots</h6>
                                    <p class="text-white-50 small mb-0 lh-base">Pick from current availability and avoid back-and-forth.</p>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background-color: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 42px; height: 42px; background-color: rgba(58, 163, 162, 0.3); color: #72e3d8;">
                                    <i class="bi bi-shield-check fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-white mb-1 fs-6">Confirm payment</h6>
                                    <p class="text-white-50 small mb-0 lh-base">Finish the booking with your preferred payment method.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip Box at Bottom -->
                    <div class="p-3 rounded-4 mt-auto" style="background-color: rgba(255, 255, 255, 0.04); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="text-uppercase fw-bold text-brand-primary mb-1 small" style="color: #72e3d8 !important; font-size: 0.75rem; letter-spacing: 0.05em;">TIP</div>
                        <p class="text-white text-opacity-75 small mb-0 lh-base" style="font-size: 0.85rem;">
                            You can select or change doctor/service in any order; incompatible selections will automatically reset the other field.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Booking Form (Matches Reference Screenshot 100%) -->
            <div class="col-lg-7 d-flex" data-aos="fade-left">
                <div class="card border-0 shadow-lg rounded-5 bg-white p-4 p-md-5 w-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Title & Login Toggle -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 pb-2 border-bottom">
                            <h2 class="h3 fw-bold text-brand-contrast mb-0">Book Appointment</h2>
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" id="existingAccount" onchange="togglePatientLogin(this.checked)">
                                <label class="form-check-label text-muted small fw-medium" for="existingAccount">
                                    Already have patient account
                                </label>
                            </div>
                        </div>

                        <!-- Booking Form -->
                        <form action="{{ route('home.appointment') }}" method="POST" id="appointmentBookingForm">
                            @csrf
                            <input type="hidden" name="selected_slot" id="selected_slot" value="10:00 AM">
                            
                            <div class="row g-3">
                                <!-- First Name & Last Name -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">First Name *</label>
                                    <input type="text" name="first_name" required class="form-control rounded-3 py-2.5 px-3 fs-6" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Last Name</label>
                                    <input type="text" name="last_name" class="form-control rounded-3 py-2.5 px-3 fs-6" placeholder="Last Name">
                                </div>

                                <!-- Patient Email & Doctor -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Patient Email *</label>
                                    <input type="email" name="email" required class="form-control rounded-3 py-2.5 px-3 fs-6" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Doctor *</label>
                                    <select name="doctor_id" id="doctor_select" class="form-select rounded-3 py-2.5 px-3 fs-6" required onchange="updateSlots()">
                                        <option value="" disabled>Select Doctor</option>
                                        <option value="6" selected>Dr Bazel Lodhi (General Practitioner)</option>
                                    </select>
                                </div>

                                <!-- Service & Date of Birth -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Service *</label>
                                    <select name="service_id" id="service_select" class="form-select rounded-3 py-2.5 px-3 fs-6" required onchange="updateServicePrice(this.value)">
                                        <option value="" disabled>Select Service</option>
                                        <option value="1" data-price="65.00" {{ request('service_id') == 1 || !request('service_id') ? 'selected' : '' }}>GP Online Consultation (15 min)</option>
                                        <option value="2" data-price="120.00" {{ request('service_id') == 2 ? 'selected' : '' }}>Cardiology Review (20 min)</option>
                                        <option value="3" data-price="80.00" {{ request('service_id') == 3 ? 'selected' : '' }}>Skin Treatment (15 min)</option>
                                        <option value="4" data-price="75.00" {{ request('service_id') == 4 ? 'selected' : '' }}>Pediatric Consultation (20 min)</option>
                                        <option value="5" data-price="95.00" {{ request('service_id') == 5 ? 'selected' : '' }}>Dental Checkup (30 min)</option>
                                        <option value="6" data-price="35.00" {{ request('service_id') == 6 ? 'selected' : '' }}>Repeat Prescription (10 min)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Date of Birth *</label>
                                    <input type="date" name="dob" required class="form-control rounded-3 py-2.5 px-3 fs-6" placeholder="yyyy-mm-dd">
                                </div>

                                <!-- Contact No & Appointment Date -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Contact No *</label>
                                    <input type="tel" name="phone" required class="form-control rounded-3 py-2.5 px-3 fs-6" placeholder="Contact No">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Appointment Date *</label>
                                    <input type="date" name="appointment_date" id="appointment_date" required class="form-control rounded-3 py-2.5 px-3 fs-6" value="{{ date('Y-m-d', strtotime('+1 day')) }}" min="{{ date('Y-m-d') }}" onchange="updateSlots()">
                                </div>

                                <!-- Payment Method & Payable Amount -->
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Payment Method *</label>
                                    <select name="payment_method" class="form-select rounded-3 py-2.5 px-3 fs-6" required>
                                        <option value="Tyro Health Online" selected>Tyro Health Online</option>
                                        <option value="Credit / Debit Card">Credit / Debit Card</option>
                                        <option value="Medicare / DVA Rebate">Medicare / DVA Rebate</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Payable Amount</label>
                                    <input type="text" id="payable_amount_input" readonly class="form-control rounded-3 py-2.5 px-3 fs-6 bg-light text-brand-contrast fw-bold" value="AUD 65.00">
                                </div>

                                <!-- Available Slots Box -->
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label small fw-semibold text-brand-contrast mb-0">Available Slots *</label>
                                        <div class="d-flex align-items-center gap-3 small">
                                            <span><span class="d-inline-block rounded-circle me-1" style="width: 8px; height: 8px; background-color: #dc3545;"></span> Booked</span>
                                            <span><span class="d-inline-block rounded-circle me-1" style="width: 8px; height: 8px; background-color: #198754;"></span> Available</span>
                                        </div>
                                    </div>

                                    <!-- Interactive Slots Container -->
                                    <div class="p-3 rounded-4 border bg-light" id="slots_container">
                                        <div class="d-flex flex-wrap gap-2 justify-content-start" id="slots_list">
                                            <button type="button" class="btn btn-sm btn-outline-danger disabled rounded-pill px-3 py-1.5" style="opacity: 0.6;">09:00 AM (Booked)</button>
                                            <button type="button" class="btn btn-sm btn-outline-danger disabled rounded-pill px-3 py-1.5" style="opacity: 0.6;">09:30 AM (Booked)</button>
                                            <button type="button" class="btn btn-sm btn-outline-success active-slot rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('10:00 AM', this)" style="background-color: #198754; color: white;">10:00 AM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('10:30 AM', this)">10:30 AM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('11:00 AM', this)">11:00 AM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('02:00 PM', this)">02:00 PM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('02:30 PM', this)">02:30 PM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('03:00 PM', this)">03:00 PM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('03:30 PM', this)">03:30 PM</button>
                                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1.5 fw-semibold slot-btn" onclick="selectSlot('04:00 PM', this)">04:00 PM</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-brand-contrast mb-1">Notes</label>
                                    <textarea name="message" rows="2" class="form-control rounded-3 py-2 px-3 fs-6" placeholder="Add notes for the clinic team"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn px-5 py-3 rounded-pill fw-semibold text-white shadow-sm d-inline-flex align-items-center justify-content-center gap-2" style="background-color: #0f2d59; font-size: 1rem; min-width: 240px; transition: all 0.3s ease;">
                                        <span>Confirm Booking</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FAQs Section -->
@include('partials.faqs')

<!-- CTA Section -->
@include('partials.cta-banner')

<script>
function selectSlot(time, btn) {
    document.getElementById('selected_slot').value = time;
    document.querySelectorAll('.slot-btn').forEach(b => {
        b.style.backgroundColor = 'transparent';
        b.style.color = '#198754';
    });
    btn.style.backgroundColor = '#198754';
    btn.style.color = '#ffffff';
}

function updateServicePrice(serviceId) {
    var select = document.getElementById('service_select');
    var selectedOption = select.options[select.selectedIndex];
    var price = selectedOption.getAttribute('data-price') || '65.00';
    document.getElementById('payable_amount_input').value = 'AUD ' + price;
}

function togglePatientLogin(isChecked) {
    if (isChecked) {
        window.location.href = "{{ route('login') }}";
    }
}

function updateSlots() {
    // Re-highlight first available slot on date change
    var firstSlot = document.querySelector('.slot-btn');
    if (firstSlot) {
        firstSlot.click();
    }
}
</script>
@endsection
