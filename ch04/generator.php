<?php
function counter($num) {
    $i = 1;
    while ($i < $num) {
        yield $i++;
    }
    yield $i;
    yield $i + 10;
    yield $i + 20;
}
$numbers = counter(5);
foreach ($numbers as $number) {
    echo $number . ' ';
}
