<?php
$noone = [];
$solo = ['Janis Joplin'];
$duo = ['Simon', 'Garfunkel'];
$threesome = ['Peter', 'Paul', 'Mary'];
$fab_four = ['John', 'Paul', 'George', 'Ringo'];
$too_many = ['Dave Dee', 'Dozy', 'Beaky', 'Mick', 'Tich'];

function with_commas(array $array, $max = 4) {
    switch (count($array)) {
        case 0:
            return '';
        case 1:
            return array_pop($array);
        case 2:
            return implode(' and ', $array);
        case $max + 1:
            return implode(', ', array_slice($array, 0, $max)) . ' and one other';
        case count($array) > $max + 1:
            return implode(', ', array_slice($array, 0, $max)) . ' and others';
        default:
            $last = array_pop($array);
            return implode(', ', $array) . " and $last";
    }
}
echo with_commas($too_many, 3);