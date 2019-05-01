<?php
$first = ['PHP', 'JavaScript', 'R'];
$second = ['Java', 'R', 'Python', 'PHP'];
$languages = array_merge($first, $second);
echo '<pre>';
print_r($languages);
echo '</pre>';