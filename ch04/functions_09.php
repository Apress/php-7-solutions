<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Type declaration</title>
</head>

<body>
<?php
function doubleIt(int $number) {
    return $number *= 2;
}
$num = 4.9;
$doubled = doubleIt($num);
echo '$num is: ' . $num . '<br>';
echo '$doubled is: ' . $doubled;
?>
</body>
</html>
