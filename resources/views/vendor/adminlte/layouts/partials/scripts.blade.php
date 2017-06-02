<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- Select2 -->
<script src="{{ asset('/plugins/select2.full.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/dataTables.bootstrap.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>

<script>
$(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    // Data Table With Full Features
    $("#example1").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example2").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example3").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example4").DataTable({
      "order":[[ 0 , "desc"]]
    });
});
</script>
