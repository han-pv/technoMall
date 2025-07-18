<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3" href="indextw.html">@lang('app.appName') </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            </ul>
            <form class="d-flex my-2 my-lg-0 flex-grow-1 mx-lg-3 search-bar">
                <input class="form-control rounded-start-pill py-2 border-primary" type="search"
                    placeholder="Искать на МегаШоп..." aria-label="Поиск">
                <button class="btn btn-warning rounded-end-pill px-4" type="submit"><i
                        class="bi bi-search text-dark"></i></button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person me-1"></i> Мой Аккаунт
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-box-seam me-1"></i> Заказы
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="#">
                        <i class="bi bi-cart me-1 fs-5"></i> Корзина <span
                            class="badge bg-warning text-dark rounded-pill ms-1">3</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>