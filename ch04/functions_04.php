<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Simple function with default - no return value</title>
</head>

<body>
<?php
function sayHi($name = 'bashful') {
    echo "Hi, $name!";
}
sayHi();
?>
</body>
</html>
