<x-kit.dashboard>

    <x-slot name="title">Manage Brands</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">Brands</li>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <form method="post" action="{{ route('admin.website.brands.save') }}" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label>Brand Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Logo</label>
                            <input type="file" class="form-control input-bottom" accept="image/*" name="logo" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Brand</button>

            </form>

        </div>
    </div>

    <div class="mt-4">
        @foreach($brands->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $brand)
                    <div class="col-sm-3">
                        <div class="card rounded-0">
                            <img src="{{ asset($brand->logo) }}" class="card-img-top w-100 p-1 rounded-0" />
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="mb-0">{{ $brand->name }}</h4>
                                    <div class="mt-2">
                                        <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $brand->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                                        <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $brand->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- edit{{ $brand->code }} Modal -->
                    <div class="modal fade" id="edit{{ $brand->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('admin.website.brands.update') }}" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" name="sponsor" value="{{ $brand->code }}" required>

                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', $brand->name) }}" placeholder="Enter name" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Brand Logo</label>
                                            <input type="file" class="form-control input-bottom" name="logo">
                                        </div>

                                        <div class="mb-3">
                                            <label>Link</label>
                                            <input type="text" class="form-control input-bottom" name="link" value="{{ old('link', $brand->link) }}" placeholder="Enter sponsor link">
                                        </div>

                                        <button class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Brand</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="del{{ $brand->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Brand?</h3>
                                        <p class="text-muted">This action will delete this brand, this action cannot be undone!</p>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" action="{{ route('admin.website.brands.delete') }}">
                                            @csrf
                                            <input type="hidden" name="sponsor" value="{{ $brand->code }}" required>
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
