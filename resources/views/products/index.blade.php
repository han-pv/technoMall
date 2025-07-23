@extends('layouts.app')
@section('content')
    <div class="container-xxl mb-5 py-4">
        <div class="row">
            <div class="col-12 col-lg-2">
                @include('app.filter')
            </div>
            <div class="col-12 col-lg-10">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    @foreach ($products as $obj)
                        @include('app.product-card')
                    @endforeach
                </div>
            </div>
            <div class="mt-3">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection