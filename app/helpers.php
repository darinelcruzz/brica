<?php

use Jenssegers\Date\Date;


function printPublic($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($original_date, $format = 'Y-m-d', $original_format = 'Y-m-d H:i:s')
{
	if ($original_date) {
		$date = Date::createFromFormat($original_format, $original_date);
    	return $date->format($format);
	}

	return '-';
}

function drawHeader(...$titles)
{
    echo "<template slot=\"header\"><tr>";
    foreach ($titles as $title) {
        echo "<th>" . ucfirst($title) . "</th>";
    }
    echo "</tr></template>";
}
