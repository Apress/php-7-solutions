<?php
// generator that yields each line of a CSV file as an array
function csv_processor($csv_file) {
    if (@!$file = fopen($csv_file, 'r')) {
        echo "Can't open $csv_file.";
        return;
    }
    while (($data = fgetcsv($file)) !== false) {
        yield $data;
    }
    fclose($file);
}