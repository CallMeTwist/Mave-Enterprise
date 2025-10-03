<x-kit.dashboard>

    <x-slot name="title">System Settings</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item active">System Settings</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Manage Settings'"
                :icon="'fa fa-gear'"
                :description="'Fill the form below to update the system settings'" />

            <form method="post" action="{{ route('panel.settings.save') }}">

                @csrf

                <div class="row">
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label>Office Address</label>
                            <input type="text" class="form-control input-bottom" name="address" value="{{ old('address', get_settings()->address) }}" placeholder="Enter the address">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Official Phone</label>
                            <input type="text" class="form-control input-bottom" name="phone" value="{{ old('phone', get_settings()->phone) }}" placeholder="Enter the official phone" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Help Line</label>
                            <input type="text" class="form-control input-bottom" name="help_line" value="{{ old('help_line', get_settings()->help_line) }}" placeholder="Enter the official help line">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Official Email</label>
                            <input type="email" class="form-control input-bottom" name="email" value="{{ old('email', get_settings()->email) }}" placeholder="Enter the official email" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Facebook Link</label>
                            <input type="text" class="form-control input-bottom" name="facebook" value="{{ old('facebook', get_settings()->facebook) }}" placeholder="Enter facebook link">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Twitter Link</label>
                            <input type="text" class="form-control input-bottom" name="twitter" value="{{ old('twitter', get_settings()->twitter) }}" placeholder="Enter twitter link">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Instagram Link</label>
                            <input type="text" class="form-control input-bottom" name="instagram" value="{{ old('instagram', get_settings()->instagram) }}" placeholder="Enter instagram link">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Youtube Link</label>
                            <input type="text" class="form-control input-bottom" name="youtube" value="{{ old('youtube', get_settings()->youtube) }}" placeholder="Enter youtube link">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>LinkedIn Link</label>
                            <input type="text" class="form-control input-bottom" name="linkedin" value="{{ old('linkedin', get_settings()->linkedin) }}" placeholder="Enter linkedin link">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Telegram Link</label>
                            <input type="text" class="form-control input-bottom" name="telegram" value="{{ old('telegram', get_settings()->telegram) }}" placeholder="Enter telegram link">
                        </div>
                    </div>
                </div>

                <h5 class="col-bold my-4">Affiliate System Settings</h5>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>Registration Fee</label>
                            <input type="number" class="form-control input-bottom" name="registration_fee" value="{{ old('registration_fee', get_settings()->affiliate_registration_fee) }}" placeholder="Enter amount" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Seller Percentage</label>
                            <input type="number" class="form-control input-bottom" name="seller_percentage" value="{{ old('seller_percentage', get_settings()->seller_percent) }}" placeholder="Enter percentage" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>First Referral Percentage</label>
                            <input type="number" class="form-control input-bottom" name="first_referral_percent" value="{{ old('first_referral_percent', get_settings()->first_referral_percent) }}" placeholder="Enter percentage" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Second Referral Percentage</label>
                            <input type="number" class="form-control input-bottom" name="second_referral_percent" value="{{ old('second_referral_percent', get_settings()->second_referral_percent) }}" placeholder="Enter percentage" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label>Company Percentage</label>
                            <input type="number" class="form-control input-bottom" name="company_percent" value="{{ old('company_percent', get_settings()->company_percent) }}" placeholder="Enter percentage" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Settings</button>

            </form>

        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">

            <form method="post" action="{{ route('panel.settings.accounts.save') }}" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label>Bank Name</label>
                            <input type="text" class="form-control input-bottom input-bottom" name="bank" value="{{ old('bank') }}" placeholder="Enter bank name" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label>Account Name</label>
                            <input type="text" class="form-control input-bottom input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter account name" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label>Account Number</label>
                            <input type="number" class="form-control input-bottom input-bottom" name="number" value="{{ old('number') }}" placeholder="Enter account number" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="mb-3">
                            <label>Bank Logo</label>
                            <input type="file" class="form-control input-bottom input-bottom" accept="image/*" name="logo" required>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Account</button>

            </form>

        </div>
    </div>

    @foreach($accounts->chunk(3) as $chunk)
        <div class="row mt-3">
            @foreach($chunk as $account)
                <div class="col-sm-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-start">
                                <img src="{{ asset($account->logo) }}" class="w-25 rounded-0" />
                                <div class="m-l-10">
                                    <h6 class="col-bold mb-0">{{ $account->name }} <small>({{ $account->bank }})</small></h6>
                                    <p>{{ $account->number }}</p>
                                    <div class="mt-2">
                                        <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $account->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                                        <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $account->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- edit{{ $account->code }} Modal -->
                <div class="modal fade" id="edit{{ $account->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('panel.settings.accounts.update') }}" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="account" value="{{ $account->code }}" required>

                                    <div class="mb-3">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control input-bottom input-bottom" name="bank" value="{{ old('bank', $account->bank) }}" placeholder="Enter bank name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Account Name</label>
                                        <input type="text" class="form-control input-bottom input-bottom" name="name" value="{{ old('name', $account->name) }}" placeholder="Enter account name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Account Number</label>
                                        <input type="number" class="form-control input-bottom input-bottom" name="number" value="{{ old('number', $account->number) }}" placeholder="Enter account number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Bank Logo</label>
                                        <input type="file" class="form-control input-bottom input-bottom" accept="image/*" name="logo">
                                    </div>

                                    <button class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Save Account</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="del{{ $account->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-red">
                                        <div class="event-indicator">
                                            <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Delete {{ $account->name }}?</h3>
                                    <p class="text-muted">This action will delete this account information, this action cannot be undone!</p>
                                </div>
                                <div class="text-center">
                                    <form method="post" action="{{ route('panel.settings.accounts.delete') }}">
                                        @csrf
                                        <input type="hidden" name="account" value="{{ $account->code }}" required>
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
