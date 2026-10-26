<!-- Booking Form Section -->
<section class="py-5 position-relative overflow-hidden" id="booking-section" style="background-color: #f7fbfc;">
    <div class="container py-lg-4" style="max-width: 1080px;">
        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-5" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-semibold mb-2" style="background-color: rgba(15, 45, 89, 0.08); color: #0f2d59; font-size: 0.85rem; letter-spacing: 0.05em; text-transform: uppercase;">
                    Easy Access
                </span>
                <h2 class="display-6 fw-bold text-brand-contrast mb-3">Book Telehealth Appointment Online</h2>
                <p class="text-muted lead fs-6 mb-4">
                    Book an online virtual doctor Australia with Zymika Health and get suitable healthcare support online from your home.
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm border">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background-color: #3aa3a2;">
                            <i class="bi bi-shield-check fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-semibold text-brand-contrast">Secure Consultation</div>
                            <small class="text-muted">100% confidential Australian-compliant care</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm border">
                        <div class="rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 44px; height: 44px; background-color: #0f2d59;">
                            <i class="bi bi-clock-history fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-semibold text-brand-contrast">Flexible Appointment Timing</div>
                            <small class="text-muted">Same day and after-hours availability</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header border-0 py-3 px-4 text-white" style="background-color: #0f2d59;">
                        <h5 class="mb-0 fw-semibold fs-5"><i class="bi bi-calendar2-check me-2 text-brand-primary"></i> Request Telehealth Consultation</h5>
                    </div>
                    <div class="card-body p-4 p-md-5 bg-white">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('home.appointment') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Full Name *</label>
                                    <input type="text" name="name" required class="form-control form-control-lg fs-6 rounded-3" placeholder="Enter your full name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Email Address *</label>
                                    <input type="email" name="email" required class="form-control form-control-lg fs-6 rounded-3" placeholder="name@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Phone *</label>
                                    <input type="tel" name="phone" required class="form-control form-control-lg fs-6 rounded-3" placeholder="0400 000 000">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Reason for Consultation *</label>
                                    <select name="reason" class="form-select form-select-lg fs-6 rounded-3" required>
                                        <option value="" selected disabled>Select your healthcare reason</option>
                                        <option value="General GP Consultations">General GP Consultations</option>
                                        <option value="Prescriptions & Medical">Prescriptions & Medical</option>
                                        <option value="Medicinal Cannabis Consultations">Medicinal Cannabis Consultations</option>
                                        <option value="Mental Health & Wellbeing">Mental Health & Wellbeing</option>
                                        <option value="Urgent & After Hours Care">Urgent & After Hours Care</option>
                                        <option value="Health Cannabis Compounding">Health Cannabis Compounding</option>
                                        <option value="Other Medical Enquiry">Other Medical Enquiry</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-brand-contrast small mb-1">Message</label>
                                    <textarea name="message" rows="3" class="form-control fs-6 rounded-3" placeholder="Briefly describe your symptoms or request..."></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-lg w-100 py-3 rounded-pill fw-semibold text-white shadow-sm d-flex align-items-center justify-content-center gap-2" style="background-color: #0f2d59; transition: all 0.3s ease;">
                                        <span>Book Telehealth Appointment Online</span>
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
