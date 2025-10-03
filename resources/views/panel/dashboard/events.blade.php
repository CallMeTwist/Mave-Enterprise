<x-kit.dashboard>
    <x-slot name="title">Manage Events</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Manage Events</li>
    </x-slot>

    <div class="card rounded-0 shadow-lg">
        <div class="card-body">

            <x-kit._card_title
                :title="'New Event'"
                :icon="'fa fa-comment-dots text-warning'"
                :description="'Fill the form below to add a new event description'" />

            <form method="post" action="{{ route('panel.events.save') }}" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control input-bottom" name="title" value="{{ old('title') }}" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" class="form-control input-bottom" name="intro" value="{{ old('intro') }}" placeholder="Enter intro">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Venue</label>
                            <input type="text" class="form-control input-bottom" name="venue" value="{{ old('venue') }}" placeholder="Enter venue">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="dateTime">Date</label>
                            <input type="date" class="form-control input-bottom" name="date" value="{{ old('date') }}" placeholder="Enter date">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Event Photo</label>
                            <input type="file" class="form-control input-bottom" name="image" accept="image/*" required>
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" class="form-control input-bottom" name="description" value="{{ old('description') }}" placeholder="Enter description" required>
                </div>

                <button class="btn btn-success rounded-0">Save Event</button>

            </form>

        </div>
    </div>

    <div class="my-5">
        @foreach($events->chunk(3) as $chunk)
            <div class="row mb-3">
                @foreach($chunk as $event)
                    <div class="col-sm-4">
                        <div class="card">
                            <img src="{{ asset($event->image) }}" class="card-img-top" alt="Event Image">
                            <div class="card-body position-relative">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $event->intro }}</h6>
                                <p class="card-text">
                                    <strong>Venue:</strong>{{ $event->venue }}<br>
                                    <strong>Date:</strong> {{ $event->date }}
                                </p>
                                <p class="card-text">
                                    {!! str_limit($event->description, 100) !!}
                                </p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $event->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                                    <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $event->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                                </div>
                                @if($event->past)
                                    <span class="badge bg-success position-absolute bottom-0 start-3 mb-3 ">Passed</span>
                                @endif
                            </div>
                        </div>
                    </div>

                <!-- edit{{ $event->code }} Modal -->
                    <div class="modal fade" id="edit{{ $event->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('panel.events.update') }}" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" name="event" value="{{ $event->code }}" required>

                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control input-bottom" name="title" value="{{ old('title', $event->title) }}" placeholder="Enter title" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Intro</label>
                                            <input type="text" class="form-control input-bottom" name="intro" value="{{ old('title', $event->intro) }}" placeholder="Enter intro" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Venue</label>
                                            <input type="text" class="form-control input-bottom" name="venue" value="{{ old('venue', $event->venue) }}" placeholder="Enter venue" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Date</label>
                                            <input type="datet" class="form-control input-bottom" name="date" value="{{ old('date', $event->date) }}" placeholder="Enter date" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Event Image</label>
                                            <input type="file" class="form-control input-bottom" name="image" accept="image/*">
                                        </div>

                                        <div class="mb-3 form-check">
                                            <label class="form-check-label" for="past">Past Event</label>
                                            <input type="checkbox" class="form-check-input" id="past" name="past"  value="1" {{ old('past', $event->past) ? 'checked' : '' }}>
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <input type="text" class="form-control input-bottom" name="description" value="{{ old('description', $event->description) }}" placeholder="Enter description" required>
                                        </div>

                                        <button class="btn btn-success rounded-0">Update Event</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="del{{ $event->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Event?</h3>
                                        <p class="text-muted">This action will delete this message, this action cannot be undone!</p>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" action="{{ route('panel.events.delete') }}">
                                            @csrf
                                            <input type="hidden" name="event" value="{{ $event->code }}" required>
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
