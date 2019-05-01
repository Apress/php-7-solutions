<?php
$first = [
    'php' => 'Rasmus Lerdorf',
    'JavaScript' => 'Brendan Eich',
    'R' => 'Robert Gentleman'];
$second = [
    'Java' => 'James Gosling',
    'Python' => 'Guido van Rossum',
    'PHP' => 'Rasmus Lerdorf'];
/*
 * array_intersect_uassoc() checks both keys and values, and
 * uses a callback function to compare the keys. The callback
 * supplied here is strcasecmp() which makes a case-insensitive
 * comparison, returning 0 if both strings are equal. As a
 * result, this example returns Rasmus Lerdorf from the first
 * array, even though the keys don't use matching cases.
 */
$common = array_intersect_uassoc($first, $second, 'strcasecmp');
echo '<pre>';
print_r($common);
echo '</pre>';