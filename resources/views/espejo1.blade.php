{{-- <!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Grupo Brica'])
@show

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    Proximamente web Grupo Brica <br>
    <a href="/intranet" class="btn btn-default">
        Ir a la Intranet &nbsp;
        <i class="fa fa-forward" aria-hidden="true"></i>
    </a>
  </div>

</div>

</body>
</html> --}}
<?

function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

$scraped_website = curl("https://carroceriashercules.emdew.com/");

echo $scraped_website;
?>
