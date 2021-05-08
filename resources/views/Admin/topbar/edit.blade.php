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
                                <li class="breadcrumb-item active">School Web Topbar Update</li>
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
                                    <h4 class="card-title">School Topbar Update</h4>
                                </div>
                                <div class="card-body">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ url('admin/topbar/update/' . $topbar->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <i class="fab fa-facebook"></i>&nbsp;<label for="">Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook"
                                                    placeholder="Facebook link" value="{{ $topbar->facebook }}">
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fab fa-twitter"></i>&nbsp;<label for="">Twitter Link</label>
                                                <input type="text" class="form-control" name="twitter"
                                                    placeholder="Twitter link" value="{{ $topbar->twitter }}">
                                            </div>
                                            <div class="col-md-4">
                                                <i class="fab fa-youtube"></i> &nbsp;<label for="">YouTube Link</label>
                                                <input type="text" class="form-control" name="youtube"
                                                    placeholder="Youtube link" value="{{ $topbar->youtube }}">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="fas fa-envelope"></i>&nbsp;<label for="">Email</label>
                                                <input type="text" name="email" id="" class="form-control"
                                                    placeholder="Email" value="{{ $topbar->email }}">
                                            </div>
                                            <div class="col-md-6">
                                                <i class="fas fa-phone-square-alt"></i> &nbsp;<label
                                                    for="">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone"
                                                    value="{{ $topbar->phone }}">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                           <div class="col-md-12">
                                               <div class="float-right">
                                                <button type="submit"
                                                class="btn btn-info">Submit</button>
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
