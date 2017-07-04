<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        @if (Auth::check())
            @if (Auth::user()->level > 4)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/five')])
            @elseif (Auth::user()->level > 3)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/four')])
            @elseif (Auth::user()->level > 2)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/three')])
            @elseif (Auth::user()->level > 1)
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/two')])
            @else
                @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/one')])
            @endif
        @else
            @include('adminlte::layouts.partials.menu_items', ['items' => trans('menus/one')])
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
