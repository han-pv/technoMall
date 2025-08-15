<div class="col">
    <div
        class="card h-100  border-{{ $obj->is_discount ? ($obj->discount_precent >= 80 ? 'danger' : ($obj->discount_precent >= 60 ? 'warning' : 'success')) : 'primary' }} shadow-sm">
        <a href="{{ route('products.show', [$obj->slug]) }}" class="text-decoration-none">
            @if ($obj->is_discount)
                <span
                    class="badge bg-{{ ($obj->discount_precent >= 80 ? 'danger' : ($obj->discount_precent >= 60 ? 'warning' : 'success')) }}  position-absolute top-0 start-0 m-2 fs-6">
                    -{{ $obj->discount_precent }}%
                </span>
            @endif
            @if (!($obj->is_stock))
                <span class="badge bg-danger position-absolute top-0 end-0 m-2 fs-6">
                    @lang('app.outOfStock')
                </span>
            @endif
            <img src="{{ asset($obj->image ? 'storage/' . $obj->image : 'img/products/defult.jpg') }}"
                class="card-img-top p-3" alt="{{ $obj->getTitle() }}">
            <div class="card-body d-flex flex-column">
                <div class="card-title h5 fw-semibold " style="height: 64px;">{{ $obj->getTitle() }}
                </div>
                @if ($obj->is_discount)
                    <div class="">
                        <del class="text-muted small">{{ $obj->price }} TMT</del>
                        <div class="price h5 fw-bold text-danger mb-0">
                            {{number_format($obj->price * (1 - $obj->discount_precent / 100), 2, '.', '')  }} TMT
                        </div>
                    </div>
                @else
                    <div class="">
                        <del class="d-inline-block"></del>
                        <div class="price h5 fw-bold text-danger mb-0">
                            {{ $obj->price  }} TMT
                        </div>
                    </div>
                @endif
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning small me-1">
                        @for ($i = 0; $obj->rating > $i; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                        @for ($j = 0; $j < 5 - $obj->rating; $j++)
                            <i class="bi bi-star"></i>
                        @endfor
                    </span>
                    <span class="small text-muted">{{ $obj->rating }}</span>
                    <span class="small text-muted ms-3"><i class="bi bi-eye"></i> {{ $obj->viewed }}</span>
                </div>
            </div>
        </a>
    </div>
</div>