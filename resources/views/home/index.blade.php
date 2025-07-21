@extends('layouts.app')
@section('content')
    <section class="container-xxl mb-5 py-4">
        <h2 class="section-heading text-center mb-4 text-white">@lang('app.sale') </h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($discountProducts as $discountProduct)
                <div class="col">
                    <div
                        class="card h-100 border-{{ ($discountProduct->discount_precent >= 80 ? 'danger' : ($discountProduct->discount_precent >= 60 ? 'warning' : 'primary')) }} shadow-lg">
                        <a href="indextw.html" class="product-link">
                            <span
                                class="badge bg-{{ ($discountProduct->discount_precent >= 80 ? 'danger' : ($discountProduct->discount_precent >= 60 ? 'warning' : 'success')) }}  position-absolute top-0 start-0 m-2 fs-6">-{{ $discountProduct->discount_precent }}%</span>
                            <img src="img/photo(1x1).jpg" class="card-img-top p-3" alt="Планшет ProTab X">
                            <div class="card-body d-flex flex-column">
                                <div class="card-title h5 fw-semibold " style="height: 64px;">{{ $discountProduct->getTitle() }}
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning small me-1">
                                        @for ($i = 0; $discountProduct->rating > $i; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @for ($j = 0; $j < 5 - $discountProduct->rating; $j++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </span>
                                    <span class="small text-muted">{{ $discountProduct->rating }}</span>
                                </div>
                                <del class="d-inline text-muted small">{{ $discountProduct->price }}</del>
                                <div class="d-inline price h5 fw-bold text-danger mb-0">
                                    {{ $discountProduct->price * $discountProduct->discount_precent / 100  }} TMT
                                </div>
                                <div class="mt-auto pt-3">
                                    <button class="btn btn-primary btn-sm w-100 fw-bold">@lang('app.addCart') </button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-danger btn-lg fw-bold px-5">@lang('app.allSale') <i class="bi bi-tags-fill"></i></a>
        </div>
    </section>






    </div>
@endsection