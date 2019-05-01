<?php
$first = ['PHP' => 'Rasmus Lerdorf', 'JavaScript' => 'Brendan Eich', 'R' => 'Robert Gentleman'];
$second = ['Java' => 'James Gosling', 'R' => 'Ross Ihaka', 'Python' => 'Guido van Rossum'];
/*
 * array_intersect_key() checks only for matching keys.
 * As a result, Robert Gentleman is returned from the
 * first array, even though the value of R is different
 * in the second array.
 */
$common = array_intersect_key($first, $second);
echo '<pre>';
print_r($common);
echo '</pre>';