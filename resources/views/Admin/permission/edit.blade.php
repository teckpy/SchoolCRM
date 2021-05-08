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
                  <li class="breadcrumb-item active">Update Permission</li>
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
                    <h4 class="card-title">User permission Update</h4>
                  </div>
                  <div class="card-body">
                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ URL::to('admin/permission/update/'.$permission->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Permission Name</label>
                                                    <input type="text" id="name" name="permission" class="form-control"
                                                        value="{{ $permission->permission }}">
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