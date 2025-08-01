@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex justify-content-between mt-4 mb-3">
            <div class="h4">
                @lang('app.brands')
            </div>
            <div>
                <a href="{{ route('admin.brands.create') }} " class="btn btn-primary"> @lang('app.addNewBrand') </a>
            </div>
        </div>

        <table class="table table-striped table-hover border border-1 rounded-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> @lang('app.name') </th>
                    <th scope="col"> @lang('app.productsCount') </th>
                    <th scope="col"> @lang('app.settings') </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $brand->name  }}</td>
                        <td>{{ $brand->products_count  }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ url('admin/brands/' . $brand->id .'/edit') }}" class="btn btn-warning m-1"> <i class="bi bi-pencil"></i> </a>
                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-1"> <i class="bi bi-trash3"></i> </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cyndanam pozmak isleyarsinizmi? </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"> <i class="bi bi-trash3"></i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function deleteModal(brand) {
                console.log(brand)
            }
        </script>
    </div>
@endsection