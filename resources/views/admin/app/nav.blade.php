<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xxl">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}"> @lang('app.appName') </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">
                        @lang('app.dashboard') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.categories.index') }}"><i class="bi bi-bookmarks"></i> @lang('app.categories')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.brands.index') }}"><i class="bi bi-box"></i> @lang('app.brands')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.banners.index') }}"><i class="bi bi-image"></i> @lang('app.banners')
                    </a>
                </li>
            </ul>
        </div>
        <div>

            <form method="POST" action="{{ route('logout') }}" id="logout">
                @csrf
                <button class="btn btn-secondary" type="submit"><i class="bi bi-box-arrow-right"></i> @lang('app.logout') </button>
            </form>
        </div>
    </div>
</nav>