@extends('layouts.app')

@section('title', 'Medicinal Cannabis Dispensary Catalog - ZYMIKA HEALTH')

@section('content')
<div class="py-5 bg-brand-light border-bottom" data-aos="fade-down">
    <div class="container text-center">
        <span class="badge badge-tga mb-2">TGA SAS-B & AP Formulations</span>
        <h1 class="display-5 fw-bold text-brand-contrast">Dispensary Product Catalog</h1>
        <p class="lead text-muted max-w-700 mx-auto">Explore pharmaceutical-grade medicinal cannabis oils, whole flowers, and medical vaporisers.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Filters -->
        <div class="col-lg-3" data-aos="fade-right">
            <div class="card card-zymika p-4 bg-white border shadow-sm">
                <h5 class="fw-bold text-brand-contrast mb-3">Categories</h5>
                <div class="list-group list-group-flush mb-4">
                    @foreach($categories as $key => $label)
                        <a href="{{ route('shop.index', ['category' => $key, 'search' => $search]) }}" 
                           class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center {{ ($category == $key || (!$category && $key == 'all')) ? 'text-brand-primary fw-bold' : 'text-brand-contrast' }}">
                            <span>{{ $label }}</span>
                            @if($category == $key || (!$category && $key == 'all'))
                                <i class="bi bi-check2 text-brand-primary"></i>
                            @endif
                        </a>
                    @endforeach
                </div>

                <h5 class="fw-bold text-brand-contrast mb-2">Search Formulations</h5>
                <form action="{{ route('shop.index') }}" method="GET">
                    @if($category)
                        <input type="hidden" name="category" value="{{ $category }}">
                    @endif
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="CBD, THC, Flower..." value="{{ $search }}">
                        <button class="btn btn-brand-primary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>

                <div class="p-3 bg-brand-sage-light rounded-3 border mt-4">
                    <h6 class="fw-bold text-brand-contrast small mb-1"><i class="bi bi-shield-check text-brand-sage"></i> Prescription Notice</h6>
                    <p class="small text-muted mb-0" style="font-size: 0.8rem;">
                        Schedule 4 & Schedule 8 medications require an active electronic prescription from Dr. Suneetha Batthala or an authorised prescriber before dispensing.
                    </p>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9" data-aos="fade-left">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-muted small">
                    Showing <strong>{{ $products->total() }}</strong> therapeutic formulations
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('eligibility.show') }}" class="btn btn-sm btn-brand-outline">
                        Check My Eligibility
                    </a>
                </div>
            </div>

            <div class="row g-4">
                @forelse($products as $index => $prod)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 75 }}">
                        <div class="card card-zymika h-100 border p-3 bg-white d-flex flex-column shadow-sm">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge badge-schedule" style="font-size: 0.72rem;">{{ $prod->tga_schedule }}</span>
                                @if($prod->is_prescription_required)
                                    <span class="badge bg-secondary" style="font-size: 0.72rem;">Rx Needed</span>
                                @else
                                    <span class="badge bg-success" style="font-size: 0.72rem;">Hardware</span>
                                @endif
                            </div>

                            <div class="py-4 text-center bg-light rounded-3 mb-3">
                                @if(str_contains($prod->category, 'flower'))
                                    <i class="bi bi-flower1 fs-1 text-brand-sage"></i>
                                @elseif(str_contains($prod->category, 'vaporiser'))
                                    <i class="bi bi-device-ssd fs-1 text-brand-contrast"></i>
                                @else
                                    <i class="bi bi-capsule-pill fs-1 text-brand-primary"></i>
                                @endif
                            </div>

                            <div class="small text-muted mb-1">{{ $prod->brand }} &bull; {{ $prod->form_factor }}</div>
                            <h6 class="fw-bold text-brand-contrast mb-2">{{ $prod->name }}</h6>

                            <!-- Potency tags -->
                            <div class="d-flex flex-wrap gap-1 mb-2">
                                @if($prod->thc_potency)
                                    <span class="badge bg-light text-brand-contrast border" style="font-size: 0.75rem;">{{ $prod->thc_potency }}</span>
                                @endif
                                @if($prod->cbd_potency)
                                    <span class="badge bg-light text-brand-sage border" style="font-size: 0.75rem;">{{ $prod->cbd_potency }}</span>
                                @endif
                            </div>

                            <p class="small text-muted mb-3 flex-grow-1">{{ Str::limit($prod->short_description, 90) }}</p>

                            <div class="d-flex justify-content-between align-items-center pt-2 border-top mt-auto">
                                <div class="fw-bold fs-5 text-brand-contrast">${{ number_format($prod->price, 2) }}</div>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('shop.show', $prod->slug) }}" class="btn btn-sm btn-outline-secondary" title="View Details">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('shop.cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $prod->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-sm btn-brand-primary" title="Add to Cart">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="p-5 text-center bg-white rounded-3 border shadow-sm">
                            <i class="bi bi-search fs-1 text-muted mb-3 d-block"></i>
                            <h5 class="fw-bold text-brand-contrast">No formulations found matching your query.</h5>
                            <p class="text-muted small">Try searching for different terms like "CBD", "Oil", or "Flower".</p>
                            <a href="{{ route('shop.index') }}" class="btn btn-brand-primary btn-sm">Clear Filters</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection