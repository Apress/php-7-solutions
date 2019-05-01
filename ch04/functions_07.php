<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Passing by reference</title>
</head>

<body>
<?php
function doubleIt(&$number) {
    $number *= 2;
}
$num = 4;
echo '$num is: ' . $num . '<br>';
doubleIt($num);
echo '$num is now: ' . $num;
?>
</body>
</html>
