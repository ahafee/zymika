@extends('layouts.portal')

@section('title', 'MediRecords EHR Integration Hub - ZYMIKA HEALTH')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-shield-check me-1"></i> EHR Gateway</span>
            <span class="pulse-dot"></span>
            <span class="badge bg-success bg-opacity-25 text-success border border-success">MediRecords OAuth 2.0 Connected</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">MediRecords & Snapforms Integration Gateway</h2>
        <p class="text-muted small mb-0">AHPRA Practitioner API synchronization, webhook listeners, automated daily reconcile and audit logs.</p>
    </div>
    <div class="d-flex gap-2">
        <form action="{{ route('admin.medirecords.test') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-secondary btn-sm fw-semibold">
                <i class="bi bi-broadcast me-1 text-brand-primary"></i> Test Connection
            </button>
        </form>
        <form action="{{ route('admin.medirecords.reconcile') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-brand-primary btn-sm fw-bold shadow-sm">
                <i class="bi bi-arrow-repeat me-1"></i> Trigger Daily Reconcile
            </button>
        </form>
    </div>
</div>

@if(session('test_result'))
    @php $tr = session('test_result'); @endphp
    <div class="alert alert-{{ $tr['authenticated'] ? 'success' : 'danger' }} mb-4 shadow-sm rounded-3 border-0">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-{{ $tr['authenticated'] ? 'check-circle-fill' : 'exclamation-circle-fill' }} fs-3"></i>
            <div>
                <strong class="fs-6">MediRecords Connection Test: {{ strtoupper($tr['status']) }}</strong>
                <div class="small mt-1">
                    Environment: <strong>{{ $tr['mode'] }}</strong> &bull; Endpoint: <code>{{ $tr['api_endpoint'] }}</code> &bull; Authenticated: <strong>{{ $tr['authenticated'] ? 'YES' : 'NO' }}</strong> &bull; Checked at: {{ $tr['last_tested'] }}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('reconciliation_result'))
    @php $rr = session('reconciliation_result'); @endphp
    <div class="alert alert-success mb-4 shadow-sm rounded-3 border-0">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-check-circle-fill fs-3 text-success"></i>
            <div>
                <strong class="fs-6">MediRecords Full Daily Reconciliation Completed</strong>
                <div class="small mt-1">
                    Patients Reconciled: <strong>{{ $rr['patients_reconciled'] }}</strong> &bull; Appointments Reconciled: <strong>{{ $rr['appointments_reconciled'] }}</strong> &bull; Errors: <strong>{{ $rr['error_count'] }}</strong> ({{ $rr['reconciliation_timestamp'] }})
                </div>
            </div>
        </div>
    </div>
@endif

