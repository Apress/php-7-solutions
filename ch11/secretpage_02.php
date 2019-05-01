<?php
session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
    header('Location: http://localhost/phpsols-4e/sessions/login.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Secret page</title>
</head>

<body>
<h1>Restricted area</h1>
<p><a href="menu.php">Back to the secret menu</a> </p>
</body>
</html>
