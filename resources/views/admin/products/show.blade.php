@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="h4 mt-4 mb-3">
            <a href="{{ route('admin.products.index') }}"><i class="bi bi-arrow-left-circle h3 text-primary"></i></a>
            @lang('app.view') {{ $product->getTitle() }}
        </div>

        <table class="table table-striped table-hover border border-1 rounded-2 ">
            <tr>
                <td class="col-2">
                    <div>
                        <img src="{{ asset($product->image ? 'storage/' . $product->image : 'img/products/defult.jpg') }}"
                            class="card-img-top" alt="{{ $product->getTitle() }}">
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <span class="text-warning small me-1">
                            @for ($i = 0; $product->rating > $i; $i++)
                                <i class="bi bi-star-fill"></i>
                            @endfor
                            @for ($j = 0; $j < 5 - $product->rating; $j++)
                                <i class="bi bi-star"></i>
                            @endfor
                        </span>
                        <span class="small text-muted">{{ $product->rating }}</span>
                        <span class="small text-muted ms-3"><i class="bi bi-eye"></i> {{ $product->viewed }}</span>
                    </div>
                </td>
                <td>
                    <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                        <tr>
                            <td>
                                <span class="fw-semibold">EN </span>{{ $product->title ?: '-' }}
                            </td>
                            <td>
                                <span class="fw-semibold">TM </span>{{ $product->title_tm ?: '-' }}
                            </td>

                            <td>
                                <span class="fw-semibold">RU </span>{{ $product->title_ru ?: '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-bookmark me-1"></i>
                                {{ $product->category->parent->getName() . ' / ' . $product->category->getName() }}</td>
                            <td><i class="bi bi-award me-1"></i>
                                {{ $product->brand->name . ' / ' . $product->brandModel->name }}</td>
                            <td><i class="bi bi-palette me-1"></i> {{ $product->color->name }}</td>
                        </tr>
                        <tr>
                            <td><span class="fw-semibold">Price: </span> {{ $product->price }} TMT</td>
                            <td>{{ $product->is_discount ? $product->discount_precent . '%' : '-' }}</td>
                            <td>{{ $product->is_discount ? number_format($product->price * (1 - $product->discount_precent / 100), 2, '.', '') . " TMT" : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-clock me-1"></i> {{ $product->created_at->format('d.m.Y H:i') }}</td>
                            <td><i class="bi bi-clock me-1"></i> {{ $product->updated_at->format('d.m.Y H:i') }}</td>
                            <td><i class="bi bi-person me-1"></i> {{ $product->user->name }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
            <tr>
                <th>{{ __('app.description') . " EN" }}</th>
                <th>{{ __('app.description') . " TM" }}</th>
                <th>{{ __('app.description') . " RU" }}</th>
            </tr>
            <tr>
                <td>{{ $product->description }}</td>
                <td>{{ $product->description_tm }}</td>
                <td>{{ $product->description_ru }}</td>
            </tr>
        </table>
    </div>
@endsection