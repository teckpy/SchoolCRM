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
                                    <h4 class="card-title">School Mission</h4>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.N. </th>
                                                <th> Body </th>
                                                <th> Created_at </th>
                                                <th> Updated_at </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mission as $mission)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>

                                                    <td>{!! $mission->body !!}</td>
                                                    <td>{{ $mission->created_at->diffForHumans() }}</td>
                                                    <td>{{ $mission->updated_at->diffForHumans() }}</td>
                                                    <td>

                                                        <a style="color: white" class="btn btn-warning rounded-circle btn-sm"
                                                            href="{{ URL::to('admin/mission/edit/' . $mission->id) }}"><i
                                                                class="fas fa-edit"></i>
                                                        </a>

                                                        @if ($mission->status == 1)

                                                            <a class="btn btn-info rounded-circle btn-sm"
                                                                href="{{ URL::to('admin/mission/unpublish/' . $mission->id) }}"><i
                                                                    class="fas fa-thumbs-up"></i>
                                                            </a>

                                                        @else

                                                            <a class="btn btn-info rounded-circle btn-sm"
                                                                href="{{ URL::to('admin/mission/publish/' . $mission->id) }}"><i
                                                                    class="fas fa-thumbs-down"></i>
                                                            </a>

                                                        @endif

                                                        <a class=" btn btn-danger rounded-circle btn-sm"
                                                            href="{{ url('admin/mission/delete/' . $mission->id) }}"><i
                                                                class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
