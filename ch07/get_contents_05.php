<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Load File as an Array</title>
</head>

<body>
<?php
$sonnet = file('C:/private/sonnet.txt');
echo $sonnet[0];
?>
</body>
</html>