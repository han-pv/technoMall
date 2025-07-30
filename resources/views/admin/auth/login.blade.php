@extends('admin.layouts.app')

@section('content')
    <div class="container-xxl">
        <div class="d-flex align-items-center justify-content-center vh-100">

            <form action="{{ route('login') }}"  method="POST" class="col-10 col-md-8 col-lg-6 col-xl-4">
                @csrf
                <div class="display-4 text-center mb-4">
                    <span class="text-primary fw-bolder">Techno</span>Mall
                </div>
                <div class="w-100">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="w-100">
                    <label for="password" class="col-form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary w-100 mt-4" type="submit">Submit </button>
            </form>
        </div>
    </div>
@endsection