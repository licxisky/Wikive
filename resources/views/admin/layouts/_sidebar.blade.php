<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="查找...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">后台菜单</li>
            <li class="@if(startWith(Request::route()->getName(), 'admin.projects')) active @endif">
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa fa-edit"></i>
                    <span>项目管理</span>
                </a>
            </li>
            <li class="@if(startWith(Request::route()->getName(), 'admin.users')) active @endif">
                <a href="{{ route('admin.projects.index') }}">
                    <i class="fa fa-edit"></i>
                    <span>用户管理</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>