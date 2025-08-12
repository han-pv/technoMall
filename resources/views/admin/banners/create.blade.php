@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.banners.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a> @lang('app.upload', ['name' => 'banner'])
        </div>
        <div class="row justify-content-center">

            <div class="col-3">
                <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label"> @lang('app.banner') </label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection