<x-kit.dashboard>

    <x-slot name="title">Media Gallery</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Media Gallery</li>
    </x-slot>

    <div class="alert bg-red"><i class="fa fa-exclamation-triangle m-r-10"></i> This page has rendering problems, please remember to troubleshoot the <b>card</b> structure.</div>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Upload New Media'"
                :icon="'fa fa-upload'"
                :description="'Fill the form below to upload a new resource'" />


                <form action="{{ route('admin.dashboard.galleries.upload') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="type" value="image" required>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Image File</label>
                            <input type="file" class="form-control input-bottom" accept="image/*" name="image">
                        </div>
                        <div class="col-md-6">
                            <label>Video Link</label>
                            <input type="text" class="form-control input-bottom" name="link" value="{{ old('link') }}" placeholder="Enter youtube link">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Gallery</button>

                </form>

        </div>
    </div>

    @foreach($gallerys->chunk(3) as $chunk)
        <div class="row mb-4">
            @foreach($chunk as $file)
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            @if($file->image)
                                <img src="{{ asset($file->link) }}" class="w-100 rounded-0" />
                            @else
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $file->link }}?rel=0" title="YouTube video" allowfullscreen></iframe>
                                </div>
                                <h6 class="text-muted mt-2">{{ $file->link }}</h6>
                            @endif
                            <div class="mt-3">
                                <button class="btn btn-danger btn-sm w-100 rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $file->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="del{{ $file->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-red">
                                        <div class="event-indicator">
                                            <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Delete File?</h3>
                                    <p class="text-muted">This action will delete this media file, this action cannot be undone!</p>
                                </div>
                                <div class="text-center">
                                    <form method="post" action="{{ route('admin.dashboard.galleries.delete') }}">
                                        @csrf
                                        <input type="hidden" name="gallery" value="{{ $file->code }}" required>
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
