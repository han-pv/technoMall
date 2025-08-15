@extends('client.layouts.app')
@section('title', 'Home |')
@section('content')
    <div class="container-xxl mb-5 py-4">
        <div class="h2 mb-4 text-dark">@lang('app.saleProducts') </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($discountProducts as $obj)
                @include('client.app.product-card')
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('products.index', ['saleProducts' => 1]) }}" class="btn btn-outline-danger btn-lg fw-bold px-5">
                @lang('app.allSale') <i class="bi bi-tags-fill"></i>
            </a>
        </div>
    </div>

    <div class="container-xxl mb-5 py-4">
        <div class="h2 mb-4 text-dark">@lang('app.topProducts') </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($topProducts as $obj)
                @include('client.app.product-card')
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('products.index') }}" class="btn btn-outline-danger btn-lg fw-bold px-5">
                @lang('app.showAll') <i class="bi bi-tags-fill"></i>
            </a>
        </div>
    </div>
@endsection