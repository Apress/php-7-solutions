<?php
$numbers = [2, 4, 7];
$doubled = array_map(function ($num) {
    return $num * 2;
}, $numbers);
echo '<pre>';
print_r($numbers);
print_r($doubled);
echo '</pre>';