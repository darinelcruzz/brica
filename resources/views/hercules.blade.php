<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Hercules'])
@show

<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader', ['short' => 'H', 'long' => 'hercules'])

    @include('adminlte::layouts.partials.sidebar', ['site' => 'hercules/'])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>
