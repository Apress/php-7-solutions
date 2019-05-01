<?php
$first = ['PHP', 'JavaScript', 'R'];
$second = ['Java', 'R', 'Python', 'PHP'];
/*
 * array_diff() checks only the values, not the keys
 * (indices). As a result, this returns JavaScript
 * because it's the only value in the first array
 * that's not present in the second one.
 */
$diff = array_diff($first, $second);
echo '<pre>';
print_r($diff);
echo '</pre>';