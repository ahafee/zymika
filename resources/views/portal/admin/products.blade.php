@extends('layouts.portal')

@section('title', 'Manage Product Catalog - ZOVI LEAF')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="badge badge-tga"><i class="bi bi-capsule me-1"></i> TGA SAS-B Formulary</span>
            <span class="badge bg-success bg-opacity-10 text-success border border-success">GMP Certified</span>
        </div>
        <h2 class="fw-bold text-brand-contrast mb-0">Dispensary Product Catalog</h2>
        <p class="text-muted small mb-0">Manage medicinal cannabis products, pricing, stock levels, and TGA schedules.</p>
    </div>
    <button type="button" class="btn btn-brand-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#productModal">
        <i class="bi bi-plus-circle me-1"></i> Add New Formulation
    </button>
</div>

<!-- Add/Edit Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <form action="{{ route('admin.products.save') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="prod_id">
                <div class="modal-header bg-brand-contrast text-white px-4 py-3">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-capsule fs-5 text-brand-primary"></i>
                        <h5 class="modal-title fw-bold mb-0" id="modalTitle">Add Formulation to Catalog</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold small text-brand-contrast">Product Name *</label>
                            <input type="text" name="name" id="prod_name" class="form-control" required placeholder="e.g. ZOVI LEAF Full Spectrum CBD Oil 100mg/mL">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">SKU Code *</label>
                            <input type="text" name="sku" id="prod_sku" class="form-control font-monospace" required placeholder="ZOV-CBD-100">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Category *</label>
                            <select name="category" id="prod_category" class="form-select" required>
                                <option value="cbd_oil">CBD Tinctures</option>
                                <option value="balanced_extract">Balanced 1:1 Extract</option>
                                <option value="thc_oil">High-THC Night Oil</option>
                                <option value="medicinal_flower">Medicinal Flower</option>
                                <option value="vaporiser">TGA Medical Vaporiser</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Brand *</label>
                            <input type="text" name="brand" id="prod_brand" class="form-control" value="ZOVI LEAF" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Form Factor *</label>
                            <input type="text" name="form_factor" id="prod_form" class="form-control" placeholder="e.g. Oral Liquid Dropper (30mL)" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Price ($ AUD) *</label>
                            <input type="number" step="0.01" name="price" id="prod_price" class="form-control font-monospace" required placeholder="145.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">Stock Quantity *</label>
                            <input type="number" name="stock_quantity" id="prod_stock" class="form-control font-monospace" value="50" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small text-brand-contrast">TGA Schedule *</label>
                            <select name="tga_schedule" id="prod_schedule" class="form-select" required>
                                <option value="Schedule 8 (Controlled Drug)">Schedule 8 (Controlled Drug)</option>
                                <option value="Schedule 4 (Prescription Only)">Schedule 4 (Prescription Only)</option>
                                <option value="Unscheduled (Medical Device)">Unscheduled (Medical Device)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">THC Potency</label>
                            <input type="text" name="thc_potency" id="prod_thc" class="form-control" placeholder="e.g. 10 mg/mL THC">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">CBD Potency</label>
                            <input type="text" name="cbd_potency" id="prod_cbd" class="form-control" placeholder="e.g. 100 mg/mL CBD">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Terpene Profile</label>
                            <input type="text" name="terpene_profile" id="prod_terpenes" class="form-control" placeholder="e.g. Beta-Caryophyllene, Linalool, Myrcene">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Short Summary *</label>
                            <input type="text" name="short_description" id="prod_short_desc" class="form-control" required placeholder="Brief clinical overview...">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small text-brand-contrast">Full Description *</label>
                            <textarea name="description" id="prod_desc" class="form-control" rows="3" required placeholder="Detailed clinical indication, carrier oil, dosing instructions..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Prescription Required?</label>
                            <select name="is_prescription_required" id="prod_rx" class="form-select">
                                <option value="1">Yes (Requires Doctor Script)</option>
                                <option value="0">No (Hardware / Device)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small text-brand-contrast">Active Status</label>
                            <select name="is_active" id="prod_active" class="form-select">
                                <option value="1">Active (Published in Dispensary)</option>
                                <option value="0">Inactive (Hidden)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-brand-primary btn-sm fw-bold px-3">Save Formulation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="table-container-vip p-4">
    <div class="table-responsive">
        <table class="table table-vip align-middle">
            <thead>
                <tr>
                    <th>Formulation Name</th>
                    <th>Category</th>
                    <th>TGA Schedule</th>
                    <th>Potency Specs</th>
                    <th>Price</th>
                    <th>Stock Units</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $p)
                    <tr>
                        <td>
                            <strong class="text-brand-contrast">{{ $p->name }}</strong>
                            <div class="text-muted" style="font-size: 0.75rem;">SKU: <code>{{ $p->sku }}</code> &bull; {{ $p->form_factor }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-brand-contrast border">{{ ucfirst(str_replace('_', ' ', $p->category)) }}</span>
                        </td>
                        <td>
                            <span class="badge badge-schedule">{{ $p->tga_schedule }}</span>
                        </td>
                        <td>
                            <div class="small text-muted">
                                @if($p->thc_potency)<span class="badge bg-warning bg-opacity-10 text-dark border border-warning me-1">THC: {{ $p->thc_potency }}</span>@endif
                                @if($p->cbd_potency)<span class="badge bg-success bg-opacity-10 text-success border border-success">CBD: {{ $p->cbd_potency }}</span>@endif
                            </div>
                        </td>
                        <td>
                            <span class="fw-bold text-brand-primary num-font fs-6">${{ number_format($p->price, 2) }}</span>
                        </td>
                        <td>
                            @if($p->stock_quantity > 10)
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> {{ $p->stock_quantity }} in stock</span>
                            @else
                                <span class="badge-vip badge-vip-warning"><span class="badge-vip-dot"></span> {{ $p->stock_quantity }} low stock</span>
                            @endif
                        </td>
                        <td>
                            @if($p->is_active)
                                <span class="badge-vip badge-vip-success"><span class="badge-vip-dot"></span> Published</span>
                            @else
                                <span class="badge-vip badge-vip-secondary"><span class="badge-vip-dot"></span> Draft</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">No products found in the catalog.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
        <div class="mt-4 pt-3 border-top">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection