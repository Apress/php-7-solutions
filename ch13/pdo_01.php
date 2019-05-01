<?php
require_once '../includes/connection.php';
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT * FROM images';
$result = $conn->query($sql);
$error = $conn->errorInfo()[2];
if (!$error) {
    $numRows = $result->rowCount();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDO connection</title>
</head>
<body>
<?php
if ($error) {
    echo "<p>$error</p>";
} else {
    echo "<p>A total of $numRows records were found.</p>";
}
?>
</body>
</html>
