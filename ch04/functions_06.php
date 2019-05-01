<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Return value</title>
</head>

<body>
<?php
function doubleIt($number) {
    return $number *= 2;
}
$num = 4;
$doubled = doubleIt($num);
echo '$num is: ' . $num . '<br>';  // remains unchanged
echo '$doubled is: ' . $doubled;   // original number doubled
?>
</body>
</html>
