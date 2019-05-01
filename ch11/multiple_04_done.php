<?php
session_start();
if (!isset($_SESSION['formStarted'])) {
    header('Location: http://localhost/phpsols-4e/sessions/multiple_01.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Multiple form 4</title>
</head>

<body>
<p>The following details were submitted: </p>
<ul>
    <?php
    $expected = ['first_name', 'family_name', 'age',
        'address', 'city', 'country'];
    // unset the formStarted variable
    unset($_SESSION['formStarted']);
    foreach ($expected as $key) {
        echo "<li>$key: " . htmlentities($_SESSION[$key]) . '</li>';
        // unset the session variable
        unset($_SESSION[$key]);
    }
    ?>
</ul>

</body>
</html>
