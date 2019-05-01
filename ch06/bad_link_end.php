<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>XSS Link</title>
</head>

<body>
	<p><a href="http://localhost/phpsols-4e/ch06/form_end.php/%22%3E%3Cscript%3Ealert('Boo!')%3C/script%3E%3Cfoo%22">Go
            on, trust me</a></p>
</body>
</html>