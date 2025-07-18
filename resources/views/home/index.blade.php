@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <h1>@lang('app.welcome')</h1>
        <h1>@lang('app.category')</h1>
        <h2>@lang('app.products') </h2>
        <h2>@lang('app.sale') </h2>
        <h2>@lang('app.cart') </h2>
        <h2>@lang('app.add') </h2>
        <h2>@lang('client.newClient') </h2>
    
        @foreach ($categories as $category)
            <div>
                {{  $category->name }}
            </div>
        @endforeach

    </div>
@endsection