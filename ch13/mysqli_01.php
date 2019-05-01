<?php
require_once '../includes/connection.php';
$conn = dbConnect('read');
$sql = 'SELECT * FROM images';
$result = $conn->query($sql);
if (!$result) {
    $error = $conn->error;
} else {
    $numRows = $result->num_rows;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MySQLi connection</title>
</head>
<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
} else {
    echo "<p>A total of $numRows records were found.</p>";
}
?>
</body>
</html>
