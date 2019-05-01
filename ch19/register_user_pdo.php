<?php
use PhpSolutions\Authenticate\CheckPassword;

require_once __DIR__ . '/../PhpSolutions/Authenticate/CheckPassword.php';
$usernameMinChars = 6;
$errors = [];
if (strlen($username) < $usernameMinChars) {
    $errors[] = "Username must be at least $usernameMinChars characters.";
}
if (!preg_match('/^[-_\p{L}\d]+$/ui', $username)) {
    $errors[] = 'Only alphanumeric characters, hyphens, and underscores are permitted in username.';
}
$checkPwd = new CheckPassword($password, 10);
$checkPwd->requireMixedCase();
$checkPwd->requireNumbers(2);
$checkPwd->requireSymbols();
if (!$checkPwd->check()) {
    $errors = array_merge($errors, $checkPwd->getErrors());
}
if ($password != $retyped) {
    $errors[] = "Your passwords don't match.";
}
if (!$errors) {
    // hash password using default algorithm
    $password = password_hash($password, PASSWORD_DEFAULT);
    // include the connection file
    require_once 'connection.php';
    $conn = dbConnect('write', 'pdo');
    // prepare SQL statement
    $sql = 'INSERT INTO users (username, pwd) VALUES (:username, :pwd)';
    $stmt = $conn->prepare($sql);
    // bind parameters and insert the details into the database
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':pwd', $password, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $success = htmlentities($username) . ' has been registered. You may now log in.';
    } elseif ($stmt->errorCode() == 23000) {
        $errors[] = htmlentities($username) . ' is already in use. Please choose another username.';
    } else {
        $errors[] = $stmt->errorInfo()[2];
    }
}

