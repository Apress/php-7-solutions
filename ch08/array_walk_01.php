<?php
$numbers = [2, 4, 7];
array_walk($numbers, function (&$val) {
    return $val *= 2;
});
echo '<pre>';
print_r($numbers);
echo '</pre>';