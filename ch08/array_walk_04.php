<?php
$book = [
    'author' => 'David Powers',
    'title' => 'PHP 7 Solutions'
];
array_walk($book, 'output', 'is');
function output (&$val, $key, $verb) {
    return $val = "The $key of this book $verb $val.";
}
echo '<pre>';
print_r($book);
echo '</pre>';