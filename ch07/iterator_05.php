<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Filtering with the RegexIterator</title>
</head>

<body>
<pre>
<?php
$files = new FilesystemIterator('.');
$files = new RegexIterator($files, '/\.(?:txt|csv)$/i');
foreach ($files as $file) {
    echo $file->getFilename() . '<br>';
}
?>
</pre>
</body>
</html>
