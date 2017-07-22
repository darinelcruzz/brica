<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        @if (Auth::check())
            @if (Auth::user()->level > 4)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/' . $site . 'five')])
            @elseif (Auth::user()->level > 3)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/' . $site . 'four')])
            @elseif (Auth::user()->level > 2)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/' . $site . 'three')])
            @elseif (Auth::user()->level > 1)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/' . $site . 'two')])
            @else
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/' . $site . 'one')])
            @endif
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
