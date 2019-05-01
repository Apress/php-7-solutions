<?php
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $retyped = trim($_POST['conf_pwd']);
    require_once '../includes/register_user_pdo.php';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Register user</title>
    <style>
        label {
            display:inline-block;
            width:125px;
            text-align:right;
            padding-right:2px;
        }
        input[type="submit"] {
            margin-left:135px;
        }
    </style>
</head>

<body>
<h1>Register User</h1>
<?php
if (isset($success)) {
    echo "<p>$success</p>";
} elseif (isset($errors) && !empty($errors)) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo '</ul>';
}
?>
<form action="register_db.php" method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
    </p>
    <p>
        <label for="conf_pwd">Retype Password:</label>
        <input type="password" name="conf_pwd" id="conf_pwd">
    </p>
    <p>
        <input type="submit" name="register" value="Register">
    </p>
</form>
</body>
</html>
