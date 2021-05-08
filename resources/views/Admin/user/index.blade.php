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
                                <li class="breadcrumb-item active">Users</li>
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
                                    <h3 class="card-title">All User</h3>
                                    <div class="float-right">
                                        <a class="btn btn-info rounded-circle" href="{{ route('user.create') }}"> <i
                                                class="fas fa-plus"></i></a>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.n. </th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Role</th>
                                                <th> Status</th>
                                                <th style="width: 15%"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user as $user)
                                                <tr>

                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    

                                                    <td>
                                                        @forelse ($user->roles as $item)

                                                            <span
                                                                class="badge rounded-pill bg-success text-white">{{ $item->role }}
                                                            </span>
                                                        @empty

                                                        @endforelse
                                                    </td>

                                                    <td>
                                                        @if ($user->approved_at)
                                                            <span
                                                                class="badge rounded-pill bg-success text-white">Active</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill bg-danger text-white">inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-warning btn-sm rounded-circle" href="{{ URL::to('admin/user/edit/'.$user->id) }}">
                                                            <i style="color: white" class="fas fa-edit">
                                                            </i>
                                                        </a>
                                                        @if ($user->approved_at)

                                                            <a class="btn btn-info btn-sm rounded-circle"
                                                                href="{{ URL::to('admin/users/inactive/' . $user->id) }}">
                                                                <i class="fas fa-thumbs-up"></i>
                                                            </a>
                                                        @else

                                                            <a class="btn btn-danger btn-sm rounded-circle"
                                                                href="{{ URL::to('admin/users/active/' . $user->id) }}"><i
                                                                    class="fas fa-thumbs-down"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ URL::to('admin/user/softdelete/' . $user->id) }}"
                                                            class="btn btn-danger btn-sm rounded-circle"><i
                                                                class="far fa-trash-alt">
                                                            </i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Suspended User</h3>
                                </div>
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th> S.n. </th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                

                                                <th> Role</th>
                                                
                                                <th> Status</th>
                                                <th style="width: 15%"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tr as $users)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $users->name }}</td>
                                                    <td>{{ $users->email }}</td>
                                                

                                                    <td>
                                                        @forelse ($users->roles as $role)

                                                            <span
                                                                class="badge rounded-pill bg-success text-white">{{ $role->role }}
                                                            </span>
                                                        @empty

                                                        @endforelse

                                                    </td>
                                                    
                                                    <td>
                                                        @if ($users->deleted_at)
                                                            <span
                                                                class="badge rounded-pill bg-warning text-white">trashed</span>
                                                        @else

                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a style="color:white"
                                                            class="btn btn-warning btn-sm rounded-circle"
                                                            href="{{ URL::to('admin/user/undo/' . $users->id) }}">
                                                            <i class="fas fa-undo"></i>
                                                        </a>
                                                        &nbsp;
                                                        <a href="{{ URL::to('admin/user/fdelete/' . $users->id) }}"
                                                            class="btn btn-danger btn-sm rounded-circle">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
</x-admin-layout>
