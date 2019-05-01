<?php
require_once './csv_processor.php';

function display_temp($city, $temp) {
    $tempF = round($temp/5*9+32);
    return "$city: $temp&deg;C ($tempF&deg;F)";
}

$cities = csv_processor('./data/weather.csv');
$cities->next();
while ($cities->valid()) {
    echo display_temp(...$cities->current()) . '<br>';
    $cities->next();
}