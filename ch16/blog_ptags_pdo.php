<?php
include '../includes/title.php';
require_once 'utility_funcs.php';
require_once '../includes/connection.php';
// create database connection
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT article_id, title, article
        FROM blog ORDER BY created DESC';
$result = $conn->query($sql);
$error = $conn->errorInfo()[2];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey <?= $title ?? ''; ?></title>
    <link href="../styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require '../includes/menu.php'; ?>
    <main>
        <?php
        if (isset($error)) {
            echo "<p>$error</p>";
        } else {
        while ($row = $result->fetch()) { ?>
            <h2><?= $row['title']; ?></h2>
            <?= convertToParas($row['article']); ?>
        <?php }
        } ?>
    </main>
    <?php include '../includes/footer.php'; ?>
</div>
</body>
</html>