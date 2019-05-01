<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Using FilesystemIterator</title>
</head>

<body>
<pre>
<?php 
$files = new FilesystemIterator('../images');
$files->setFlags(FilesystemIterator::UNIX_PATHS);
foreach ($files as $file) {
    echo $file . '<br>';
}
?>
</pre>
</body>
</html>
