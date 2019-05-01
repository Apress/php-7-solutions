<?php
$numbers = [2, 4, 7];
foreach ($numbers as &$number) {
    $number *= 2;
}
unset($number);
echo '<pre>';
print_r($numbers);
echo '</pre>';