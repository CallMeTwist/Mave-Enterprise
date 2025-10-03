<x-kit.dashboard>

    <x-slot name="title">Profile Settings</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item active">Account Settings</li>
    </x-slot>

    <div class="row">
        <div class="col-sm-6">

            <div class="card">
                <div class="card-body">

                    <x-kit._card_title
                        :title="'Account Details'"
                        :icon="'fa fa-user'"
                        :description="'Fill the form below to update your account details'" />

                    <form method="post" action="{{ route('panel.settings.profile.update') }}">

                        @csrf

                        <div class="mb-3">
                            <label>Account Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', me()->name) }}" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" class="form-control input-bottom" name="email" value="{{ old('email', me()->email) }}" placeholder="Enter email address" required>
                        </div>

                        <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Profile</button>

                    </form>

                </div>
            </div>

        </div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-body">

                    <x-kit._card_title
                        :title="'Password Settings'"
                        :icon="'fa fa-lock'"
                        :description="'Fill the form below to update your account password'" />

                    <form method="post" action="{{ route('panel.settings.profile.password') }}">

                        @csrf

                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" class="form-control input-bottom" name="old_password" value="{{ old('old_password') }}" placeholder="Enter your current password" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" class="form-control input-bottom" name="password" value="{{ old('password') }}" placeholder="Enter your new password" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control input-bottom" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm password" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning rounded-0"><i class="fas fa-save m-r-10"></i> Update Password</button>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-kit.dashboard>
