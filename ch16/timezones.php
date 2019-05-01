<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Changing Time Zones</title>
</head>

<body>
<?php
$UK = new DateTimeZone('Europe/London');
$USeast = new DateTimeZone('America/New_York');
$Hawaii = new DateTimeZone('Pacific/Honolulu');
$now = new DateTime('now', $UK);
?>
<p>In London, it's now <?= $now->format('l, F jS, Y g.ia'); ?>.</p>
<p>In New York, it's <?php
    $now->setTimezone($USeast);
    echo $now->format('l, F jS, Y g.ia'); ?>.</p>
<p>In Hawaii, it's <?php
    $now->setTimezone($Hawaii);
    echo $now->format('l, F jS, Y g.ia'); ?>.</p>
</body>
</html>