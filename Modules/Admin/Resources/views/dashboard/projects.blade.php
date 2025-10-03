<x-kit.dashboard>

    <x-slot name="title">Manage Projects</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Manage Projects</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Add New Project'"
                :icon="'fa fa-briefcase'"
                :description="'Fill the form below to add a new project'" />

            <form action="{{ route('admin.dashboard.projects.save') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Project Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter project's name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Client Name</label>
                            <input type="text" class="form-control input-bottom" name="client" value="{{ old('client') }}" placeholder="Enter client here" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Project Price</label>
                            <input type="text" class="form-control input-bottom" name="pricing" value="{{ old('pricing') }}" placeholder="E.g 1.5M Per 500 SQm" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Project Photo</label>
                            <input type="file" class="form-control input-bottom" name="image" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Project Address</label>
                    <input type="text" class="form-control input-bottom" name="location" value="{{ old('location') }}" placeholder="Enter location address here" required>
                </div>

                <div class="mb-3">
                    <label>Address Map</label>
                    <textarea class="form-control input-bottom" name="map" placeholder="Enter project's map" required>{{ old('map') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-plus-circle m-r-10"></i> Save Project</button>

            </form>

        </div>
    </div>

    @foreach($projects->chunk(3) as $chunk)
        <div class="row mb-3">
            @foreach($chunk as $project)
                <div class="col-sm-4">
                    <div class="card rounded-0">
                        <div class="image-half">
                            <img src="{{ asset($project->image) }}" class="card-img-top w-100 p-1 rounded-0" />
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ $project->name }}</h6>
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ $project->client }}</h6>
                                    <p class="mb-0">Client</p>
                                </div>
                                <div class="list-group-item">
                                    <h6 class="col-bold mb-0">{{ $project->location }}</h6>
                                </div>
                                <div class="list-group-item">
                                    <h6 class="col-bold mb-0">{!! config('currency')[get_settings()->currency] !!}{{ $project->pricing }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <iframe src="{{ $project->map }}" width="100%" height="220px"></iframe>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $project->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                            <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $project->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                        </div>
                    </div>
                </div>

                <!-- edit{{ $project->code }} Modal -->
                <div class="modal fade" id="edit{{ $project->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.dashboard.projects.update') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="project" value="{{ $project->code }}" required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Project Name</label>
                                                <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', $project->name) }}" placeholder="Enter project's name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Client Name</label>
                                                <input type="text" class="form-control input-bottom" name="client" value="{{ old('client', $project->client) }}" placeholder="Enter client here" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Project Price</label>
                                                <input type="text" class="form-control input-bottom" name="pricing" value="{{ old('pricing', $project->pricing) }}" placeholder="E.g 1.5M Per 500 SQm" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Project Photo</label>
                                                <input type="file" class="form-control input-bottom" name="image" accept="image/*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Project Address</label>
                                        <input type="text" class="form-control input-bottom" name="location" value="{{ old('location', $project->location) }}" placeholder="Enter location address here" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Address Map</label>
                                        <textarea class="form-control input-bottom" name="map" placeholder="Enter project's map" required>{{ old('map', $project->map) }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Project</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="del{{ $project->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-red">
                                        <div class="event-indicator">
                                            <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Delete {{ $project->name }}?</h3>
                                    <p class="text-muted">This action will delete this project, this action cannot be undone!</p>
                                </div>
                                <div class="text-center">
                                    <form method="post" action="{{ route('admin.dashboard.projects.delete') }}">
                                        @csrf
                                        <input type="hidden" name="project" value="{{ $project->code }}" required>
                                        <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

</x-kit.dashboard>
