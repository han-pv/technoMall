<form action="{{ route('products.index') }}" method="get" class="mb-5">

    <div class="mb-3">
        <label for="brand" class="form-label">Brand:</label>
        <select id="brand" name="brand" class="form-select">
            <option value="">-</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $f_brand ? 'selected' : '' }}>{{ $brand->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="brandModel" class="form-label">Brand Model:</label>
        <select id="brandModel" name="brandModel" class="form-select">
            <option value="">-</option>
            @foreach ($brands as $brand)
                @foreach ($brand->brandModels as $brandModel)
                    <option value="{{ $brandModel->id }}" {{ $brandModel->id == $f_brand_model ? 'selected' : '' }}>
                        {{ $brand->name . ' / ' . $brandModel->name }}
                    </option>
                @endforeach
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color:</label>
        <select id="color" name="color[]" class="form-select" multiple>
            <option value="">-</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $f_color ? 'selected' : '' }}>{{ $color->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Price:</label>
        <div class="d-flex">
            <div class="me-2">
                Min:
                <input type="text" name="minPrice" value="{{ $f_minPrice > 0 ? $f_minPrice : " " }}"
                    class="form-control">
            </div>
            <div>
                Max:
                <input type="text" name="maxPrice" value="{{ $f_maxPrice > 0 ? $f_maxPrice : " " }}"
                    class="form-control">
            </div>
        </div>
        <div id="title" class="form-text"></div>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="saleProducts" name="saleProducts" role="switch" {{ $f_saleProducts ? 'checked' : '' }}>
        <label class="form-check-label" for="saleProducts">
            @lang('app.saleProducts')
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="topProducts" name="topProducts"  role="switch" {{ $f_topProducts ? 'checked' : '' }}>
        <label class="form-check-label" for="topProducts">
            @lang('app.topProducts')
        </label>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="bi bi-x"></i> Reset</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>