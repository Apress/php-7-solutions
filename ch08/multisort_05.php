<?php
$playlist = [
    ['artist' => 'Jethro Tull', 'track' => 'Locomotive Breath', 'rating' => 8],
    ['artist' => 'Dire Straits', 'track' => 'Telegraph Road', 'rating' => 7],
    ['artist' => 'Mumford and Sons', 'track' => 'Broad-Shouldered Beasts', 'rating' => 9],
    ['artist' => 'Ed Sheeran', 'track' => 'Nancy Mulligan', 'rating' => 10],
    ['artist' => 'Dire Straits', 'track' => 'Sultans of Swing', 'rating' => 9],
    ['artist' => 'Jethro Tull', 'track' => 'Aqualung', 'rating' => 10],
    ['artist' => 'Mumford and Sons', 'track' => 'Thistles and Weeds', 'rating' => 6],
    ['artist' => 'Ed Sheeran', 'track' => 'Eraser', 'rating' => 8]
];

$tracks = array_column($playlist, 'track');
$ratings = array_column($playlist, 'rating');
array_multisort($ratings, SORT_DESC, $tracks, SORT_ASC, $playlist);
echo '<ul>';
foreach ($playlist as $item) {
    echo "<li>{$item['rating']} {$item['track']} by {$item['artist']}</li>";
}
echo '</ul>';
