<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/{{ $long }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{ $short }}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ ucfirst($long) }}</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>

        @if (Auth::user()->level == 2)
            @php
                $toNotify = App\Quotation::where('type', 'produccion')
                    ->where('status', 'finalizado')
                    ->where('notified', 0)
                    ->where('client', '!=', 1)
                    ->count();
            @endphp
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-danger">{{ $toNotify}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">{{ $toNotify}} trabajos finalizados</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-phone text-aqua"></i> Notifica a los clientes
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
    </nav>
</header>
