<?php
$first = [
    'PHP' => 'Rasmus Lerdorf',
    'JavaScript' => 'Brendan Eich',
    'R' => 'Robert Gentleman'];
$second = [
    'java' => 'James Gosling',
    'r' => 'Ross Ihaka',
    'python' => 'Guido van Rossum'];
/*
 * array_diff_ukey() checks only the keys, ignoring the values;
 * and it uses a callback function to compare the keys. The callback
 * supplied here is strcasecmp() which makes a case-insensitive
 * comparison, returning 0 if both strings are equal. As a result,
 *  this returns the first two elements of the first array, but not
 * the third because lowercase R exists as a key in the second array.
 * The fact  that the values assigned to R are different is irrelevant.
 */
$diff = array_diff_ukey($first, $second, 'strcasecmp');
echo '<pre>';
print_r($diff);
echo '</pre>';