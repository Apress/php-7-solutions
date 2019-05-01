<?php
// Relative path to image directory
$imageDir = './images/';
require_once './includes/utility_funcs.php';
require_once './includes/connection.php';
// connect to the database
$conn = dbConnect('read', 'pdo');
// check for article_id in query string
if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = (int) $_GET['article_id'];
} else {
    $article_id = 0;
}
$sql = "SELECT title, article,DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated,
        filename, caption
        FROM blog LEFT JOIN images USING (image_id)
        WHERE blog.article_id = $article_id";
$result = $conn->query($sql);
$row = $result->fetch();
if ($row && !empty($row['filename'])) {
    $image = $imageDir . basename($row['filename']);
    if (file_exists($image) && is_readable($image)) {
        $imageSize = getimagesize($image)[3];
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Japan Journey</title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>
    <main>
        <h2><?php if ($row) {
                echo safe($row['title']);
            } else {
                echo 'No record found';
            }
            ?>
        </h2>
        <p><?php if ($row) { echo $row['updated']; } ?></p>
        <?php if (!empty($imageSize)) { ?>
        <figure>
            <img src="<?= $image ?>" alt="<?= safe($row['caption']) ?>" <?= $imageSize ?>>
        </figure>
        <?php } if ($row) { echo convertToParas($row['article']); } ?>

        <p><a href="<?php
            // check that browser supports $_SERVER variables
            if (isset($_SERVER['HTTP_REFERER']) && isset($_SERVER['HTTP_HOST'])) {
                $url = parse_url($_SERVER['HTTP_REFERER']);
                // find if visitor was referred from a different domain
                if ($url['host'] == $_SERVER['HTTP_HOST']) {
                    // if same domain, use referring URL
                    echo $_SERVER['HTTP_REFERER'];
                }
            } else {
                // otherwise, send to main page
                echo 'blog.php';
            } ?>">Back to the blog </a></p>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>
