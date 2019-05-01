<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT * FROM blog ORDER BY created DESC';
$result = $conn->query($sql);
$error = $conn->errorInfo()[2];
if (!$error) {
    #####################################################
    # Get the number of records found (MySQL & MariaDB) #
    #####################################################
    $numRows = $result->rowCount();
    // For other databases, you need to run a separate SELECT COUNT(*) query
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Manage Blog Entries</title>
    <link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Manage Blog Entries</h1>
<p><a href="blog_insert_pdo.php">Insert new entry</a></p>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} elseif (!$numRows) {
    echo '<p>No records found</p>';
} else { ?>
<table>
    <tr>
        <th>Created</th>
        <th>Title</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php while($row = $result->fetch()) { ?>
    <tr>
        <td><?= $row['created'] ?></td>
        <td><?= safe(['title']) ?></td>
        <td><a href="blog_update_pdo.php?article_id=<?= $row['article_id'] ?>">EDIT</a></td>
        <td><a href="blog_delete_pdo.php?article_id=<?= $row['article_id'] ?>">DELETE</a></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
</body>
</html>