<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Embedded PHP Code</title>
<style type="text/css">
body {
	background-color:#fff;
	color:#000;
	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
h1 {
	font-family:Tahoma, Geneva, sans-serif;
}
#footer {
	font-size:85%;
}
</style>
</head>

<body>
<h1>Embedded Code</h1>
<p>PHP code can be embedded directly in the body of a web page.</p>
<div id="footer">
    <p>&copy; <?php
    $startYear = 2018;
    $thisYear = date('Y');
    if ($startYear == $thisYear) {
        echo $startYear;
    } else {
        echo "{$startYear}&ndash;{$thisYear}";
    }
    ?> PHP 7 Solutions</p>
</div>
</body>
</html>