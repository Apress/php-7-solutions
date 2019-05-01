<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Modify Dates</title>
</head>

<body>
<?php
$format = 'F j, Y';
$date = new DateTime('January 31, 2019');
?>
<p>Original date: <?= $date->format($format) ?>.</p>
<p>Add one month: <?php
    $date->modify('last day of +1 month');
    echo $date->format($format);
    $date->modify('last day of -1 month');
    ?>
<p>Subtract one month: <?= $date->format($format) ?>
</body>
</html>