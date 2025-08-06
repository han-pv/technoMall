@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.categories.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.edit', ['name' => 'category'])
        </div>
        <div class="row justify-content-center">

            <div class="col-3">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="category" class="form-label">@lang('app.category') :</label>
                        <select id="category" name="categoryId" class="form-select">
                            <option value="">-</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" {{ $parent->id == $category->parent_id ? 'selected' : '' }}>
                                    {{ $parent->getName() }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label"> {{ __('app.subcategory') . " / " . __('app.category') }}<span
                                class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="nameTm" class="form-label">
                            <span class="text-primary"><i class="bi bi-translate"></i> tm</span>
                            {{ __('app.subcategory') . " / " . __('app.category') }}
                        </label>
                        <input type="text" class="form-control" id="nameTm" name="nameTm" value="{{ $category->name_tm }}">
                    </div>

                    <div class="mb-3">
                        <label for="nameRu" class="form-label">
                            <span class="text-primary"><i class="bi bi-translate"></i> ru</span>
                            {{ __('app.subcategory') . " / " . __('app.category') }}
                        </label>
                        <input type="text" class="form-control" id="nameRu" name="nameRu" value="{{ $category->name_ru }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">{{ __('app.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection