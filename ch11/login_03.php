<?php
$error = '';
if (isset($_POST['login'])) {
session_start();
$username = $_POST['username'];
$password = $_POST['pwd'];
// location of usernames and passwords
$userlist = 'C:/private/encrypted.csv';
// location to redirect on success
$redirect = 'http://localhost/phpsols-4e/sessions/menu.php';
require_once '../includes/authenticate.php';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
<?php
if ($error) {
    echo "<p>$error</p>";
}
?>
<form method="post" action="login.php">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
    </p>
    <p>
        <input name="login" type="submit" id="login" value="Log in">
    </p>
</form>
</body>
</html>
