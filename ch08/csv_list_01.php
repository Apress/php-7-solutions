<?php
require_once './csv_processor.php';

$scores = csv_processor('./data/scores.csv');
foreach ($scores as $score) {
    [$home, $hscore, $away, $ascore] = $score;
    echo "$home $hscore:$ascore $away<br>";
}