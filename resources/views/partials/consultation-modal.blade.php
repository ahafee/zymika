<!-- Consultation Booking Modal (NewDoc Inspired Flow - 100% No Inline CSS) -->
<div class="modal fade consult-modal" id="consultBookingModal" tabindex="-1" aria-labelledby="consultBookingModalLabel" aria-hidden="true" x-data="bookingModalHandler()">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content consult-modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header consult-modal-header">
                <div>
                    <!-- Step 1 Title -->
                    <template x-if="step === 1">
                        <div>
                            <h2 class="consult-modal-title" id="consultBookingModalLabel">What do you need help with?</h2>
                            <div class="consult-modal-subtitle">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>All consults are with Australian trained, AHPRA registered GPs</span>
                            </div>
                        </div>
                    </template>

                    <!-- Step 2 Title -->
                    <template x-if="step === 2">
                        <div>
                            <h2 class="consult-modal-title">When would you like to be seen?</h2>
                            <div class="consult-match-text">We'll match you with the first available Australian registered doctor.</div>
                        </div>
                    </template>

                    <!-- Step 3 Title -->
                    <template x-if="step === 3">
                        <div>
                            <h2 class="consult-modal-title">Patient Intake Details</h2>
                            <div class="consult-modal-subtitle">
                                <i class="bi bi-shield-check"></i>
                                <span>Secure, Confidential &amp; Medicare Compliant</span>
                            </div>
                        </div>
                    </template>

                    <!-- Step 4 Title (Login) -->
                    <template x-if="step === 4">
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-sm btn-light rounded-circle" @click="step = 2" aria-label="Back">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <h2 class="consult-modal-title mb-0">Sign In</h2>
                        </div>
                    </template>

                    <!-- Step 5 Title (Sign Up) -->
                    <template x-if="step === 5">
                        <div class="d-flex align-items-center gap-2">
                            <button type="button" class="btn btn-sm btn-light rounded-circle" @click="step = 4" aria-label="Back">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <h2 class="consult-modal-title mb-0">Create Account</h2>
                        </div>
                    </template>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body consult-modal-body">
                
                <!-- ================= STEP 1: SERVICE SELECTION ================= -->
                <div x-show="step === 1" x-transition:enter.duration.300ms>
                    <div class="consult-service-grid">
                        
                        <!-- General Consult Card -->
                        <div class="consult-service-card" :class="{ 'selected': service === 'General consult' }" @click="selectService('General consult')">
                            <div>
                                <div class="consult-card-head">
                                    <h3 class="consult-card-title">General consult</h3>
                                    <i class="bi bi-chevron-right consult-card-arrow"></i>
                                </div>
                                <p class="consult-card-desc">
                                    For everyday health needs. For example: cold and flu, prescriptions, medical certificates, blood tests, referrals, results from another clinic, UTIs, skin or sexual health.
                                </p>
                            </div>
                        </div>

                        <!-- Mental Health Card -->
                        <div class="consult-service-card" :class="{ 'selected': service === 'Mental health' }" @click="selectService('Mental health')">
                            <div>
                                <div class="consult-card-head">
                                    <h3 class="consult-card-title">Mental health</h3>
                                    <i class="bi bi-chevron-right consult-card-arrow"></i>
                                </div>
                                <p class="consult-card-desc">
                                    For how you're feeling, thinking or coping. For example: anxiety, low mood, stress, sleep or medication.
                                </p>
                            </div>
                            <div class="consult-card-notice">
                                <i class="bi bi-info-circle"></i>
                                <span>We can't create, review or extend a Mental Health Care Plan.</span>
                            </div>
                        </div>

                    </div>

                    <!-- Reviewing Results Banner -->
                    <div class="consult-review-banner" @click="selectService('Results review')">
                        <div>
                            <strong>Reviewing results a Zymika GP sent you?</strong>
                            <span>Book a results review. Results from another clinic go under General consult.</span>
                        </div>
                        <i class="bi bi-chevron-right consult-card-arrow"></i>
                    </div>

                    <!-- Step 1 Footer Note -->
                    <div class="consult-step1-footer">
                        <span>Not sure? <a href="javascript:void(0)" @click="selectService('General consult')">Start with a General consult</a>. Your GP can redirect you.</span>
                        <span>We can't create or review chronic condition care plans.</span>
                    </div>
                </div>

                <!-- ================= STEP 2: TIME & SLOT SELECTION ================= -->
                <div x-show="step === 2" x-transition:enter.duration.300ms>
                    
                    <!-- Subbar showing selected service -->
                    <div class="consult-step2-subbar">
                        <div class="consult-selected-badge">
                            <i class="bi bi-clipboard2-pulse text-teal"></i>
                            <span x-text="service"></span>
                            <span class="consult-change-link" @click="step = 1">Change</span>
                        </div>
                        <div class="consult-match-text">
                            We'll match you with the first available doctor.
                        </div>
                    </div>

                    <!-- Previous Doctor Callout -->
                    <div class="consult-previous-callout">
                        <div>
                            <i class="bi bi-person-circle me-1 text-teal"></i>
                            <span>Want your previous doctor? Sign in to book with them.</span>
                        </div>
                        <a href="javascript:void(0)" @click="step = 4">
                            <span>Sign in</span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>

                    <!-- Soonest Available Box -->
                    <div class="consult-soonest-box">
                        <div>
                            <div class="consult-soonest-label">Soonest available</div>
                            <div class="consult-soonest-time" x-text="soonestSlotDisplay"></div>
                        </div>
                        <button type="button" class="consult-soonest-btn" @click="bookSoonestSlot()">
                            Book this time
                        </button>
                    </div>

                    <!-- 2-Column Slot Picker -->
                    <div class="consult-slots-row">
                        <!-- Left Column: Choose a day -->
                        <div>
                            <div class="consult-day-heading">Choose a day</div>
                            <div class="consult-days-list">
                                <template x-for="(day, index) in days" :key="index">
                                    <button type="button" 
                                            class="consult-day-pill" 
                                            :class="{ 'active': selectedDayIndex === index }"
                                            @click="selectDay(index)">
                                        <span x-text="day.label"></span>
                                        <span class="day-sub" x-text="day.dateStr"></span>
                                    </button>
                                </template>
                            </div>
                        </div>

                        <!-- Right Column: Time Slots -->
                        <div class="consult-times-panel">
                            <div class="consult-times-header">
                                <div class="consult-times-title" x-text="days[selectedDayIndex].fullDate"></div>
                                <div class="consult-times-tz">Times in AEDT (Melbourne/Sydney)</div>
                            </div>

                            <!-- Morning Slots -->
                            <div class="consult-time-period-label">Morning</div>
                            <div class="consult-time-grid">
                                <template x-for="time in morningSlots" :key="time">
                                    <button type="button" 
                                            class="consult-slot-box" 
                                            :class="{ 'selected': selectedSlot === time }"
                                            @click="selectedSlot = time"
                                            x-text="time">
                                    </button>
                                </template>
                            </div>

                            <!-- Afternoon Slots -->
                            <div class="consult-time-period-label">Afternoon</div>
                            <div class="consult-time-grid">
                                <template x-for="time in afternoonSlots" :key="time">
                                    <button type="button" 
                                            class="consult-slot-box" 
                                            :class="{ 'selected': selectedSlot === time }"
                                            @click="selectedSlot = time"
                                            x-text="time">
                                    </button>
                                </template>
                            </div>

                            <!-- Evening Slots -->
                            <div class="consult-time-period-label">Evening</div>
                            <div class="consult-time-grid">
                                <template x-for="time in eveningSlots" :key="time">
                                    <button type="button" 
                                            class="consult-slot-box" 
                                            :class="{ 'selected': selectedSlot === time }"
                                            @click="selectedSlot = time"
                                            x-text="time">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 Bottom Actions -->
                    <div class="consult-step2-actions">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" @click="step = 1">
                            Back
                        </button>
                        <button type="button" class="btn-continue" :disabled="!selectedSlot" @click="proceedToDetails()">
                            Continue
                        </button>
                    </div>

                </div>

                <!-- ================= STEP 3: PATIENT INTAKE FORM ================= -->
                <div x-show="step === 3" x-transition:enter.duration.300ms>
                    
                    <form action="{{ route('home.appointment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service" :value="service">
                        <input type="hidden" name="appointment_date" :value="days[selectedDayIndex].fullDate">
                        <input type="hidden" name="appointment_slot" :value="selectedSlot">
                        
                        <!-- Booking Summary Strip -->
                        <div class="consult-form-summary">
                            <div class="consult-form-summary-item">
                                <div>Service: <strong x-text="service"></strong></div>
                                <div>Time: <strong x-text="days[selectedDayIndex].label + ', ' + selectedSlot"></strong></div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3" @click="step = 2">
                                Change
                            </button>
                        </div>

                        <!-- Form Fields Grid -->
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakeFirstName">First Name *</label>
                                <input type="text" id="intakeFirstName" name="first_name" class="consult-input-control" placeholder="e.g. John" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakeLastName">Last Name</label>
                                <input type="text" id="intakeLastName" name="last_name" class="consult-input-control" placeholder="e.g. Smith">
                            </div>
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakePhone">Phone Number *</label>
                                <input type="tel" id="intakePhone" name="phone" class="consult-input-control" placeholder="e.g. 0411 174 173" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakeEmail">Patient Email *</label>
                                <input type="email" id="intakeEmail" name="email" class="consult-input-control" placeholder="e.g. john@example.com" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakeDob">Date of Birth</label>
                                <input type="date" id="intakeDob" name="dob" class="consult-input-control">
                            </div>
                            <div class="col-sm-6">
                                <label class="consult-input-label" for="intakeMedicare">Medicare Number (Optional)</label>
                                <input type="text" id="intakeMedicare" name="medicare_no" class="consult-input-control" placeholder="10-digit number">
                            </div>
                            <div class="col-12">
                                <label class="consult-input-label" for="intakeNotes">Notes for the Clinic (Optional)</label>
                                <textarea id="intakeNotes" name="message" class="consult-input-control" rows="2" placeholder="Briefly describe your health concern or repeat prescription requirements..."></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex align-items-center gap-3">
                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4" @click="step = 2">
                                Back
                            </button>
                            <button type="submit" class="consult-submit-btn flex-grow-1">
                                Confirm Consultation Booking
                            </button>
                        </div>

                    </form>
                </div>

                <!-- ================= STEP 4: SIGN IN (SCREENSHOT 4) ================= -->
                <div x-show="step === 4" x-transition:enter.duration.300ms>
                    <div class="consult-auth-wrapper">
                        <h3 class="consult-auth-title">Login</h3>
                        <p class="consult-auth-subtitle">Sign in to your patient account to book with your previous doctor</p>

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="text-start mb-3">
                                <label class="consult-input-label" for="authPhone">Phone Number or Email</label>
                                <input type="text" id="authPhone" name="email" class="consult-input-control" placeholder="0411 174 173 or email" required>
                            </div>
                            <div class="text-start mb-3">
                                <label class="consult-input-label" for="authPassword">Password or Date of Birth</label>
                                <input type="password" id="authPassword" name="password" class="consult-input-control" placeholder="Password" required>
                            </div>
                            <button type="submit" class="consult-auth-btn">
                                Login
                            </button>
                        </form>

                        <div class="consult-auth-switch">
                            <span>Don't have an account? </span>
                            <a href="javascript:void(0)" @click="step = 5">Sign up here</a>
                        </div>
                    </div>
                </div>

                <!-- ================= STEP 5: SIGN UP (SCREENSHOT 5) ================= -->
                <div x-show="step === 5" x-transition:enter.duration.300ms>
                    <div class="consult-auth-wrapper">
                        <h3 class="consult-auth-title">Welcome</h3>
                        <p class="consult-auth-subtitle">Create your account to access Zymika Health Telehealth</p>

                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="text-start mb-2.5">
                                <label class="consult-input-label" for="regName">First &amp; Last Name</label>
                                <input type="text" id="regName" name="name" class="consult-input-control" placeholder="Full legal name" required>
                            </div>
                            <div class="text-start mb-2.5">
                                <label class="consult-input-label" for="regEmail">Email Address</label>
                                <input type="email" id="regEmail" name="email" class="consult-input-control" placeholder="name@domain.com" required>
                            </div>
                            <div class="text-start mb-2.5">
                                <label class="consult-input-label" for="regPhone">Phone Number</label>
                                <input type="tel" id="regPhone" name="phone" class="consult-input-control" placeholder="0411 174 173" required>
                            </div>
                            <div class="text-start mb-3">
                                <label class="consult-input-label" for="regPassword">Password</label>
                                <input type="password" id="regPassword" name="password" class="consult-input-control" placeholder="Create strong password" required>
                            </div>
                            <button type="submit" class="consult-auth-btn">
                                Sign Up
                            </button>
                        </form>

                        <div class="consult-auth-switch">
                            <span>Already have an account? </span>
                            <a href="javascript:void(0)" @click="step = 4">Sign in here</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
