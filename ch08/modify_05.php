<?php
$book = [
    'author' => 'David Powers',
    'title' => 'PHP 7 Solutions'
];
foreach ($book as $key => $value) {
    $book[ucfirst($key)] = $value;
    unset($book[$key]);
}
unset($value);
echo '<pre>';
print_r($book);
echo '</pre>';