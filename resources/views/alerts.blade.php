<div class="row mt-2">
    <div class="errors mb-3 col-12">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible mt-1">
                    <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                    <i class="fas fa-times-circle me-3"></i>
                    <strong>¡Error!</strong> {{ $error }}
                </div>
            @endforeach
        @endif
        @if (session('message'))
            <div class="alert alert-success alert-dismissible mt-1">
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                <i class="fas fa-check-circle me-3"></i>
                <strong>¡Éxito!</strong> {{ session('message') }}
            </div>
        @endif
    </div>
</div>