function bookingModalHandler() {
    return {
        step: 1,
        service: 'General consult',
        selectedDayIndex: 0,
        selectedSlot: null,
        soonestSlotDisplay: 'Today, 10:15 AM',
        days: [
            { label: 'Today', dateStr: 'Mon 26 Oct', fullDate: 'Monday, 26 October 2026' },
            { label: 'Tomorrow', dateStr: 'Tue 27 Oct', fullDate: 'Tuesday, 27 October 2026' },
            { label: 'Wednesday', dateStr: 'Wed 28 Oct', fullDate: 'Wednesday, 28 October 2026' },
            { label: 'Thursday', dateStr: 'Thu 29 Oct', fullDate: 'Thursday, 29 October 2026' },
            { label: 'Friday', dateStr: 'Fri 30 Oct', fullDate: 'Friday, 30 October 2026' },
            { label: 'Saturday', dateStr: 'Sat 31 Oct', fullDate: 'Saturday, 31 October 2026' },
            { label: 'Sunday', dateStr: 'Sun 01 Nov', fullDate: 'Sunday, 01 November 2026' },
        ],
        morningSlots: ['08:30 AM', '09:00 AM', '09:20 AM', '09:40 AM', '10:15 AM', '10:45 AM', '11:15 AM', '11:45 AM'],
        afternoonSlots: ['01:00 PM', '01:30 PM', '02:00 PM', '02:30 PM', '03:15 PM', '03:45 PM', '04:15 PM', '04:45 PM'],
        eveningSlots: ['05:15 PM', '05:45 PM', '06:15 PM', '06:45 PM', '07:15 PM', '07:45 PM', '08:15 PM', '08:45 PM'],

        selectService(serviceName) {
            this.service = serviceName;
            this.step = 2;
        },

        selectDay(index) {
            this.selectedDayIndex = index;
            this.selectedSlot = null;
        },

        bookSoonestSlot() {
            this.selectedDayIndex = 0;
            this.selectedSlot = '10:15 AM';
            this.step = 3;
        },

        proceedToDetails() {
            if (this.selectedSlot) {
                this.step = 3;
            }
        }
    }
}
</script>
