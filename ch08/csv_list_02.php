<?php
require_once './csv_processor.php';

$scores = csv_processor('./data/scores.csv');
$scores->next();
while ($scores->valid()) {
    [$home, $hscore, $away, $ascore] = $scores->current();
    echo "$home $hscore:$ascore $away<br>";
    $scores->next();
}