<?php
require_once 'connection.php';
$conn = dbConnect('read');
// get the username's hashed password from the database
$sql = 'SELECT pwd FROM users WHERE username = ?';
// initialize and prepare statement
$stmt = $conn->stmt_init();
$stmt->prepare($sql);
// bind the input parameter
$stmt->bind_param('s', $username);
$stmt->execute();
// bind the result, using a new variable for the password
$stmt->bind_result($storedPwd);
$stmt->fetch();
// check the submitted password against the stored version
if (password_verify($password, $storedPwd)) {
    $_SESSION['authenticated'] = 'Jethro Tull';
    // get the time the session started
    $_SESSION['start'] = time();
    session_regenerate_id();
    header("Location: $redirect");
    exit;
} else {
    // if not verified, prepare error message
    $error = 'Invalid username or password';
}
