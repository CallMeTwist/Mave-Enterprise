<x-kit.dashboard>

    <x-slot name="title">Frequently Asked Questions</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Website Elements</li>
        <li class="breadcrumb-item active">FAQS</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Create New FAQ'"
                :icon="'fa fa-question-circle'"
                :description="'Fill the form below to create a new question'" />

            <form action="{{ route('admin.dashboard.faqs.save') }}" method="post">

                @csrf

                <div class="mb-3">
                    <label>Enter Question</label>
                    <input type="text" class="form-control input-bottom" name="question" value="{{ old('question') }}" placeholder="Enter question here" required>
                </div>

                <div class="mb-3">
                    <label>Enter Answer</label>
                    <input type="text" class="form-control input-bottom" name="answer" value="{{ old('answer') }}" placeholder="Enter answer here" required>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Question</button>

            </form>

        </div>
    </div>

    <div class="accordion" id="accordionExample">
        @foreach($faqs as $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $faq->code }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->code }}" aria-expanded="{{ $loop->first ? 'true' : '' }}" aria-controls="collapse{{ $faq->code }}">
                        {{ $faq->question }}
                    </button>
                </h2>
                <div id="collapse{{ $faq->code }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $faq->code }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{ $faq->answer }}
                        <div class="m-t-20">
                            <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target=".edit{{ $faq->code }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</button>
                            <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target=".delete{{ $faq->code }}"><i class="fas fa-trash m-r-5"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade edit{{ $faq->code }}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.dashboard.faqs.update') }}" method="post">

                                @csrf

                                <input type="hidden" name="faq" value="{{ $faq->code }}" required>

                                <div class="mb-3">
                                    <label>Enter Question</label>
                                    <input type="text" class="form-control input-bottom" name="question" value="{{ old('question', $faq->question) }}" placeholder="Enter question here" required>
                                </div>

                                <div class="mb-3">
                                    <label>Enter Answer</label>
                                    <input type="text" class="form-control input-bottom" name="answer" value="{{ old('answer', $faq->answer) }}" placeholder="Enter answer here" required>
                                </div>

                                <button type="submit" class="btn btn-primary rounded-0"><i class="fas fa-save m-r-10"></i> Update Question</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade delete{{ $faq->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-red">
                                    <div class="event-indicator">
                                        <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Delete Question?</h3>
                                <p class="text-muted">
                                    This action will delete this question, this action cannot be undone!
                                </p>
                            </div>
                            <div class="text-center">
                                <form method="post" action="{{ route('admin.dashboard.faqs.delete') }}">
                                    @csrf
                                    <input type="hidden" name="faq" value="{{ $faq->code }}" required>
                                    <button type="submit" class="btn bg-red w-100 rounded-0">Delete Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
        @endforeach
    </div>

</x-kit.dashboard>
