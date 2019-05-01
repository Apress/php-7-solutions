<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Processing File Content</title>
</head>

<body>
<?php
$sonnet = file_get_contents('C:/private/sonnet.txt');
// replace new lines with spaces
$words = str_replace("\r\n", ' ', $sonnet);
// split into an array of words
$words = explode(' ', $words);
// extract the first nine array elements
$first_line = array_slice($words, 0, 9);
// join the first nine elements and display
echo implode(' ', $first_line);
?>
</body>
</html>