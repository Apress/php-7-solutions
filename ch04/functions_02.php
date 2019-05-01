<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Simple function with argument - no return value</title>
</head>

<body>
<?php
function sayHi($name) {
    echo "Hi, $name!";
}
$visitor = 'Mark';
sayHi($visitor);
?>
</body>
</html>
