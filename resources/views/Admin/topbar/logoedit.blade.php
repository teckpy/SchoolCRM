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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
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
                                    <h4 class="card-title">School Logo Update</h4>
                                </div>
                                <div class="card-body">

                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ URL::to('admin/logo/update/' . $logo->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Logo image</label>
                                                <input type="hidden" name="old_image" value="{{ $logo->logo }}">
                                                <input type="file" class="form-control" name="image"
                                                    value="{{ $logo->logo }}">
                                            </div>
                                        </div><br>
                                        <hr>
                                        <div class="row">
                                            <button type="submit"
                                                class="btn btn-info ml-4">Submit</button>
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
