<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Variable variables</title>
</head>

<body>
<?php
$location = 'city';
$$location = 'London';
echo $city . '<br>';
?>
</body>
</html>