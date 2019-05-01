<?php
$first = [
    'PHP' => 'Rasmus Lerdorf',
    'JavaScript' => 'Brendan Eich',
    'R' => 'Robert Gentleman'];
$second = [
    'java' => 'James Gosling',
    'r' => 'Ross Ihaka',
    'php' => 'Rasmus Lerdorf'];
/*
 * array_diff_uassoc() checks both keys and values,
 * using a callback function to compare the keys.
 * The callback supplied here is strcasecmp() which
 * makes a case-insensitive comparison, returning 0
 * if both strings are equal. This returns the last
 * two elements in the first array. Although R exists
 * as a key (both uppercase and lowercase) in both
 * arrays, the values are different, so it's
 * included in the result.
 */
$diff = array_diff_uassoc($first, $second, 'strcasecmp');
echo '<pre>';
print_r($diff);
echo '</pre>';