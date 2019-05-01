<?php
$book = [
    'Author' => 'David Powers',
    'Title' => 'PHP 7 Solutions'
];
$book = array_change_key_case($book);
echo '<pre>';
print_r($book);
echo '</pre>';