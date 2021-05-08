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
                                <li class="breadcrumb-item active">Notifications</li>
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
                                    <h3 class="card-title">Notifications</h3>
                                </div>
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.n. </th>
                                                <th> Notification </th>
                                                <th> Read </th>
                                                <th> Created_at </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse (Auth::user()->Notifications as $notification)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $notification->data['data'] }}</td>
                                                    <td>{{ $notification->read_at }}</td>
                                                    <td>{{ $notification->created_at }}</td>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm rounded-circle"
                                                            href=""><i style="color: white"
                                                                class="fas fa-edit"></i>
                                                        </a>
                                                        
                                                        <button class="btn btn-danger btn-sm rounded-circle"><i class="far fa-trash-alt"></i> </button>
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
