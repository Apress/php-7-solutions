<?php
// https://data.sfgov.org/api/views/yitu-d5am/rows.json?accessType=DOWNLOAD
$json = file_get_contents('./data/film_locations.json');
$data = json_decode($json, true);
$col_names = array_column($data['meta']['view']['columns'], 'name');
$locations = [];
foreach ($data['data'] as $datum) {
    $locations[] = array_combine($col_names, $datum);
}

$search = 'Alcatraz';
$getLocation = function ($location) use ($search) {
    return (stripos($location['Locations'], $search) !== false);
};
$filtered = array_filter($locations, $getLocation);
echo '<ul>';
foreach ($filtered as $item) {
    echo "<li>{$item['Title']} ({$item['Release Year']}) filmed at {$item['Locations']}</li>";
}
echo '</ul>';
