<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>RecursiveDirectoryIterator</title>
</head>

<body>
<pre>
<?php 
$files = new RecursiveDirectoryIterator('../images');
$files->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($files);
foreach ($files as $file) {
    echo $file->getRealPath() . '<br>';
}
?>
</pre>
</body>
</html>
