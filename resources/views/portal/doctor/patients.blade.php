@extends('layouts.portal')

@section('title', 'Patient EHR Registry')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold text-brand-contrast mb-1">Patient Registry (EHR)</h2>
        <p class="text-muted small mb-0">Search and view patient medical records synchronized with MediRecords.</p>
    </div>
    <form action="{{ route('doctor.patients') }}" method="GET" class="d-flex gap-2" style="max-width: 320px;">
        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search patient name, Medicare..." value="{{ $search }}">
        <button type="submit" class="btn btn-sm btn-brand-primary"><i class="bi bi-search"></i></button>
    </form>
</div>

<div class="card card-zymika p-4 bg-white border">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="bg-light small">
                <tr>
                    <th>Patient Name</th>
                    <th>Date of Birth</th>
                    <th>Medicare Card</th>
                    <th>MediRecords ID</th>
                    <th>Prescriptions</th>
                    <th>Appointments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                    <tr>
                        <td>
                            <strong class="text-brand-contrast">{{ $patient->name }}</strong>
                            <div class="small text-muted">{{ $patient->email }} &bull; {{ $patient->phone }}</div>
                        </td>
                        <td>{{ $patient->date_of_birth?->format('d/m/Y') ?? 'N/A' }}</td>
                        <td>
                            <div>{{ $patient->medicare_number ?? 'No Medicare' }} (Ref: {{ $patient->medicare_ref ?? '1' }})</div>
                            <div class="small text-muted">Exp: {{ $patient->medicare_expiry ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-brand-light text-brand-contrast border">{{ $patient->medirecords_patient_id ?? 'Pending' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-brand-sage">{{ $patient->prescriptions->count() }} active</span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $patient->appointments->count() }} consults</span>
                        </td>
                        <td>
                            <a href="{{ route('doctor.prescriptions', ['patient_id' => $patient->id]) }}" class="btn btn-sm btn-outline-secondary" title="Prescriptions">
                                <i class="bi bi-capsule"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $patients->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection