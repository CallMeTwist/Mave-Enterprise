@if(session()->has('info'))
    <div class="alert alert-info alert-message mb-3">
        <i class="far fa-lightbulb m-r-5"></i> {{ session()->get('info') }}
    </div>
@endif

@if(session()->has('success'))
    <div class="alert bg-teal alert-message mb-3">
        <i class="far fa-check-circle m-r-5"></i> {!! session()->get('success') !!}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning alert-message mb-3">
        <i class="fas fa-info-circle m-r-5"></i> {{ session()->get('warning') }}
    </div>
@endif

@if(session()->has('danger'))
    <div class="alert alert-danger alert-message mb-3">
        <i class="fas fa-exclamation-triangle m-r-5"></i> {!! session()->get('danger') !!}
    </div>
@endif
