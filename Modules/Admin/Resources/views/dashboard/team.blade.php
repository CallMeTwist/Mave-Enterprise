<x-kit.dashboard>

    <x-slot name="title">Team Members</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Team Members</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Add New Member'"
                :icon="'fa fa-users'"
                :description="'Fill the form below to add a new member'" />

            <form action="{{ route('admin.dashboard.team.save') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Member Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter member's name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Enter Position</label>
                            <input type="text" class="form-control input-bottom" name="title" value="{{ old('title') }}" placeholder="Enter position here" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Member Photo</label>
                            <input type="file" class="form-control input-bottom" name="avatar" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-plus-circle m-r-10"></i> Add Member</button>

            </form>

        </div>
    </div>

    @foreach($members->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $member)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-start">
                                <img src="{{ asset($member->avatar) }}" class="rounded-0" style="width: 100px; height: 100px;"/>
                                <div class="m-l-10">
                                    <h6 class="col-bold mb-0">{{ $member->name }}</h6>
                                    <p>{{ $member->title }}</p>
                                    <div class="mt-2">
                                        <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $member->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                                        <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $member->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit{{ $member->code }} Modal -->
                <div class="modal fade" id="edit{{ $member->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.dashboard.team.update') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="team" value="{{ $member->code }}" required>

                                    <div class="mb-3">
                                        <label>Member Name</label>
                                        <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', $member->name) }}" placeholder="Enter member's name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Enter Position</label>
                                        <input type="text" class="form-control input-bottom" name="title" value="{{ old('title', $member->title) }}" placeholder="Enter position here" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Member Photo</label>
                                        <input type="file" class="form-control input-bottom" name="avatar" accept="image/*">
                                    </div>

                                    <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Member</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="del{{ $member->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-red">
                                        <div class="event-indicator">
                                            <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Delete {{ $member->name }}?</h3>
                                    <p class="text-muted">This action will delete this member, this action cannot be undone!</p>
                                </div>
                                <div class="text-center">
                                    <form method="post" action="{{ route('admin.dashboard.team.delete') }}">
                                        @csrf
                                        <input type="hidden" name="team" value="{{ $member->code }}" required>
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
