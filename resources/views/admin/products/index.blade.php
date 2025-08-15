@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex justify-content-between mt-4 mb-3">
            <div class="h4">
                @lang('app.products')
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary me-0">
                <i class="bi bi-plus-circle me-1"></i> @lang('app.addNewProduct')
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover border border-1 rounded-2 shadow-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center"><i class="bi bi-hash me-1"></i> @lang('app.id')</th>
                                <th scope="col" class="text-center"><i class="bi bi-image me-1"></i> @lang('app.image')</th>
                                <th scope="col" class="text-center"><i class="bi bi-text-left me-1"></i> @lang('app.title')</th>
                                <th scope="col" class="text-center"><i class="bi bi-tags me-1"></i> @lang('app.details')</th>
                                <th scope="col" class="text-center"><i class="bi bi-currency-dollar me-1"></i> @lang('app.price')</th>
                                <th scope="col" class="text-center"><i class="bi bi-calendar-event me-1"></i> @lang('app.dates')</th>
                                <th scope="col" class="text-center"><i class="bi bi-gear me-1"></i> @lang('app.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row" class="align-middle text-center">{{ $products->firstItem() + $loop->index }}</th>
                                    <td class="align-middle text-center col-2">
                                        <img src="{{ asset( $product->image ? 'storage/' . $product->image : 'img/products/defult.jpg') }}" class="img-fluid" alt="{{ $product->getTitle() }}">
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td class="fw-semibold">EN</td>
                                                <td>{{ $product->title ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">TM</td>
                                                <td>{{ $product->title_tm ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">RU</td>
                                                <td>{{ $product->title_ru ?: '-' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td><i class="bi bi-bookmark me-1"></i> {{ $product->category->getName() }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-award me-1"></i> {{ $product->brand->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-box me-1"></i> {{ $product->brandModel->name }}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-palette me-1"></i> {{ $product->color->name }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td>{{ $product->price }} TMT</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $product->is_discount ? $product->discount_precent . '%' : '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $product->is_discount ? number_format($product->price * (1 - $product->discount_precent / 100), 2) . " TMT" : '-' }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <table class="table table-striped table-hover border border-1 rounded-2 mb-0">
                                            <tr>
                                                <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $product->updated_at->format('d.m.Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $product->user->name }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-success m-1">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning m-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form id="deleteForm-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger m-1 delete-btn">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3 mb-5">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection