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
                                <li class="breadcrumb-item active">School Principal Desk</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <style>
                table {
                    border-collapse: collapse;
                    table-layout: fixed;
                    width: 310px;
                }

                table td {
                    border: solid 1px #fab;
                    width: 100px;
                    word-wrap: break-word;
                }

            </style>
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
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.n. </th>
                                                <th> Image </th>
                                                <th> Name </th>
                                                <th> Designation </th>
                                                <th>Message</th>
                                                <th> Created_at </th>
                                                <th> Updated_at </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @if (is_null($principal))
                                                    null
                                                @else
                                                    <td>1</td>
                                                    <td>
                                                        <img style="width: 40px; height:40px"
                                                            src="{{ asset($principal->image) }}" alt="">
                                                    </td>
                                                    <td>{{ $principal->name }}</td>
                                                    <td>{{ $principal->designation }}</td>
                                                    <td style="width: 10px;">
                                                        <div class="dummy">
                                                            <p style="width: 20px;">
                                                                {!! $principal->body !!}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>{{ $principal->created_at->diffForHumans() }}</td>
                                                    <td>{{ $principal->updated_at->diffForHumans() }}</td>
                                                    <td>

                                                        <a style="color: white" class="btn btn-warning rounded-circle btn-sm"
                                                            href="{{ URL::to('admin/principal/edit/' . $principal->id) }}"><i
                                                                class="fas fa-edit"></i>
                                                        </a>

                                                        @if ($principal->status == 1)

                                                            <a class="btn btn-info rounded-circle btn-sm"
                                                                href="{{ URL::to('admin/principal/unpublish/' . $principal->id) }}"><i
                                                                    class="fas fa-thumbs-up"></i>
                                                            </a>
                                                            </button>
                                                        @else

                                                            <a class="btn btn-info rounded-circle btn-sm"
                                                                href="{{ URL::to('admin/principal/publish/' . $principal->id) }}"><i
                                                                    class="fas fa-thumbs-down"></i>
                                                            </a>

                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
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
