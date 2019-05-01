<?php
$book = [
    'author' => 'David Powers',
    'title' => 'PHP 7 Solutions'
];
$modified = array_map('modify', $book);
function modify($val) {
    return strtoupper($val);
}
echo '<pre>';
print_r($book);
print_r($modified);
echo '</pre>';