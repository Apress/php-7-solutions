<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Variable scope</title>
</head>

<body>
<?php
function doubleIt(array $number) {
    $number *= 2;
    echo '$number is ' . $number . '<br>';
}
$number = 4;
doubleIt($number);
echo '$number is ' . $number;
?>
</body>
</html>
