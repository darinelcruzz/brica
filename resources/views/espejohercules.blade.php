<?
$idseccion = request('idseccion');


if ($idseccion!='') {
	$urlmuestra='https://carroceriashercules.emdew.com/carroceriahercules/' . $idseccion;
}
if ($idseccion=='') {
	$urlmuestra='https://carroceriashercules.emdew.com/carroceriahercules/';
}
function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

$scraped_website = curl($urlmuestra);

echo $scraped_website;
?>
