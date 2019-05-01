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
 * array_diff_assoc() checks both keys and values,
 * returning an array of elements that exist in the
 * first array, but not in others. In this example,
 * all three elements in the first array are returned,
 * even though both arrays contain R as a key. This is
 * because the values assigned to R are different.
 */
$diff = array_diff_assoc($first, $second);
echo '<pre>';
print_r($diff);
echo '</pre>';