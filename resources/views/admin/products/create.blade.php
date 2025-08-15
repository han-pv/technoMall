@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.products.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.create', ['name' => 'product'])
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="category" class="form-label">@lang('app.category'):<span
                                    class="text-danger">*</span></label>
                            <select id="category" name="categoryId"
                                class="form-select @error('categoryId') is-invalid @enderror" required>
                                <option value="">-</option>
                                @foreach ($categories as $category)
                                    <optgroup label="{{ $category->getName() }}">
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" {{ old('categoryId') == $child->id ? 'selected' : '' }}>
                                                {{ $child->getName() }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="brandModel" class="form-label">@lang('app.brandModel'):<span
                                    class="text-danger">*</span></label>
                            <select id="brandModel" name="brandModelId"
                                class="form-select @error('brandModelId') is-invalid @enderror" required>
                                <option value="">-</option>
                                @foreach ($brands as $brand)
                                    @foreach ($brand->brandModels as $brandModel)
                                        <option value="{{ $brandModel->id }}" {{ old('brandModelId') == $brandModel->id ? 'selected' : '' }}>{{ $brand->name . ' / ' . $brandModel->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="color" class="form-label">@lang('app.color'):<span
                                    class="text-danger">*</span></label>
                            <select id="color" name="colorId" class="form-select @error('colorId') is-invalid @enderror"
                                required>
                                <option value="">-</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" {{ old('colorId') == $color->id ? 'selected' : '' }}>
                                        {{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="title" class="form-label">@lang('app.title'):<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="titleTm" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> tm</span> @lang('app.title'):</label>
                            <input type="text" class="form-control @error('titleTm') is-invalid @enderror" id="titleTm"
                                name="titleTm" value="{{ old('titleTm') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="titleRu" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> ru</span> @lang('app.title'):</label>
                            <input type="text" class="form-control @error('titleRu') is-invalid @enderror" id="titleRu"
                                name="titleRu" value="{{ old('titleRu') }}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="description" class="form-label">@lang('app.description'):</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="descriptionTm" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> tm</span> @lang('app.description'):</label>
                            <textarea class="form-control @error('descriptionTm') is-invalid @enderror" id="descriptionTm"
                                name="descriptionTm" rows="4">{{ old('descriptionTm') }}</textarea>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="descriptionRu" class="form-label"><span class="text-primary"><i
                                        class="bi bi-translate"></i> ru</span> @lang('app.description'):</label>
                            <textarea class="form-control @error('descriptionRu') is-invalid @enderror" id="descriptionRu"
                                name="descriptionRu" rows="4">{{ old('descriptionRu') }}</textarea>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="image" class="form-label">@lang('app.image'):<span
                                    class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <label for="price" class="form-label">@lang('app.price'):<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                name="price" step="0.01" value="{{ old('price') }}" required>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('isStock') is-invalid @enderror" type="checkbox"
                                    id="isStock" name="isStock" value="1" {{ old('isStock') ? 'checked' : '' }}>
                                <label class="form-check-label" for="isStock">@lang('app.isStock')</label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input @error('isDiscount') is-invalid @enderror" type="checkbox"
                                    id="isDiscount" name="isDiscount" value="1" {{ old('isDiscount') ? 'checked' : '' }}>
                                <label class="form-check-label" for="isDiscount">@lang('app.isDiscount')</label>
                            </div>
                        </div>
                        <div class="col-12 {{ old('isDiscount') ? '' : 'd-none' }}" id="discountFields">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="discountPrecent" class="form-label">@lang('app.discountPrecent'):</label>
                                    <input type="number" class="form-control @error('discountPrecent') is-invalid @enderror"
                                        id="discountPrecent" name="discountPrecent" min="1"
                                        value="{{ old('discountPrecent') }}">
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label for="discountExpiresIn"
                                        class="form-label">@lang('app.discountExpiresIn'):</label>
                                    <input type="date" class="form-control @error('discountExpiresIn') is-invalid @enderror"
                                        id="discountExpiresIn" name="discountExpiresIn"
                                        value="{{ old('discountExpiresIn') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">@lang('app.submit')</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const isDiscountCheckbox = document.getElementById('isDiscount');
            const discountFields = document.getElementById('discountFields');

            isDiscountCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    discountFields.classList.remove('d-none');
                } else {
                    discountFields.classList.add('d-none');
                }
            });
        });
    </script>
@endsection