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
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">User Permission</li>
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
                                    <h4 class="card-title">User Permission</h4>
                                    <div class="float-right">
                                        <a class="btn btn-info rounded-circle" href="{{ route('permission.create') }}"><i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.n. </th>
                                                <th>Permission's</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($permission as $permission)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-success text-white">{{ $permission->permission }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a style="color: white" class="btn btn-warning btn-sm rounded-circle" href="{{ URL::to('admin/permission/edit/'.$permission->id) }}"><i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-sm rounded-circle" href="{{ URL::to('admin/permission/delete/'.$permission->id) }}"><i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                no data found
                                            @endforelse
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
