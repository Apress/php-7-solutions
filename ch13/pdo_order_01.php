<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// connect to database
$conn = dbConnect('read', 'pdo');
// prepare the SQL query
$sql = "SELECT * FROM images
        ORDER BY image_id";
// submit the query and capture the result
$result = $conn->query($sql);
$error = $conn->errorInfo()[2];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO: Order by User Input</title>
</head>

<body>
<?php
if ($error) {
    echo "<p>$error</p>";
} else {
?>
<form method="get" action="pdo_order.php">
    <label for="column">Order by:</label>
    <select name="column" id="column">
        <option>image_id</option>
        <option>filename</option>
        <option>caption</option>
    </select>
    <select name="direction" id="direction">
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>
    <input type="submit" name="change" id="change" value="Change">
</form>
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