<?php
$images = ['image10.jpg', 'image9.jpg', 'image2.jpg'];
sort($images);
echo '<pre>';
echo 'sort(): ';
print_r($images);
natsort($images);
echo 'natsort(): ';
print_r($images);
echo '</pre>';