@if(session('success'))
    <div class="position-fixed top-0 end-0 m-3 pt-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi-check-circle-fill"></i> {!! session('success') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(isset($success))
    <div class="position-fixed top-0 end-0 m-3 pt-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi-check-circle-fill"></i> {!! $success !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
@if(session('error'))
    <div class="position-fixed top-0 end-0 m-3 pt-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi-x-circle-fill"></i> {!! session('error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(isset($error))
    <div class="position-fixed top-0 end-0 m-3 pt-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi-x-circle-fill"></i> {!! $error !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif($errors->any())
    <div class="position-fixed top-0 end-0 m-3 pt-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach($errors->all() as $error)
                <div><i class="bi-x-circle-fill"></i> {{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif