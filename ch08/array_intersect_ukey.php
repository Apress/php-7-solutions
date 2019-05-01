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
 * array_intersect_ukey() checks only for matching keys,
 * using a callback function to compare them. The callback
 * supplied here is strcasecmp() which makes a case-insensitive
 * comparison, returning 0 if both strings are equal. As a
 * result, this example returns Robert Gentleman from the first
 * array, even though R is uppercase in the first array and
 * lowercase in the second.
 */
$common = array_intersect_ukey($first, $second, 'strcasecmp');
echo '<pre>';
print_r($common);
echo '</pre>';

