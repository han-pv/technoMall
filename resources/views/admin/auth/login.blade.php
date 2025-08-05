<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('login') @lang('app.appName')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-light">
    @include('admin.app.alert')
    <div class="container-xxl">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <form action="{{ route('login') }}" method="POST" class="col-10 col-md-8 col-lg-6 col-xl-4">
                @csrf
                <div class="display-4 text-center mb-4">
                    <span class="text-primary fw-bolder">Techno</span>Mall
                </div>
                <div class="w-100">
                    <label for="validationCustomUsername" class="form-label">@lang('app.username') </label>
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" id="username" required>
                </div>
                <div class="w-100">
                    <label for="password" class="col-form-label">@lang('app.password') </label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <button class="btn btn-primary w-100 mt-4" type="submit">@lang('app.submit') </button>
            </form>
        </div>
    </div>
</body>

</html>