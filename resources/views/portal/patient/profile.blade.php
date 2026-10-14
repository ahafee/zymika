@extends('layouts.portal')

@section('title', 'Patient Profile & Medicare')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-brand-contrast mb-1">Profile & Medicare Information</h2>
    <p class="text-muted small">Keep your contact and Medicare details up to date for TGA SAS-B submissions.</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card card-zymika p-4 p-md-5 bg-white border">
            <form action="{{ route('patient.profile.update') }}" method="POST">
                @csrf
                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">Personal Details</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Full Legal Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Email Address (Read-only)</label>
                        <input type="email" class="form-control bg-light" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold small text-brand-contrast">Mobile Phone *</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">Date of Birth *</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->date_of_birth?->format('Y-m-d')) }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">Gender *</label>
                        <select name="gender" class="form-select" required>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Non-binary" {{ $user->gender == 'Non-binary' ? 'selected' : '' }}>Non-binary</option>
                        </select>
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">Medicare & Healthcare Identifiers</h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-brand-contrast">Medicare Number</label>
                        <input type="text" name="medicare_number" class="form-control" placeholder="2938 10293" value="{{ old('medicare_number', $user->medicare_number) }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">Reference No.</label>
                        <input type="text" name="medicare_ref" class="form-control" placeholder="1" value="{{ old('medicare_ref', $user->medicare_ref) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">Expiry Date (MM/YY)</label>
                        <input type="text" name="medicare_expiry" class="form-control" placeholder="08/28" value="{{ old('medicare_expiry', $user->medicare_expiry) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">Individual Healthcare Identifier (IHI)</label>
                        <input type="text" name="ihi_number" class="form-control" placeholder="8003601234567890" value="{{ old('ihi_number', $user->ihi_number) }}">
                    </div>
                </div>

                <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">Residential Address</h5>
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <label class="form-label fw-semibold small text-brand-contrast">Street Address *</label>
                        <input type="text" name="address_line1" class="form-control" value="{{ old('address_line1', $user->address_line1) }}" required>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label fw-semibold small text-brand-contrast">Suburb / City *</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold small text-brand-contrast">State *</label>
                        <select name="state" class="form-select" required>
                            <option value="NSW" {{ $user->state == 'NSW' ? 'selected' : '' }}>NSW</option>
                            <option value="VIC" {{ $user->state == 'VIC' ? 'selected' : '' }}>VIC</option>
                            <option value="QLD" {{ $user->state == 'QLD' ? 'selected' : '' }}>QLD</option>
                            <option value="WA" {{ $user->state == 'WA' ? 'selected' : '' }}>WA</option>
                            <option value="SA" {{ $user->state == 'SA' ? 'selected' : '' }}>SA</option>
                            <option value="TAS" {{ $user->state == 'TAS' ? 'selected' : '' }}>TAS</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-brand-contrast">Postcode *</label>
                        <input type="text" name="postcode" class="form-control" value="{{ old('postcode', $user->postcode) }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-brand-primary btn-lg w-100 fw-bold">
                    Save Changes & Sync with MediRecords <i class="bi bi-save ms-1"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection