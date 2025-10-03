@if($errors->any())
    <ul class="list-group list-group-flush mb-3">
        @foreach ($errors->all() as $error)
            <li class="list-group-item bg-red px-3">
                <i class="fa fa-info-circle mt-1 mr-2"></i> {{ $error }}
            </li>
        @endforeach
    </ul>
@endif
