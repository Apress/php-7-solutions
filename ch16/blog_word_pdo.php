<?php
include '../includes/title.php';
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT article_id, title, LEFT(article, 100) AS first100
        FROM blog ORDER BY created DESC';
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
                <h2><?= safe($row['title']) ?></h2>
                <p>
                    <?php
                    $extract = $row['first100'];
                    // find position of last space in extract
                    $lastSpace = strrpos($extract, ' ');
                    // use $lastSpace to set length of new extract and add ...
                    echo safe(substr($extract, 0, $lastSpace)) . '... ';
                    ?>
                    <a href="details.php?article_id=<?= $row['article_id']; ?>"> More</a>
                </p>
            <?php }
        } ?>
    </main>
    <?php include '../includes/footer.php'; ?>
</div>
</body>
</html>
