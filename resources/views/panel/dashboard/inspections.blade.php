@extends('kit.layouts.dashboard',[
    $title = 'Manage Inspections',
    $pager = 'Manage Inspections'
])

@section('content')

    <section class="scroll-section">

        <h2 class="small-title">Manage Inspections</h2>

        @include('layouts._partials._errors')
        @include('layouts._partials._alert')

        @foreach($inspections->chunk(3) as $chunk)
            <div class="row mb-3">
                @foreach($chunk as $inspection)
                    <div class="col-sm-4">
                        <div class="card shadow-lg">
                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->name }}</span>
                                        <span class="font-italic col-grey">Name</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->phone }}</span>
                                        <span class="font-italic col-grey">Email</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->email }}</span>
                                        <span class="font-italic col-grey">Phone</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->address }}</span>
                                        <span class="font-italic col-grey">Address</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->attendance_date->format('l dS F Y h:i:s a') }}</span>
                                        <span class="font-italic col-grey">Inspection Date</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->referrer }}</span>
                                        <span class="font-italic col-grey">Referrer</span>
                                    </div>
                                    <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                        <span>{{ $inspection->comments }}</span>
                                        <span class="font-italic col-grey">Comments</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-grey p-3">
                                <h6 class="col-white col-bold">Properties To Be Inspected</h6>
                                <div class="list-group list-group-flush">
                                    @foreach(explode(', ', $inspection->locations) as $code)
                                        @php
                                            $location = \App\Location::find($code);
                                        @endphp
                                        <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                            <span>{{ $location->name }}</span>
                                            <span><a href="{{ route('kit.locations.view', $code) }}"><i class="fa fa-arrow-circle-right"></i></a></span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="m-t-20">
                                    @if(!$inspection->approved)
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target=".approve{{ $inspection->id }}"><i class="fas fa-check-circle m-r-5"></i> Approve</button>
                                    @endif
                                    <button class="btn bg-red btn-sm" data-bs-toggle="modal" data-bs-target=".delete{{ $inspection->id }}"><i class="fas fa-trash m-r-5"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!$inspection->approved)
                        <div class="modal fade approve{{ $inspection->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="px-3 pt-3 text-center">
                                            <div class="event-type bg-light-green">
                                                <div class="event-indicator">
                                                    <i class="fa fa-check-circle text-white" style="font-size: 40px"></i>
                                                </div>
                                            </div>
                                            <h3 class="pt-3">Approve Inspection?</h3>
                                            <p class="text-muted">This action will approve this inspection, do you want to continue?</p>
                                            <form method="post" action="{{ route('kit.inspection.approve') }}">
                                                @csrf
                                                <input type="hidden" name="inspection" value="{{ $inspection->id }}" required>
                                                <button type="submit" class="btn bg-light-green">Restore Anyway</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Delete Modal -->
                    <div class="modal fade delete{{ $inspection->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Inspection?</h3>
                                        <p class="text-muted">This action will delete this inspection, this action cannot be undone!</p>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" action="{{ route('kit.inspection.delete') }}">
                                            @csrf
                                            <input type="hidden" name="inspection" value="{{ $inspection->id }}" required>
                                            <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Ends -->

                @endforeach
            </div>
        @endforeach

    </section>

@endsection
