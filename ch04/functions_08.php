<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Arbitrary number of arguments</title>
</head>

<body>
<?php
function addEm(...$nums) {
    return array_sum($nums);
}
$total = addEm(1, 2, 3, 4, 5);
echo '$total is ' . $total;
?>
</body>
</html>
