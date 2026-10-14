@extends('layouts.portal')

@section('title', 'My Prescriptions & Repeats')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">Prescriptions & Clinical Care Plan</h2>
        <p class="text-muted small mb-0">Active electronic scripts issued under TGA Authorised Prescriber scheme by Dr. Suneetha Batthala.</p>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-outline-secondary" onclick="window.print()">
            <i class="bi bi-printer me-1"></i> Print Scripts
        </button>
    </div>
</div>

<div class="card card-zymika p-4 bg-white border">
    @if($prescriptions->isEmpty())
        <div class="text-center py-5 text-muted">
            <i class="bi bi-capsule fs-1 mb-2 d-block text-brand-primary"></i>
            <h5 class="fw-bold text-brand-contrast">No prescriptions on file yet</h5>
            <p class="small text-muted mb-3">Book an initial telehealth consultation with Dr. Batthala to receive your approved medication plan.</p>
            <a href="{{ route('booking.index') }}" class="btn btn-brand-primary btn-sm">Book Consultation ($79)</a>
        </div>
    @else
        <div class="row g-4">
            @foreach($prescriptions as $script)
                <div class="col-lg-6">
                    <div class="card p-4 border rounded-3 bg-white h-100 d-flex flex-column shadow-sm" style="border-color: #E8E2D8 !important;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-brand-primary text-white font-monospace px-2 py-1" style="font-size: 0.78rem;">{{ $script->prescription_number }}</span>
                            <span class="badge bg-{{ $script->status == 'active' ? 'success' : 'secondary' }} text-uppercase px-2 py-1" style="font-size: 0.72rem;">
                                {{ $script->status }}
                            </span>
                        </div>

                        <h5 class="fw-bold text-brand-contrast mb-1">{{ $script->medication_name }}</h5>
                        <div class="small text-muted mb-3">Prescriber: <strong>{{ $script->doctor->full_name }}</strong> (AHPRA: {{ $script->doctor->ahpra_number }})</div>

                        <div class="p-3 bg-light rounded-3 border mb-3 small">
                            <strong class="text-brand-contrast d-block mb-1"><i class="bi bi-info-circle text-brand-primary me-1"></i> Dosage Instructions:</strong>
                            <p class="text-muted mb-0">{{ $script->dosage_instructions }}</p>
                        </div>

                        <div class="row g-2 small text-muted mb-0">
                            <div class="col-6">
                                <strong>Date Issued:</strong> {{ $script->issued_date->format('d M Y') }}
                            </div>
                            <div class="col-6 text-end">
                                <strong>Valid Until:</strong> {{ $script->expiry_date->format('d M Y') }}
                            </div>
                            <div class="col-12 mt-1">
                                <strong>MediRecords Script ID:</strong> <code>{{ $script->medirecords_script_id ?? 'MR-'.strtoupper(substr(md5($script->id), 0, 8)) }}</code>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection