<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Enclosing Array Elements in Double Quotes</title>
</head>

<body>
<?php
$book = [
    'title'     => 'PHP 7 Solutions: Dynamic Web Design Made Easy, Fourth Edition',
    'author'    => 'David Powers',
    'publisher' => 'Apress'
];
echo "{$book['title']} was written by {$book['author']}.";
?>
</body>
</html>