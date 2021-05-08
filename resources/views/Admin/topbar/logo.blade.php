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
                                    <h4 class="card-title">School Logo</h4>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.N. </th>
                                                <th>Logo </th>
                                                <th>Created_at</th>
                                                <th>Updated_at</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    @if (is_null($logo))
                                                        null
                                                    @else
                                                        1
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($logo))
                                                        null
                                                    @else
                                                        <img style="width: 40px; height:40px" src="{{ asset($logo->image) }}" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($logo))
                                                        null
                                                    @else
                                                        {{ $logo->created_at }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($logo))
                                                        null
                                                    @else
                                                        {{ $logo->updated_at }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (is_null($logo))
                                                        null
                                                    @else

                                                        <a style="color: white" class="btn btn-warning rounded-circle btn-sm"
                                                            href="{{ URL::to('admin/logo/edit/' . $logo->id) }}"><i
                                                                class="fas fa-edit"></i>
                                                        </a>


                                                        <a class="btn btn-info rounded-circle btn-sm" href=""><i
                                                                class="fas fa-eye"></i>
                                                        </a>

                                                    @endif
                                                </td>
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
