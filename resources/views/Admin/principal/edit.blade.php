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
                                <li class="breadcrumb-item active">Update Principal Desk</li>
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
                                    <h4 class="card-title">School Principal Desk Update</h4>
                                </div>
                                <div class="card-body">
                                    <x-jet-validation-errors class="mb-4" />
                                    <form action="{{ URL::to('admin/principal/update/' . $principal->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Principal Name</label>
                                                <input type="text" name="name" id="" class="form-control"
                                                    value="{{ $principal->name }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Principal Designation</label>
                                                <input type="text" class="form-control" name="designation"
                                                    value="{{ $principal->designation }}">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Principal Image</label>
                                                <div class="custom-file">
                                                    <input type="hidden" name="old_image" value="{{ $principal->image }}">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile" name="image"
                                                    value="{{ $principal->image }}">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea name="body" id="summernote">{{ $principal->body }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group clearfix">
                                                    <div class="icheck-success d-inline">
                                                        <input type="checkbox" id="checkboxSuccess1" name="status"
                                                        value="1" @if ($principal->status == 1) {{ 'checked' }} @endif>
                                                        <label for="checkboxSuccess1">
                                                        </label>
                                                        <label class="form-check-label">Publish Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
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
