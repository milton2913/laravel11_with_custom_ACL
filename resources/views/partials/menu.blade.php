
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ url('/dashboard') }}" class="brand-link">
            <img src="{{ url('template/AdminLTE/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Laravel Admin-11</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="./index.html" class="nav-link"><i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v1</p>
                            </a> </li>
                        <li class="nav-item"> <a href="./index2.html" class="nav-link active"> <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v2</p>
                            </a> </li>
                        <li class="nav-item"> <a href="./index3.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                <p>Dashboard v3</p>
                            </a> </li>
                    </ul>
                </li>


                @can('user_management_access')
                    <li class="nav-item {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                    <a class="nav-link {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                        <i class="bi-people"></i>
                        <p>
                            {{ trans('cruds.userManagement.title') }}
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>
                                        {{ trans('cruds.permission.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>
                                        {{ trans('cruds.role.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>
                                        {{ trans('cruds.user.title') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                    </li>
                @endcan







                {{--                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>--}}
                {{--                        <p>Level 1</p>--}}
                {{--                    </a> </li>--}}
                {{--                <li class="nav-header">LABELS</li>--}}
                {{--                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-danger"></i>--}}
                {{--                        <p class="text">Important</p>--}}
                {{--                    </a> </li>--}}
                {{--                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-warning"></i>--}}
                {{--                        <p>Warning</p>--}}
                {{--                    </a> </li>--}}
                {{--                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-info"></i>--}}
                {{--                        <p>Informational</p>--}}
                {{--                    </a> </li>--}}



            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->

