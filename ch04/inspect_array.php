<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Multidimensional array: print_r()</title>
</head>

<body>
<?php
$books = [
    [
        'title'     => 'PHP Solutions: Dynamic Web Design Made Easy, Third Edition',
        'author'    => 'David Powers'
    ],
    [
        'title'     => 'Learn PHP 7',
        'author'    => 'Steve Prettyman'
    ]
];
print_r($books);
?>
</body>
</html>
