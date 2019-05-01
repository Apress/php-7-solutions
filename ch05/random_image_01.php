<?php
$images = ['kinkakuji', 'maiko', 'maiko_phone', 'monk', 'fountains', 'ryoanji', 'menu', 'basin'];
$i = random_int(0, count($images)-1);
$selectedImage = "images/{$images[$i]}.jpg";