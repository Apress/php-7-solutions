<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Variable scope</title>
</head>

<body>
<?php
function doubleIt($number) {
    $number *= 2;
    echo 'Inside the function, $number is ' . $number . '<br>'; // number is doubled
}
$number = 4;
doubleIt($number);
echo 'Outside the function $number is still ' . $number;  // not doubled
?>
</body>
</html>
