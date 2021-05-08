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
                                <li class="breadcrumb-item active">Update Role</li>
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
                                    <h4 class="card-title">Input Addon</h4>
                                </div>
                                <div class="card-body">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ URL::to('admin/role/update/'.$role->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Role Name</label>
                                                    <input type="text" id="name" name="role" class="form-control"
                                                        value="{{ $role->role }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Permission</label>
                                                    <div class="select2-purple">
                                                        <select name="permission[]" class="select2" multiple="multiple"
                                                            data-placeholder="Select a Permission"
                                                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                            @forelse ($permission as $permission)
                                                                <option value="{{ $permission->id }}">
                                                                    {{ $permission->permission }}</option>
                                                            @empty
                                                                no data found
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <input class="btn btn-info" type="submit" value="Save">
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
