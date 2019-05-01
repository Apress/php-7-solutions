<?php
$first = ['php' => 'Rasmus Lerdorf', 'JavaScript' => 'Brendan Eich', 'R' => 'Robert Gentleman'];
$second = ['Java' => 'James Gosling', 'Python' => 'Guido van Rossum', 'PHP' => 'Rasmus Lerdorf'];
/*
 * array_intersect_assoc() checks both key and value.
 * Although Rasmus Lerdorf appears in both arrays,
 * this returns an empty array because the keys don't
 * match (the first is lowercase, whereas the second is
 * uppercase).
 */
$common = array_intersect_assoc($first, $second);
echo '<pre>';
print_r($common);
echo '</pre>';