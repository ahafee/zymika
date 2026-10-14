@extends('layouts.portal')

@section('title', 'MediRecords & Webhook Integration Logs - ZYMIKA HEALTH')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-shield-check me-1"></i> Audit Trail</span>
            <span class="badge bg-success bg-opacity-10 text-success border border-success">REST API & Webhooks</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">Integration Audit Logs</h2>
        <p class="text-muted small mb-0">Complete audit log of all REST API requests, webhooks, and daily reconciliations.</p>
    </div>
    <div class="d-flex bg-white p-1 rounded-3 border shadow-xs gap-1">
        <a href="{{ route('admin.sync-logs', ['entity_type' => 'all']) }}" class="btn btn-sm px-3 fw-semibold {{ (!$entityType || $entityType == 'all') ? 'btn-brand-primary' : 'btn-light text-muted' }}">All</a>
        <a href="{{ route('admin.sync-logs', ['entity_type' => 'patient']) }}" class="btn btn-sm px-3 fw-semibold {{ $entityType == 'patient' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Patients</a>
        <a href="{{ route('admin.sync-logs', ['entity_type' => 'appointment']) }}" class="btn btn-sm px-3 fw-semibold {{ $entityType == 'appointment' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Appointments</a>
        <a href="{{ route('admin.sync-logs', ['entity_type' => 'webhook']) }}" class="btn btn-sm px-3 fw-semibold {{ $entityType == 'webhook' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Webhooks</a>
        <a href="{{ route('admin.sync-logs', ['entity_type' => 'reconciliation']) }}" class="btn btn-sm px-3 fw-semibold {{ $entityType == 'reconciliation' ? 'btn-brand-primary' : 'btn-light text-muted' }}">Reconciliations</a>
    </div>
</div>

<div class="table-container-vip p-4">
    <div class="table-responsive">
        <table class="table table-vip align-middle">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Entity Type</th>
                    <th>Entity ID</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Payload & Response Summary</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $l)
                    <tr>
                        <td class="text-muted font-monospace" style="font-size: 0.8rem;">{{ $l->created_at->format('d/m/Y H:i:s') }}</td>
                        <td><span class="badge bg-light text-brand-contrast border text-uppercase px-2 py-1" style="font-size: 0.72rem;">{{ $l->entity_type }}</span></td>
                        <td><code class="text-brand-contrast font-monospace">{{ $l->entity_id ?? 'N/A' }}</code></td>
                        <td class="fw-semibold text-brand-contrast">{{ $l->action }}</td>
                        <td>
                            @if($l->status == 'success')
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Success</span>
                            @else
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> Failed</span>
                            @endif
                        </td>
                        <td class="text-muted font-monospace" style="font-size: 0.78rem;">
                            <div><strong>Response:</strong> {{ Str::limit(json_encode($l->response_payload), 85) }}</div>
                            @if($l->error_message)
                                <div class="text-danger mt-1"><strong>Error:</strong> {{ $l->error_message }}</div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No integration audit logs found for this filter.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($logs->hasPages())
        <div class="mt-4 pt-3 border-top">
            {{ $logs->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection