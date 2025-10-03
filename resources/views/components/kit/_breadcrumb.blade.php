<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title ?? 'Dashboard' }}</h5>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                    </ul>
                    @if(isset($bread_actions))
                        {!! $bread_actions !!}
                    @else
                        <a href="javascript:history.back()" class="btn btn-secondary btn-sm"><i class="feather icon-arrow-left"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
