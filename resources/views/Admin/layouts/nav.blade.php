<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="dropdown user user-menu mt-2 mr-2">
            <a href="#" data-toggle="dropdown">
               
                <span class="hidden-xs" style="color: rgb(71, 71, 71)">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="img-circle" alt="User Image">

                    <p>
                        {{ Auth::user()->name }}
                        <small>{{ Auth::user()->created_at->diffForHumans() }}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="float-left">
                        @can('isAdmin')
                        <a href="{{route('admin.profile.show')}}" class="btn btn-info rounded-circle"><i class="fas fa-user-circle"></i></a>
                        @endcan
                        @can('isTeacher')
                        <a href="{{route('admin.profile.show')}}" class="btn btn-info rounded-circle"><i class="fas fa-user-circle"></i></a>
                        @endcan
                        @can('isStudent')
                        <a href="{{route('admin.profile.show')}}" class="btn btn-info rounded-circle"><i class="fas fa-user-circle"></i></a>
                        @endcan
                    </div>
                    <div class="float-right">
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                     this.closest('form').submit();" class="btn btn-danger rounded-circle"><i class="fas fa-sign-out-alt"></i></a>
                        </form>
                    </div>
                </li>
            </ul>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if (Auth::user()->unreadnotifications->count())
                <span class="badge badge-warning navbar-badge">{{ Auth::user()->unreadnotifications->count() }}</span>
                @endif
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @if (Auth::user()->unreadnotifications->count())
                <span class="dropdown-item dropdown-header">{{ Auth::user()->unreadnotifications->count() }}
                    Notifications</span>
                @endif
                <div class="dropdown-divider"></div>
                @forelse (Auth::user()->unreadNotifications as $notify)
                    <a style="background-color: rgb(229, 234, 236)" href=""
                        class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{ $notify->data['data'] }}
                        <span
                            class="float-right text-muted text-sm">{{ $notify->created_at->diffForHumans() }}</span>
                    </a>
                @empty

                @endforelse
                @forelse (Auth::user()->readNotifications as $notify)
                    <a href="" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{ $notify->data['data'] }}
                    </a>
                @empty

                @endforelse
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