<!-- VIP Health Metrics Cards -->
<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">OAuth Status</span>
                <div class="stat-icon-wrapper stat-icon-success" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    <i class="bi bi-shield-lock-fill"></i>
                </div>
            </div>
            <h4 class="fw-bold text-success my-1"><i class="bi bi-check2-circle"></i> Connected</h4>
            <span class="small text-muted">Bearer Token Auto-Refreshed</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Environment</span>
                <div class="stat-icon-wrapper stat-icon-primary" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    <i class="bi bi-hdd-network-fill"></i>
                </div>
            </div>
            <h4 class="fw-bold text-brand-primary my-1">{{ $connectionStatus['mode'] }}</h4>
            <span class="small text-muted">AHPRA Practitioner API</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Queued Appointments</span>
                <div class="stat-icon-wrapper stat-icon-contrast" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    <i class="bi bi-calendar-event"></i>
                </div>
            </div>
            <h4 class="fw-bold text-brand-contrast my-1 num-font">{{ $unsyncedAppointments }}</h4>
            <span class="small text-muted">Auto-syncing to doctor diary</span>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card-vip h-100">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="text-muted small text-uppercase fw-bold" style="font-size: 0.72rem;">Queued Patients</span>
                <div class="stat-icon-wrapper stat-icon-sage" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    <i class="bi bi-person-check-fill"></i>
                </div>
            </div>
            <h4 class="fw-bold text-brand-contrast my-1 num-font">{{ $unsyncedPatients }}</h4>
            <span class="small text-muted">Assigned MediRecords ID</span>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Webhook Endpoints Card -->
    <div class="col-lg-6">
        <div class="table-container-vip p-4 h-100 d-flex flex-column">
            <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">
                <i class="bi bi-plug-fill text-brand-primary me-2"></i> Webhook & Ingestion Endpoints
            </h5>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-brand-contrast">MediRecords Real-Time Sync Webhook URL:</label>
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm bg-light font-monospace" value="{{ url('/api/webhooks/medirecords') }}" readonly>
                    <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('{{ url('/api/webhooks/medirecords') }}'); alert('Copied Webhook URL!');">Copy</button>
                </div>
                <div class="form-text text-muted small">Receives appointment status and script events directly from MediRecords EHR.</div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-brand-contrast">Snapforms Pre-Consult Webhook URL:</label>
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm bg-light font-monospace" value="{{ url('/api/webhooks/snapforms') }}" readonly>
                    <button class="btn btn-sm btn-outline-secondary" onclick="navigator.clipboard.writeText('{{ url('/api/webhooks/snapforms') }}'); alert('Copied Webhook URL!');">Copy</button>
                </div>
                <div class="form-text text-muted small">Receives automated pre-consultation intake responses from Snapforms Australia.</div>
            </div>

            <div class="p-3 bg-brand-light rounded-3 border small text-muted mt-auto">
                <i class="bi bi-clock-history text-brand-sage me-1"></i>
                <strong>Automated Cron Schedule:</strong> Runs daily reconciliation via <code>php artisan medirecords:reconcile</code>.
            </div>
        </div>
    </div>

    <!-- OAuth Settings Form -->
    <div class="col-lg-6">
        <div class="table-container-vip p-4 h-100">
            <h5 class="fw-bold text-brand-contrast mb-3 pb-2 border-bottom">
                <i class="bi bi-key-fill text-brand-primary me-2"></i> OAuth 2.0 Credentials & API Configuration
            </h5>

            <form action="{{ route('admin.medirecords.settings') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">Environment Mode</label>
                    <select name="medirecords_sandbox" class="form-select form-select-sm">
                        <option value="1" {{ $settings['sandbox'] ? 'selected' : '' }}>Sandbox Environment (Testing)</option>
                        <option value="0" {{ !$settings['sandbox'] ? 'selected' : '' }}>Live Production (Australian Healthcare Cloud)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">OAuth Client ID *</label>
                    <input type="text" name="medirecords_client_id" class="form-control form-control-sm font-monospace" value="{{ $settings['client_id'] }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">OAuth Client Secret *</label>
                    <input type="password" name="medirecords_client_secret" class="form-control form-control-sm font-monospace" value="{{ $settings['client_secret'] }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">REST API Base URL *</label>
                    <input type="url" name="medirecords_api_url" class="form-control form-control-sm font-monospace" value="{{ $settings['api_url'] }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold small text-brand-contrast">OAuth Token URL *</label>
                    <input type="url" name="medirecords_auth_url" class="form-control form-control-sm font-monospace" value="{{ $settings['auth_url'] }}" required>
                </div>

                <button type="submit" class="btn btn-brand-primary btn-sm w-100 fw-bold py-2 shadow-sm">
                    <i class="bi bi-shield-check me-1"></i> Save Configuration
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Integration Logs -->
<div class="table-container-vip p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold text-brand-contrast mb-0"><i class="bi bi-journal-code text-brand-primary me-2"></i> Recent Audit Activity Stream</h5>
        <a href="{{ route('admin.sync-logs') }}" class="btn btn-sm btn-vip-action">View Full Audit Log <i class="bi bi-chevron-right"></i></a>
    </div>

    <div class="table-responsive">
        <table class="table table-vip align-middle mb-0">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Entity</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentLogs as $log)
                    <tr>
                        <td class="text-muted font-monospace" style="font-size: 0.8rem;">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><span class="badge bg-light text-dark border text-uppercase px-2 py-1" style="font-size: 0.72rem;">{{ $log->entity_type }}</span></td>
                        <td class="fw-semibold text-brand-contrast">{{ $log->action }}</td>
                        <td>
                            @if($log->status == 'success')
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Success</span>
                            @else
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> Failed</span>
                            @endif
                        </td>
                        <td class="text-muted font-monospace" style="font-size: 0.78rem;">
                            {{ Str::limit(json_encode($log->response_payload ?? $log->error_message), 75) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No integration audit logs recorded yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection