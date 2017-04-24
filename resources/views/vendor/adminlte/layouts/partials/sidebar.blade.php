<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('menu.main.entries.title') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('entries.create') }}">{{ trans('menu.main.entries.create.title') }}</a></li>
                    <li><a href="{{ route('entries.show') }}">{{ trans('menu.main.entries.show.title') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('menu.main.orders.title') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('order.create') }}">{{ trans('menu.main.orders.create.title') }}</a></li>
                    <li><a href="{{ route('order.show') }}">{{ trans('menu.main.orders.show.title') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
