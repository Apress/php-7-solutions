<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Document root test</title>
</head>

<body>
<p>
<?php
if (isset($_SERVER['DOCUMENT_ROOT'])) {
    echo 'Supported. The server root is '.$_SERVER['DOCUMENT_ROOT'];
}
else {
    echo "\$_SERVER['DOCUMENT_ROOT'] is not supported";
}
?>
</p> 
</body>
</html>
