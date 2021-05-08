<x-admin-layout>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Profile Information</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('profile_photo_path')
                                                    <div class="text-danger">{{ $message }}</div><br>
                                                @enderror
                                                <img style="height: 100px; width:100px;cursor: pointer;"
                                                    id="profile-img-tag"
                                                    src="{{ asset(Auth::user()->profile_photo_path) }}" alt=""
                                                    class="rounded mx-auto d-block"><br>
                                                <p class="font-weight-normal text-center">{{ Auth::user()->name }}</p>
                                                <div class="d-flex justify-content-center">
                                                    <input type="file" id="profile-img" name="profile_photo_path"
                                                        style="display:none">
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        class="font-weight-normal">Name</label>
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div><br>
                                                    @enderror
                                                    <input type="text" name="name" class=" form-control"
                                                        value="{{ Auth::user()->name }}"><br>
                                                    <label for="exampleInputEmail1"
                                                        class="font-weight-normal">Email</label>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div><br>
                                                    @enderror
                                                    <input type="email" name="email" class="form-control"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="float-right">
                                                    <button class="btn btn-dark">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Update Password </h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.passwordupdate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                Ensure your account is using a long, random password to stay secure.
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="font-weight-normal">Current
                                                        Password</label>
                                                    @error('current_password')
                                                        <div class="text-danger">{{ $message }}</div><br>
                                                    @enderror
                                                    <input type="password" name="current_password" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="Enter Current Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"
                                                        class="font-weight-normal">Password</label>
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div><br>
                                                    @enderror
                                                    <input type="password" name="password" class="form-control"
                                                        id="exampleInputPassword1" placeholder="Enter Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1"
                                                        class="font-weight-normal">Confirm Password</label>
                                                    @error('password_confirmation')
                                                        <div class="text-danger">{{ $message }}</div><br>
                                                    @enderror
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control" id="exampleInputPassword1"
                                                        placeholder="Confirm Password">
                                                </div>
                                                <div class="float-right">
                                                    <button type="submit" class="btn btn-dark">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Two Factor Authentication</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Add additional security to your account using two factor authentication.
                                        </div>
                                        <div class="col-md-6">
                                            @if (session('status') == 'thw-factor-authentication-disabled')
                                                <div class="alert alert-success" role="alert">
                                                    Two Factor Authentication Has Been Disabled
                                                </div>
                                            @endif
                                            @if (session('status') == 'thw-factor-authentication-enabled')
                                                <div class="alert alert-success" php artisan serve
                                                role="alert">
                                                    Two Factor Authentication Has Been Enabled
                                                </div>
                                            @endif

                                            <form action="{{ url('admin/two-factor-authentication') }}" method="POST">
                                                @csrf
                                                @if (auth()->user()->two_factor_secret)
                                                    Two factor Authentication is Enabled.
                                                @else
                                                    <div class="float-right">
                                                        <button class="btn btn-dark">Enable</button>
                                                    </div>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Logout On Other Devices Browser Session</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Manage and log out your active sessions on other browsers and devices.
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for=""></label>
                                            @foreach ($devices as $device)
                                                <ul>
                                                    <li>
                                                        @if ((new \Jenssegers\Agent\Agent())->isDesktop())
                                                            <i class="fas fa-desktop"></i>
                                                            @if ((new \Jenssegers\Agent\Agent())->isMobile())
                                                                <i class="fas fa-mobile"></i>
                                                                @if ((new \Jenssegers\Agent\Agent())->isTablet())
                                                                    <i class="fas fa-tablet"></i>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        &nbsp;
                                                        {{ $agent->platform() }} - {{ $agent->browser() }}
                                                    </li>
                                                    @if ($current_session_id == $device->id)
                                                        <li>Current Device - <span
                                                                class="badge rounded-pill bg-success text-white">This
                                                                Device</span></li>
                                                    @else

                                                    @endif
                                                    <li>IP Address - {{ $device->ip_address }}</li>
                                                    <li>Last Activity -
                                                        {{ Carbon\Carbon::parse($device->last_activity)->diffForHumans() }}
                                                    </li>

                                                </ul>
                                            @endforeach
                                            <div class="float-right">
                                                <button class="btn btn-dark" data-toggle="modal"
                                                    data-target="#modal-default">Logout</button>
                                            </div>
                                            <form action="{{ route('logoutOtherDevices') }}" method="POST">
                                                @csrf
                                                <div class="modal fade" id="modal-default">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Logout Other Devices</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @error('current_password')
                                                                    <div class="text-danger">{{ $message }}</div><br>
                                                                @enderror
                                                                <input type="password" name="current_password"
                                                                    class="form-control"
                                                                    placeholder="Enter Your Current Password">
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <p></p>
                                                                <button type="submit" class="btn btn-dark">
                                                                    Logout</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </form>
                                            <!-- /.modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</x-admin-layout>
