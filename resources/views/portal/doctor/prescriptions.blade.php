@extends('layouts.portal')

@section('title', 'TGA SAS-B Prescription Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">Prescription Management (AP)</h2>
        <p class="text-muted small mb-0">Issue and manage TGA Authorised Prescriber electronic scripts.</p>
    </div>
    <button type="button" class="btn btn-brand-primary" data-bs-toggle="modal" data-bs-target="#newScriptModal">
        <i class="bi bi-plus-circle me-1"></i> Issue New Prescription
    </button>
</div>

<!-- Modal: Issue New Prescription -->
<div class="modal fade" id="newScriptModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('doctor.prescriptions.issue') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-brand-contrast">Issue Electronic Prescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Patient *</label>
                            <select name="patient_id" class="form-select" required>
                                @foreach($patients as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }} ({{ $p->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Medicinal Formulation *</label>
                            <select name="product_id" class="form-select" required>
                                @foreach($products as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->name }} - ${{ number_format($prod->price, 2) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">TGA Framework *</label>
                            <select name="tga_sas_category" class="form-select" required>
                                <option value="Authorised Prescriber (AP)" selected>Authorised Prescriber (AP)</option>
                                <option value="Special Access Scheme (SAS-B)">Special Access Scheme (SAS-B)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Authorized Repeats *</label>
                            <select name="repeats_total" class="form-select" required>
                                <option value="5" selected>5 Repeats (6 Months Validity)</option>
                                <option value="3">3 Repeats</option>
                                <option value="2">2 Repeats</option>
                                <option value="1">1 Repeat</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Dosage & Titration Instructions *</label>
                            <textarea name="dosage_instructions" class="form-control" rows="3" required>Take 0.5mL sublingually twice daily with food. Titrate as clinically indicated. Max daily dose 1.0mL.</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Clinical Indication & Notes</label>
                            <input type="text" name="clinical_notes" class="form-control" placeholder="e.g. For treatment-resistant chronic musculoskeletal pain" value="Prescribed under TGA Authorised Prescriber Scheme">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand-primary fw-bold">Issue & Authorize Script</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="card card-zymika p-4 bg-white border">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light small">
                <tr>
                    <th>Script #</th>
                    <th>Patient</th>
                    <th>Formulation</th>
                    <th>Dosage</th>
                    <th>Repeats Left</th>
                    <th>Valid Through</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prescriptions as $script)
                    <tr>
                        <td class="fw-bold text-brand-contrast">{{ $script->prescription_number }}</td>
                        <td>
                            <strong>{{ $script->patient->name }}</strong>
                            <div class="small text-muted">{{ $script->patient->medicare_number ?? 'No Medicare' }}</div>
                        </td>
                        <td>{{ $script->medication_name }}</td>
                        <td><span class="small text-muted">{{ Str::limit($script->dosage_instructions, 50) }}</span></td>
                        <td>
                            <span class="badge bg-brand-sage">{{ $script->repeats_left }} of {{ $script->repeats_total }} left</span>
                        </td>
                        <td>{{ $script->expiry_date->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $script->status == 'active' ? 'success' : 'secondary' }} text-uppercase">
                                {{ $script->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $prescriptions->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection