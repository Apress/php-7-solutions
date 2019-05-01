<?php
$book = [
    'author' => 'David Powers',
    'title' => 'PHP 7 Solutions'
];
$descriptions = ['British', 'the fourth edition'];
$label = ['Description'];
$modified = array_map('modify', $book, $descriptions, $label);
function modify($val, $description, $label) {
    return "$label: $val is $description.";
}
echo '<pre>';
print_r($book);
print_r($modified);
echo '</pre>';