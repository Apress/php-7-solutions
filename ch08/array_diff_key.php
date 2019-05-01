<?php
$first = [
    'PHP' => 'Rasmus Lerdorf',
    'JavaScript' => 'Brendan Eich',
    'R' => 'Robert Gentleman'];
$second = [
    'Java' => 'James Gosling',
    'R' => 'Ross Ihaka',
    'Python' => 'Guido van Rossum'];
/*
 * array_diff_key() checks only the keys, ignoring the values.
 * As a result, this returns the first two elements of the first
 * array, but not the third because R exists as a key in the
 * second array. The fact that the values assigned to R are
 * different is irrelevant.
 */
$diff = array_diff_key($first, $second);
echo '<pre>';
print_r($diff);
echo '</pre>';