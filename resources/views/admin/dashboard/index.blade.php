@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            @lang('app.brands')
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 gy-4 mb-5">
            @foreach ($brands as $brand)
                <div class="col">
                    <div class="card">
                        <div class="d-flex justify-content-between m-3">
                            <div class="h4 text-primary">{{ $brand->name }}</div>
                            <div class="text-secondary">{{ $brand->products_count }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection