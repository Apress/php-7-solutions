<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Formatting DateTime Objects</title>
</head>

<body>
<?php
$now = new DateTime();
$xmas2019 = new DateTime('12/25/2019');
?>
<p>It's now <?= $now->format('g.ia') ?> on <?= $now->format('l, F jS, Y') ?></p>
<p>Christmas 2019 falls on a <?= $xmas2019->format('l') ?></p>
</body>
</html>