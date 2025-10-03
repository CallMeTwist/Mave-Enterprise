@if($entity->count() == 0)
    <div class="text-center {{ $class ?? '' }}">
        <i class="fa fa-info-circle col-white font-50 my-3"></i>
        <h4 class="text-muted">We couldn't find any data</h4>
        <p class="metric-label">
            Sorry we can't find any data, to get rid of this message, make at least 1 entry.
        </p>
        <a href="{{ url()->current() }}" class="btn btn-primary mt-3">Refresh Page</a>
    </div>
@endif
