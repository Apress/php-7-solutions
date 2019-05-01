<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>DateTime::createFromFormat</title>
</head>

<body>
<?php
$xmas2019 = DateTime::createFromFormat('d/m/Y', '25/12/2019');
echo $xmas2019->format('l, jS F Y');
?>
</body>
</html>