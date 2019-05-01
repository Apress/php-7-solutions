<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>DateInterval: Add</title>
</head>

<body>
<?php
$xmas2019 = new DateTime('12/25/2019');
$xmas2019->add(DateInterval::createFromDateString('+12 days'));
?>
<p>Twelfth Night falls on <?= $xmas2019->format('l, F jS, Y'); ?>.</p>
</body>
</html>