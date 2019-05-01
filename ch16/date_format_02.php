<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Formatting with date()</title>
</head>

<body>
<?php $xmas2019 = strtotime('12/25/2019') ?>
<p>It's now <?= date('g.ia') ?> on <?= date('l, F jS, Y') ?></p>
<p>Christmas 2019 falls on a <?= date('l', $xmas2019) ?></p>
</body>
</html>