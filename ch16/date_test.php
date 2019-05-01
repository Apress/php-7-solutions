<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Date Picker Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<form method="post" action="date_test.php">
    <p>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Submit">
    </p>
</form>
<?php
if (isset($_POST['submit'])) {
    echo 'The date you selected is: ' . htmlentities($_POST['date']);
}
?>
</body>
</html>