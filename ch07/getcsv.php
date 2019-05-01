<?php
$file = fopen('C:/private/weather.csv', 'r');
$titles = fgetcsv($file);
while (!feof($file)) {
    $data = fgetcsv($file);
    if (empty($data[0])) {
        continue;
    }
    $cities[] = array_combine($titles, $data);
}
fclose($file);
echo '<pre>';
print_r($cities);
echo '</pre>';