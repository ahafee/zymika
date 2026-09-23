@extends('layouts.app')

@section('title', $product->name . ' - Dispensary')

@section('content')
<div class="py-3 bg-brand-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-brand-contrast">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop.index') }}" class="text-brand-contrast">Dispensary</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <!-- Left: Product Showcase -->
        <div class="col-lg-6">
            <div class="card card-zovi p-5 text-center bg-white border mb-3">
                <div class="py-5">
                    @if(str_contains($product->category, 'flower'))
                        <i class="bi bi-flower1 text-brand-sage" style="font-size: 7rem;"></i>
                    @elseif(str_contains($product->category, 'vaporiser'))
                        <i class="bi bi-device-ssd text-brand-contrast" style="font-size: 7rem;"></i>
                    @else
                        <i class="bi bi-capsule-pill text-brand-primary" style="font-size: 7rem;"></i>
                    @endif
                </div>
            </div>

            <div class="p-3 bg-brand-sage-light rounded-3 border">
                <h6 class="fw-bold text-brand-contrast small mb-1"><i class="bi bi-shield-check text-brand-sage me-1"></i> TGA SAS-B & GMP Certified</h6>
                <p class="small text-muted mb-0">Formulated in Australian GMP facilities with verified batch analysis and independent laboratory testing.</p>
            </div>
        </div>

        <!-- Right: Product Details & Order -->
        <div class="col-lg-6">
            <div class="d-flex gap-2 mb-2">
                <span class="badge badge-schedule">{{ $product->tga_schedule }}</span>
                @if($product->is_prescription_required)
                    <span class="badge bg-secondary">Prescription Required</span>
                @else
                    <span class="badge bg-success">TGA ARTG Device</span>
                @endif
            </div>

            <h2 class="display-6 fw-bold text-brand-contrast mb-1">{{ $product->name }}</h2>
            <div class="text-muted small mb-3">Brand: <strong>{{ $product->brand }}</strong> &bull; SKU: {{ $product->sku }}</div>

            <div class="display-5 fw-extrabold text-brand-primary mb-3">
                ${{ number_format($product->price, 2) }}
            </div>

            <p class="lead text-muted fs-6 mb-4">
                {{ $product->short_description }}
            </p>

            <!-- Specs Table -->
            <div class="card card-zovi p-3 bg-light border-0 mb-4">
                <div class="row g-2 small">
                    <div class="col-6"><strong>Form Factor:</strong> {{ $product->form_factor }}</div>
                    <div class="col-6"><strong>Stock Status:</strong> <span class="text-success fw-bold">In Stock</span></div>
                    <div class="col-6"><strong>THC Content:</strong> {{ $product->thc_potency ?? 'N/A' }}</div>
                    <div class="col-6"><strong>CBD Content:</strong> {{ $product->cbd_potency ?? 'N/A' }}</div>
                    <div class="col-12"><strong>Terpene Profile:</strong> {{ $product->terpene_profile ?? 'Botanical Terpene Blend' }}</div>
                </div>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('shop.cart.add') }}" method="POST" class="mb-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div class="d-flex gap-3 align-items-center mb-3">
                    <div style="width: 100px;">
                        <input type="number" name="quantity" class="form-control form-control-lg text-center" value="1" min="1" max="10">
                    </div>
                    <button type="submit" class="btn btn-brand-primary btn-lg flex-grow-1 fw-bold shadow-sm">
                        <i class="bi bi-cart-plus me-2"></i> Add to Dispensary Cart
                    </button>
                </div>
            </form>

            @if($product->is_prescription_required)
                <div class="p-3 border rounded-3 bg-white mb-4">
                    <div class="d-flex align-items-start gap-2">
                        <i class="bi bi-info-circle-fill text-brand-primary mt-1"></i>
                        <div class="small">
                            <strong>New to ZOVI LEAF?</strong>
                            <p class="text-muted mb-1">You will need an active prescription issued by Dr. Suneetha Batthala before your medication is dispensed.</p>
                            <a href="{{ route('booking.index') }}" class="fw-bold text-brand-primary text-decoration-none">
                                Book Doctor Consultation ($79) &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Full Description Tabs -->
            <div class="mt-4 pt-4 border-top">
                <h5 class="fw-bold text-brand-contrast mb-2">Clinical Product Overview</h5>
                <div class="small text-muted lh-base">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
        <div class="mt-5 pt-5 border-top">
            <h4 class="fw-bold text-brand-contrast mb-4">Related Therapeutic Formulations</h4>
            <div class="row g-4">
                @foreach($relatedProducts as $rel)
                    <div class="col-md-4">
                        <div class="card card-zovi h-100 p-3 border bg-white">
                            <h6 class="fw-bold text-brand-contrast mb-1">{{ $rel->name }}</h6>
                            <div class="text-brand-primary fw-bold mb-2">${{ number_format($rel->price, 2) }}</div>
                            <p class="small text-muted mb-3">{{ Str::limit($rel->short_description, 80) }}</p>
                            <a href="{{ route('shop.show', $rel->slug) }}" class="btn btn-sm btn-brand-outline w-100 mt-auto">View Formulation</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection