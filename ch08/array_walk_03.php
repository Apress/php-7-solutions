<?php
$book = [
    'author' => 'David Powers',
    'title' => 'PHP 7 Solutions'
];
array_walk($book, 'output');
function output (&$val) {
    return $val = strtoupper($val);
}
echo '<pre>';
print_r($book);
echo '</pre>';