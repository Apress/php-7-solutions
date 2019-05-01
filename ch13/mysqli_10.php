<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
$conn = dbConnect('read');
$sql = 'SELECT * FROM images
        WHERE caption LIKE BINARY "%maiko%"';
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
?>
    <table>
        <tr>
            <th>image_id</th>
            <th>filename</th>
            <th>caption</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
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
