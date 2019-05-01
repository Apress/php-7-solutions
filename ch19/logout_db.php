<?php
// run this script only if the logout button has been clicked
if (isset($_POST['logout'])) {
    // empty the $_SESSION array
    $_SESSION = [];
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    // end session and redirect
    session_destroy();

    header('Location: http://localhost/phpsols-4e/authenticate/login_db.php');
    exit;
}
?>
<form method="post">
    <input name="logout" type="submit" value="Log out">
</form>
