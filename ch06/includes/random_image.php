<?php
$images = [
    ['file'    => 'kinkakuji',
     'caption' => 'The Golden Pavilion in Kyoto'],
    ['file'    => 'maiko',
     'caption' => 'Maiko&mdash;trainee geishas in Kyoto'],
    ['file'    => 'maiko_phone',
     'caption' => 'Every maiko should have one&mdash;a mobile, of course'],
    ['file'    => 'monk',
     'caption' => 'Monk begging for alms in Kyoto'],
    ['file'    => 'fountains',
     'caption' => 'Fountains in central Tokyo'],
    ['file'    => 'ryoanji',
     'caption' => 'Autumn leaves at Ryoanji temple, Kyoto'],
    ['file'    => 'menu',
     'caption' => 'Menu outside restaurant in Pontocho, Kyoto'],
    ['file'    => 'basin',
     'caption' => 'Water basin at Ryoanji temple, Kyoto']
];
$i = rand(0, count($images)-1);
$selectedImage = "images/{$images[$i]['file']}.jpg";
$caption = $images[$i]['caption'];
if (file_exists($selectedImage) && is_readable($selectedImage)) {
    $imageSize = getimagesize($selectedImage);
}
