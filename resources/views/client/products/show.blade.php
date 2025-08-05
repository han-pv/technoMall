@extends('client.layouts.app')
@section('title', 'Product |')

@section('content')
    <div class="container-xxl product-detail-section mb-5 py-4">
        <div class="row gx-4">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="main-image-display border rounded-3 p-3 text-center shadow-sm">
                    <img src="{{ asset($product->image ?: 'img/products/defult.jpg') }}" class="img-fluid product-main-img"
                        alt="{{ $product->getTitle() }}">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="product-info bg-white rounded-3 p-4 shadow-sm h-100">
                    <h1 class="mb-2 fw-bold">{{ $product->getTitle() }}</h1>

                    <div class="d-flex align-items-center mb-3">

                        <div class="d-flex align-items-center">
                            <span class="fs-5 text-warning me-1">
                                @for ($i = 0; $product->rating > $i; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                @for ($j = 0; $j < 5 - $product->rating; $j++)
                                    <i class="bi bi-star"></i>
                                @endfor
                            </span>
                            <span class=" text-muted">({{ $product->rating }})</span>
                        </div>
                        <span class="text-muted fw-semibold ms-3"><i class="bi bi-eye"></i> {{ $product->viewed }}</span>
                    </div>

                    <p class="mb-4 lead">
                        {{ $product->getDescription() }}
                    </p>

                    <div class="price-block mb-4">
                        @if($product->is_discount)
                            <span
                                class="display-5 fw-bold text-danger me-2">{{$product->price * $product->discount_precent / 100 }}
                                TMT</span>
                            <span class="text-muted fs-5 text-decoration-line-through">{{ $product->price }} TMT</span>
                            <span class="badge bg-danger ms-2 fs-6">-{{ $product->discount_precent }}%</span>
                        @else
                            <span class="display-5 fw-bold text-primary me-2">{{$product->price }} TMT</span>
                        @endif
                    </div>

                    <table class="table  table-border">
                        <tr>
                            <td class="fw-bolder">@lang('app.category'): </td>
                            <td>{{ $product->category->parent->getName() . ' / ' . $product->category->getName() }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.brand'): </td>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.model'): </td>
                            <td>{{ $product->brandModel->name }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bolder">@lang('app.color'): </td>
                            <td>{{ $product->color->getName() }}</td>
                        </tr>
                    </table>

                    <div class="d-grid gap-2">
                        <button
                            class="btn {{ $product->is_stock ? 'btn-warning' : 'btn-warning disabled' }} btn-lg fw-bold py-3"><i
                                class="bi bi-cart-fill me-2"></i>
                            @lang('app.addToCart')
                        </button>
                        <button class="btn btn-outline-primary btn-lg py-3"><i class="bi bi-heart-fill me-2"></i>
                            {{ __('app.like') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl">
        <div class="h2 mb-4 text-dark">@lang('app.similarProducts') </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4 mb-5">
            @foreach ($similarProducts as $obj)
                @include('client.app.product-card')
            @endforeach
        </div>
    </div>
@endsection