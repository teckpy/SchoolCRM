<x-admin-layout>
    <div>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">New User</li>
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
                            <div class="card card-info">
                                <div class="card-header">
                                    <h4 class="card-title">New User</h4>
                                </div>
                                <div class="card-body">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ route('user.Store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">User Name</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" name="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Confirm Password</label>
                                                    <input type="password" id="password" name="password_confirmation"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <div class="select2-purple">
                                                        <select name="role" class="form-control select2bs4"
                                                            data-placeholder="Select a Role"
                                                            data-dropdown-css-class="select2-purple"
                                                            style="width: 100%;">
                                                            <option value="" selected disabled>Please Select Role</option>
                                                            @forelse ($role as $role)
                                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                                            @empty
                                                                no data found
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                           
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" id="checkboxSuccess1" name="status"
                                                            value="1">
                                                        <label for="checkboxSuccess1">
                                                        </label>
                                                        <label class="form-check-label">Approve</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                           <div class="col-md-12">
                                               <div class="float-right">
                                                   <button class="btn btn-info">Submit</button>
                                               </div>
                                           </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</x-admin-layout>
