<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold fs-3" href="indextw.html">@lang('app.appName') </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold" href="indextw.html" id="navbarDropdownCategories"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-grid-3x3-gap-fill me-1"></i> @lang('app.categories')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="#">{{  $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul> -->
            <form class="d-flex my-2 my-lg-0 flex-grow-1 mx-lg-5 search-bar">
                <input class="form-control rounded-start-pill py-2 border-primary" type="search"
                    placeholder="@lang('app.search')... " aria-label="Поиск">
                <button class="btn btn-primary rounded-end-pill px-4" type="submit"><i
                        class="bi bi-search text-dark"></i></button>
            </form>
            <ul class="navbar-nav h5 ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person me-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart me-1"></i>
                        <span class="badge bg-primary text-dark rounded-pill ms-1"></span>
                    </a>
                </li>
            </ul>
            <div class="dropdown ms-auto">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ app()->getLocale() }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}">TM</a></li>
                    <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">RU</a></li>
                    <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">EN</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="shadow-sm mt-0 mb-3 pb-3">
    <div class="container-xxl">
        <div class="d-flex">
            @foreach ($categories as $category)
                <div class="d-inline me-5">
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-primary">{{ $category->getName() }}</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($category->children as $child)
                            <li><a class="dropdown-item" href="#">{{ $child->getName() }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>