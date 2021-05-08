<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        {{-- <img src="Admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @can('isAdmin')
                    <li
                        class="nav-item {{ Route::is('permission.edit', 'permission.create', 'permission', 'role', 'users', 'user.create', 'user.edit', 'role.edit', 'role.create') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('permission.edit', 'permission.create', 'permission', 'users', 'user.create', 'user.edit', 'role', 'role.create') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users') }}"
                                    class="nav-link {{ Route::is('users', 'user.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('role') }}"
                                    class="nav-link {{ Route::is('role', 'role.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permission') }}"
                                    class="nav-link {{ Route::is('permission', 'permission.edit', 'permission.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="nav-item {{ Route::is('logo.edit', 'logo', 'topbar', 'vision', 'mission', 'slider', 'principal', 'annauncement', 'topbar.edit', 'slider.create', 'annauncement.add', 'annauncement.edit', 'slider.edit', 'mission.edit', 'vision.edit', 'principal.edit') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Route::is('logo.edit', 'logo', 'topbar', 'vision', 'mission', 'slider', 'principal', 'annauncement', 'topbar.edit', 'slider.create', 'annauncement.add', 'annauncement.edit', 'slider.edit', 'mission.edit', 'vision.edit', 'principal.edit') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                School Portal
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('topbar') }}"
                                    class="nav-link {{ Route::is('topbar', 'topbar.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Topbar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logo') }}"
                                    class="nav-link {{ Route::is('logo', 'logo.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('slider') }}"
                                    class="nav-link {{ Route::is('slider', 'slider.add', 'slider.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('annauncement') }}"
                                    class="nav-link {{ Route::is('annauncement', 'annauncement.add', 'annauncement.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Annauncement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mission') }}"
                                    class="nav-link {{ Route::is('mission', 'mission.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mission</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('vision') }}"
                                    class="nav-link {{ Route::is('vision', 'vision.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Vision</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('principal') }}"
                                    class="nav-link {{ Route::is('principal', 'principal.edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Principal Desk</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endcan
                @can('isTeacher')

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Students Information
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Students</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endcan

                @can('isStudent')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Students Section
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marks</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endcan

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
