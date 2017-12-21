<?php

use Jenssegers\Date\Date;

function usesas($ctrl, $fun, $as = null)
{
    if ($as) {
        return ['uses' => "$ctrl@$fun", 'as' => $as];
    }
    return ['uses' => "$ctrl@$fun", 'as' => $fun];
}

function fdate($unformatted, $format)
{
    $date = Date::createFromFormat('Y-m-d H:i:s', $unformatted);
    return $date->format($format);
}
