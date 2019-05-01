<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Last Day of Month</title>
</head>

<body>
<?php
$format = 'F j, Y';
$date = new DateTime();
$date->setDate(2019, 3, 0);
?>
<p>Non-leap year: <?= $date->format($format) ?>.</p>
<p>Leap year: <?php $date->setDate(2020, 3, 0);
    echo $date->format($format); ?>.</p>
</body>
</html>