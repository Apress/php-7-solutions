<?php
$playlist = [
    ['artist' => 'Jethro Tull', 'track' => 'Locomotive Breath'],
    ['artist' => 'Dire Straits', 'track' => 'Telegraph Road'],
    ['artist' => 'Mumford and Sons', 'track' => 'Broad-Shouldered Beasts'],
    ['artist' => 'Ed Sheeran', 'track' => 'Nancy Mulligan'],
    ['artist' => 'Dire Straits', 'track' => 'Sultans of Swing'],
    ['artist' => 'Jethro Tull', 'track' => 'Aqualung'],
    ['artist' => 'Mumford and Sons', 'track' => 'Thistles and Weeds'],
    ['artist' => 'Ed Sheeran', 'track' => 'Eraser']
];

echo '<ul>';
foreach ($playlist as $item) {
    echo "<li>{$item['artist']}: {$item['track']}</li>";
}
echo '</ul>';