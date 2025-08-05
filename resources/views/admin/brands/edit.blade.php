@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
           <a href="{{ route('admin.brands.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a> @lang('app.edit', ['name' => 'brand'])
        </div>
        <div class="row justify-content-center">

            <div class="col-3">
                <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('app.name')</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name}}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100"> @lang('app.submit') </button>
                </form>
            </div>
        </div>
    </div>
@endsection