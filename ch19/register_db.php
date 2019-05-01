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
