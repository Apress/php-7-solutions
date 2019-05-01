<?php
$first = ['PHP', 'JavaScript', 'R'];
$second = ['Java', 'R', 'Python', 'PHP'];
/*
 * array_intersect() checks only for matching values,
 * ignoring the array keys. As a result, this returns
 * an array containing both PHP and R, even though
 * they're in different positions - and consequently
 * have different indices - in each array.
 */
$common = array_intersect($first, $second);
echo '<pre>';
print_r($common);
echo '</pre>';