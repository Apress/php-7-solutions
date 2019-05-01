<?php
if (isset($_GET['go'])) {
    require_once '../includes/connection.php';
    require_once '../includes/utility_funcs.php';
    $conn = dbConnect('read');
    $sql = 'SELECT image_id, filename, caption FROM images
            WHERE caption LIKE ?';
    $searchterm = '%'. $_GET['search'] .'%';
    $stmt = $conn->stmt_init();
    if ($stmt->prepare($sql)) {
        $stmt->bind_param('s', $searchterm);
        $stmt->execute();
        $stmt->bind_result($image_id, $filename, $caption);
        $stmt->store_result();
        $numRows = $stmt->num_rows;
    } else {
        $error = $stmt->error;
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>MySQLi Prepared Statement</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<form method="get" action="mysqli_prepared.php">
    <input type="search" name="search" id="search">
    <input type="submit" name="go" id="go" value="Search">
</form>
<?php if (isset($numRows)) { ?>
    <p>Number of results for <b><?= safe($_GET['search']) ?></b>:
        <?= $numRows ?></p>
    <?php if ($numRows) { ?>
        <table>
            <tr>
                <th>image_id</th>
                <th>filename</th>
                <th>caption</th>
            </tr>
            <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?= $image_id ?></td>
                    <td><?= safe($filename) ?></td>
                    <td><?= safe($caption) ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php }
} ?>
</body>
</html>