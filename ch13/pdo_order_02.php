<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// connect to database
$conn = dbConnect('read', 'pdo');
// set default values
$col = 'image_id';
$dir = 'ASC';
// create arrays of permitted values
$columns = ['image_id', 'filename', 'caption'];
$direction = ['ASC', 'DESC'];
// if the form has been submitted, use only expected values
if (isset($_GET['column']) && in_array($_GET['column'], $columns)) {
    $col = $_GET['column'];
}
if (isset($_GET['direction']) && in_array($_GET['direction'], $direction)) {
    $dir = $_GET['direction'];
}
// prepare the SQL query using sanitized variables
$sql = "SELECT * FROM images
        ORDER BY $col $dir";
// submit the query and capture the result
$result = $conn->query($sql);
$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
    $error = $errorInfo[2];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO: Order by User Input</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
} else {
?>
    <form method="get" action="">
        <label for="column">Order by:</label>
        <select name="column" id="column">
            <option <?php if ($col == 'image_id') echo 'selected'; ?>>image_id</option>
            <option <?php if ($col == 'filename') echo 'selected'; ?>>filename</option>
            <option <?php if ($col == 'caption') echo 'selected'; ?>>caption</option>
        </select>
        <select name="direction" id="direction">
            <option value="ASC" <?php if ($dir == 'ASC') echo 'selected'; ?>>Ascending</option>
            <option value="DESC" <?php if ($dir == 'DESC') echo 'selected'; ?>>Descending</option>
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