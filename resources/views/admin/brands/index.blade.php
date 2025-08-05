@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex justify-content-between mt-4 mb-3">
            <div class="h4">
                @lang('app.brands')
            </div>
            <div>
                <a href="{{ route('admin.brands.create') }} " class="btn btn-primary">+ @lang('app.addNewBrand') </a>
            </div>
        </div>

        <table class="table table-striped table-hover border border-1 rounded-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> @lang('app.name') </th>
                    <th scope="col"> @lang('app.productsCount') </th>
                    <th scope="col"> @lang('app.createdAt') </th>
                    <th scope="col"> @lang('app.updatedAt') </th>
                    <th scope="col"> @lang('app.settings') <i class="bi bi-gear-fill"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $brand->name  }}</td>
                        <td>{{ $brand->products_count  }}</td>
                        <td>{{ $brand->created_at->format('d.m.Y H:m')  }}</td>
                        <td>{{ $brand->updated_at->format('d.m.Y H:m')  }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning m-1"> <i
                                        class="bi bi-pencil"></i> </a>

                                <button type="button" class="btn btn-danger m-1 delete-btn" data-id="{{ $brand->id }}"
                                    data-name="{{ $brand->name }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <form id="deleteForm" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Kapat"></button>
                    </div>
                    <div class="modal-body">
                        <p id="deleteMessage">Are you sure you want to delete this item?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> @lang('app.cancel')
                        </button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">@lang('app.delete') </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.delete-btn');
                const deleteForm = document.getElementById('deleteForm');
                const deleteMessage = document.getElementById('deleteMessage');
                let currentId = null;

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        currentId = this.getAttribute('data-id');
                        const brandName = this.getAttribute('data-name') || '';
                        deleteMessage.textContent = `Are you sure you want to delete "${brandName}"?`;
                        deleteForm.action = `/admin/brands/${currentId}`;
                    });
                });

                document.getElementById('confirmDelete').addEventListener('click', function () {
                    deleteForm.submit();
                });
            });
        </script>

    </div>
@endsection