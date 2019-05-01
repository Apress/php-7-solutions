<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT * FROM images
        WHERE caption LIKE BINARY "%maiko%"';
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
?>
    <table>
        <tr>
            <th>image_id</th>
            <th>filename</th>
            <th>caption</th>
        </tr>
        <?php foreach ($conn->query($sql) as $row) { ?>
            <tr>
                <td><?= $row['image_id'] ?></td>
                <td><?= safe($row['filename']) ?></td>
                <td><?= safe($row['caption']) ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>
