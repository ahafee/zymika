@extends('layouts.app')

@section('title', 'Secure Checkout - ZOVI LEAF Dispensary')

@section('content')
<div class="py-5 bg-brand-light border-bottom">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">Encrypted 256-Bit Checkout</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Dispensary Checkout</h1>
        <p class="lead text-muted max-w-700 mx-auto">Complete your shipping address and prescription acknowledgement.</p>
    </div>
</div>

<div class="container py-5">
    <form action="{{ route('shop.checkout.process') }}" method="POST">
        @csrf
        <div class="row g-5">
            <!-- Left: Shipping & Payment -->
            <div class="col-lg-8">
                
                <!-- 1. Patient & Delivery Address -->
                <div class="card card-zovi p-4 mb-4 bg-white border">
                    <h5 class="fw-bold text-brand-contrast mb-3"><i class="bi bi-geo-alt-fill text-brand-primary me-2"></i> 1. Delivery Details (Australia Post Express)</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">First Name *</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', explode(' ', Auth::user()?->name ?? '')[0] ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Last Name *</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', explode(' ', Auth::user()?->name ?? '')[1] ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Email (for Tracking Updates) *</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()?->email) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Contact Mobile Number *</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', Auth::user()?->phone) }}" placeholder="0412 345 678" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Street Address *</label>
                            <input type="text" name="address_line1" class="form-control" placeholder="123 Example Street" value="{{ old('address_line1', Auth::user()?->address_line1) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Apartment, suite, unit (optional)</label>
                            <input type="text" name="address_line2" class="form-control" placeholder="Unit 4B" value="{{ old('address_line2', Auth::user()?->address_line2) }}">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-semibold small text-brand-contrast">Suburb / City *</label>
                            <input type="text" name="city" class="form-control" placeholder="Surry Hills" value="{{ old('city', Auth::user()?->city) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">State *</label>
                            <select name="state" class="form-select" required>
                                <option value="NSW" {{ (Auth::user()?->state == 'NSW') ? 'selected' : '' }}>NSW</option>
                                <option value="VIC" {{ (Auth::user()?->state == 'VIC') ? 'selected' : '' }}>VIC</option>
                                <option value="QLD" {{ (Auth::user()?->state == 'QLD') ? 'selected' : '' }}>QLD</option>
                                <option value="WA" {{ (Auth::user()?->state == 'WA') ? 'selected' : '' }}>WA</option>
                                <option value="SA" {{ (Auth::user()?->state == 'SA') ? 'selected' : '' }}>SA</option>
                                <option value="TAS" {{ (Auth::user()?->state == 'TAS') ? 'selected' : '' }}>TAS</option>
                                <option value="ACT" {{ (Auth::user()?->state == 'ACT') ? 'selected' : '' }}>ACT</option>
                                <option value="NT" {{ (Auth::user()?->state == 'NT') ? 'selected' : '' }}>NT</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold small text-brand-contrast">Postcode *</label>
                            <input type="text" name="postcode" class="form-control" placeholder="2010" value="{{ old('postcode', Auth::user()?->postcode) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Special Delivery Instructions</label>
                            <textarea name="customer_notes" class="form-control" rows="2" placeholder="Leave unattended if safe, gate code, etc."></textarea>
                        </div>
                    </div>
                </div>

                <!-- 2. Prescription & Regulatory Verification -->
                @if($hasPrescriptionRequiredItems)
                    <div class="card card-zovi p-4 mb-4 bg-white border">
                        <h5 class="fw-bold text-brand-contrast mb-2"><i class="bi bi-shield-check text-brand-sage me-2"></i> 2. Prescription Verification</h5>
                        <p class="small text-muted mb-3">Your order contains TGA Schedule 4 / Schedule 8 medicinal cannabis products.</p>

                        @if($user && count($prescriptions) > 0)
                            <div class="p-3 bg-brand-light rounded-3 border mb-3">
                                <span class="badge bg-success mb-2"><i class="bi bi-check-circle"></i> Active Prescriptions Detected</span>
                                <div class="small fw-semibold text-brand-contrast">You have {{ count($prescriptions) }} active script(s) issued by Dr. Suneetha Batthala on file.</div>
                            </div>
                        @else
                            <div class="p-3 bg-warning bg-opacity-10 rounded-3 border border-warning mb-3">
                                <span class="badge bg-warning text-dark mb-1"><i class="bi bi-exclamation-triangle"></i> Physician Verification Step</span>
                                <p class="small text-muted mb-0">If you do not have an active prescription on file yet, Dr. Suneetha Batthala will review your intake or contact you for a rapid telehealth approval prior to pharmacy fulfillment.</p>
                            </div>
                        @endif

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="prescription_ack" id="prescription_ack" required checked>
                            <label class="form-check-label small text-brand-contrast" for="prescription_ack">
                                I confirm that I am over 18 years of age, residing in Australia, and acknowledge that medications will be compounded and dispatched in compliance with TGA regulations and doctor prescription.
                            </label>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="prescription_ack" value="1">
                @endif

                <!-- 3. Payment Method -->
                <div class="card card-zovi p-4 mb-4 bg-white border">
                    <h5 class="fw-bold text-brand-contrast mb-3"><i class="bi bi-credit-card-2-front-fill text-brand-primary me-2"></i> 3. Payment Method</h5>

                    <div class="mb-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="pay_card" value="card" checked>
                            <label class="form-check-label fw-semibold small text-brand-contrast" for="pay_card">
                                Credit / Debit Card (Visa, Mastercard, AMEX)
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="pay_medpay" value="medpay">
                            <label class="form-check-label fw-semibold small text-brand-contrast" for="pay_medpay">
                                MedPay Health Direct Debit
                            </label>
                        </div>
                    </div>

                    <div class="row g-3 p-3 bg-light rounded-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Card Number</label>
                            <input type="text" name="card_number" class="form-control" placeholder="•••• •••• •••• 4242" value="4242 •••• •••• 4242">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Expiry Date (MM/YY)</label>
                            <input type="text" name="card_expiry" class="form-control" placeholder="09/28" value="09/28">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Security Code (CVC)</label>
                            <input type="text" name="card_cvc" class="form-control" placeholder="884" value="884">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right: Order Summary -->
            <div class="col-lg-4">
                <div class="card card-zovi p-4 bg-white border sticky-top" style="top: 100px;">
                    <h5 class="fw-bold text-brand-contrast mb-3">Items in Order</h5>

                    <div class="mb-3" style="max-height: 240px; overflow-y: auto;">
                        @foreach($cart as $item)
                            <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom small">
                                <div>
                                    <div class="fw-semibold text-brand-contrast">{{ $item['name'] }}</div>
                                    <div class="text-muted">Qty: {{ $item['quantity'] }} &times; ${{ number_format($item['price'], 2) }}</div>
                                </div>
                                <div class="fw-bold text-brand-contrast">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between mb-2 small">
                        <span class="text-muted">Subtotal:</span>
                        <span class="fw-semibold text-brand-contrast">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom small">
                        <span class="text-muted">Express Medical Delivery:</span>
                        <span class="fw-semibold text-brand-contrast">${{ number_format($shipping, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fs-5 fw-bold text-brand-contrast">Total:</span>
                        <span class="fs-4 fw-extrabold text-brand-primary">${{ number_format($total, 2) }}</span>
                    </div>

                    <button type="submit" class="btn btn-brand-primary btn-lg w-100 py-3 fw-bold shadow">
                        Place Order & Pay <i class="bi bi-lock-fill ms-1"></i>
                    </button>

                    <div class="text-center mt-3 small text-muted">
                        <i class="bi bi-shield-check text-brand-sage"></i> AusPost Express Discreet Tracking
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection