<?php
if (isset($_GET['go'])) {
    require_once '../includes/connection.php';
    require_once '../includes/utility_funcs.php';
    $conn = dbConnect('read', 'pdo');
    $sql = 'SELECT image_id, filename, caption FROM images
            WHERE caption LIKE :search';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search', '%' . $_GET['search'] . '%');
    $stmt->execute();
    $error = $stmt->errorInfo()[2];
    if (!$error) {
        $stmt->bindColumn('image_id', $image_id);
        $stmt->bindColumn('filename', $filename);
        $stmt->bindColumn(3, $caption);
        $numRows = $stmt->rowCount();
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO Prepared Statement</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<form method="get" action="pdo_prepared.php">
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
    echo '<pre>';
    $stmt->debugDumpParams();
    echo '</pre>';
}
?>
</body>
</html>