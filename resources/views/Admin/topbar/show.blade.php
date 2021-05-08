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
                                <li class="breadcrumb-item active">School Web Topbar</li>
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
                                    <h4 class="card-title">School Topbar</h4>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.N. </th>
                                                <th> Email </th>
                                                <th> Phone </th>
                                                <th> Facebook </th>
                                                <th> Twitter </th>
                                                <th> Youtube </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($topbar as $topbar)
                                                    <td>
                                                        1
                                                    </td>
                                                    <td> {{ $topbar->email }}</td>
                                                    <td>
                                                        {{ $topbar->phone }}
                                                    </td>
                                                    <td> {{ $topbar->facebook }}</td>
                                                    <td> {{ $topbar->twitter }}</td>
                                                    <td> {{ $topbar->youtube }} </td>
                                                    <td>
                                                        <a style="color: white" class="btn btn-warning rounded-circle btn-sm"
                                                            href="{{ url('admin/topbar/edit/' . $topbar->id) }}"><i
                                                                class="fas fa-edit"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a class="btn btn-success rounded-circle btn-sm" href=""><i
                                                                class="fas fa-eye"></i>
                                                        </a>
                                                        </button>
                                                    </td>
                                                @endforeach
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
