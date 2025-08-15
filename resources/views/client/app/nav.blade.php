<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}">@lang('app.appName') </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form action="{{ route('products.index', array_merge(request()->query(), request()->only('category'))) }}"
                method="get" role="search" class="d-flex my-2 my-lg-0 flex-grow-1 mx-lg-5">
                <input class="form-control rounded-start-pill border-primary border-end-0 px-4 py-2" type="text" id="q"
                    name="q" value="{{ request('q') }}" placeholder="@lang('app.search')..." aria-label="search">
                @foreach (request()->query() as $key => $value)
                    @if ($key !== 'q')
                        @if (is_array($value))
                            @foreach ($value as $val)
                                <input type="hidden" name="{{ $key }}[]" value="{{ $val }}">
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endif
                @endforeach
                @if(request()->has('q'))
                    <div class="bg-light border border-start-0 border-primary">
                        <a href="{{ route('products.index', array_merge(request()->except('q'))) }}"
                            class="btn btn-close mt-2 me-2" aria-label="Close"></a>
                    </div>
                @endif
                <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                    <i class="bi bi-search text-light"></i>
                </button>
            </form>
            <ul class="navbar-nav h5 ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
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
                        <a href="{{ route('products.index', array_merge(request()->query(), ['category' => $category->id])) }}"
                            class="btn btn-outline-primary">{{ $category->getName() }}</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($category->children as $child)
                                <li><a class="dropdown-item"
                                        href="{{ route('products.index', array_merge(request()->query(), ['category' => $child->id])) }}">{{ $child->getName() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
            @if(request()->has('category'))
                <div class="d-inline">
                    <a href="{{ route('products.index', request()->except('category')) }}"
                        class="btn btn-sm btn-secondary">@lang('app.clearCategory') </a>
                </div>
            @endif
        </div>
    </div>
</div>