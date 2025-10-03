<x-kit.dashboard>

    <x-slot name="title">Manage Testimonials</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Manage Testimonials</li>
    </x-slot>

    <div class="card rounded-0 shadow-lg">
        <div class="card-body">

            <x-kit._card_title
                :title="'New Testimonial'"
                :icon="'fa fa-comment-dots text-warning'"
                :description="'Fill the form below to add a new testimonial message'" />

            <form method="post" action="{{ route('panel.testimonials.save') }}" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control input-bottom" name="title" value="{{ old('title') }}" placeholder="Enter title">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>User Image</label>
                            <input type="file" class="form-control input-bottom" name="image" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Message</label>
                    <input type="text" class="form-control input-bottom" name="message" value="{{ old('message') }}" placeholder="Enter message" required>
                </div>

                <button class="btn btn-success rounded-0">Save Testimonial</button>

            </form>

        </div>
    </div>

    <div class="my-5">
        @foreach($testimonials->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $testimonial)
                    <div class="col-sm-4">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{ asset($testimonial->image ?? 'assets/images/placeholder.png') }}" width="80px" class="rounded-circle shadow-lg border border-3"/>
                                    <div class="ms-3">
                                        <h5 class="mb-0 col-bold">{{ $testimonial->name }}</h5>
                                        <p class="mb-1">{{ $testimonial->title }}</p>
                                    </div>
                                </div>
                                <p class="py-2">{{ $testimonial->message }}</p>
                                <div class="mt-2">
                                    <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $testimonial->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                                    <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $testimonial->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- edit{{ $testimonial->code }} Modal -->
                    <div class="modal fade" id="edit{{ $testimonial->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Testimonial</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('panel.testimonials.update') }}" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" name="testimonial" value="{{ $testimonial->code }}" required>

                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', $testimonial->name) }}" placeholder="Enter name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control input-bottom" name="title" value="{{ old('title', $testimonial->title) }}" placeholder="Enter title" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>User Image</label>
                                            <input type="file" class="form-control input-bottom" name="image" accept="image/*">
                                        </div>

                                        <div class="mb-3">
                                            <label>Message</label>
                                            <input type="text" class="form-control input-bottom" name="message" value="{{ old('message', $testimonial->message) }}" placeholder="Enter message" required>
                                        </div>

                                        <button class="btn btn-success rounded-0">Update Testimonial</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="del{{ $testimonial->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Testimonial?</h3>
                                        <p class="text-muted">This action will delete this message, this action cannot be undone!</p>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" action="{{ route('panel.testimonials.delete') }}">
                                            @csrf
                                            <input type="hidden" name="testimonial" value="{{ $testimonial->code }}" required>
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
    </div>

</x-kit.dashboard>
