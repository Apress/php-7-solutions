<?php
session_start();
ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Session test 3</title>
</head>

<body>
<?php
// check whether session variable is set
if (isset($_SESSION['name'])) {
    // if set, greet by name
    echo 'Hi, ' . htmlentities($_SESSION['name']) . '. See, I remembered your name!<br>';
    // unset session variable
    unset($_SESSION['name']);
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    ob_end_flush();
    // end session
    session_destroy();
    echo '<a href="session_02.php">Back to page 2</a>';
} else {
    // display if not recognized
    echo "Sorry, I don't know you.<br>";
    echo '<a href="session_01.php">Please log in</a>';
}
?>
</body>
</html>
