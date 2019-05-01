<?php
// https://data.sfgov.org/api/views/yitu-d5am/rows.json?accessType=DOWNLOAD
$json = file_get_contents('./data/film_locations.json');
$data = json_decode($json, true);
$col_names = array_column($data['meta']['view']['columns'], 'name');

print_r($col_names);
