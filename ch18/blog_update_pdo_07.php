<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// initialize flags
$OK = false;
$done = false;
$trans_error = false;
// create database connection
$conn = dbConnect('write', 'pdo');
// get details of selected record
if (isset($_GET['article_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT article_id, image_id, title, article FROM blog
            WHERE article_id = ?';
    $stmt = $conn->prepare($sql);
    // pass the placeholder value to execute() as a single-element array
    $OK = $stmt->execute([$_GET['article_id']]);
    // bind the results
    $stmt->bindColumn(1, $article_id);
    $stmt->bindColumn(2, $image_id);
    $stmt->bindColumn(3, $title);
    $stmt->bindColumn(4, $article);
    $stmt->fetch();
    // get categories associated with the article
    $sql = 'SELECT cat_id FROM article2cat WHERE article_id = ?';
    $stmt = $conn->prepare($sql);
    // pass the placeholder value to execute() as a single-element array
    $OK = $stmt->execute([$_GET['article_id']]);
    $stmt->bindColumn(1, $cat_id);
    // loop through the results to store them in an array
    $selected_categories = [];
    while ($stmt->fetch()) {
        $selected_categories[] = $cat_id;
    }
}
// if form has been submitted, update record
if (isset($_POST['update'])) {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        $conn->beginTransaction();
        // prepare update query
        $sql = 'UPDATE blog SET image_id = ?, title = ?, article = ?
                WHERE article_id = ?';
        $stmt = $conn->prepare($sql);
        if (empty($_POST['image_id'])) {
            $stmt->bindValue(1, NULL, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(1, $_POST['image_id'], PDO::PARAM_INT);
        }
        $stmt->bindParam(2, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['article'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['article_id'], PDO::PARAM_INT);
        // execute query
        $stmt->execute();
        // delete existing values in the cross-reference table
        $sql = 'DELETE FROM article2cat WHERE article_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['article_id']]);

        // insert the new values in articles2cat
        if (isset($_POST['category']) && is_numeric($_POST['article_id'])) {
            $article_id = (int)$_POST['article_id'];
            foreach ($_POST['category'] as $cat_id) {
                $values[] = "($article_id, " . (int)$cat_id . ')';
            }
            if ($values) {
                $sql = 'INSERT INTO article2cat (article_id, cat_id)
                    VALUES ' . implode(',', $values);
                // use exec() with non-SELECT queries
                $conn->exec($sql);
            }
        }
        $done = $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        $trans_error = $e->getMessage();
    }
}
// redirect page after updating or if $_GET['article_id'] not defined
if (($done ||  $trans_error)||(!$_POST && !isset($_GET['article_id']))) {
    $url = 'http://localhost/phpsols-4e/admin/blog_list_pdo.php';
    if ($trans_error) {
        $url .= "?trans_error=$trans_error";
    }
    header("Location: $url");
    exit;
}
if (isset($stmt)) {
    // get error message (will be null if no error)
    $error = $stmt->errorInfo()[2];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Blog Entry</title>
    <link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Update Blog Entry</h1>
<p><a href="blog_list_pdo.php">List all entries </a></p>
<?php if (isset($error)) {
    echo "<p class='warning'>Error: $error</p>";
}
if($article_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
<form method="post" action="blog_update_pdo.php">
    <p>
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="<?= safe($title) ?>">
    </p>
    <p>
        <label for="article">Article:</label>
        <textarea name="article" id="article"><?= safe($article) ?></textarea>
    </p>
    <p>
        <label for="category">Categories:</label>
        <select name="category[]" size="5" multiple id="category">
            <?php
            // get categories
            $getCats = 'SELECT cat_id, category FROM categories
                               ORDER BY category';
            foreach ($conn->query($getCats) as $row) {
                ?>
                <option value="<?= $row['cat_id'] ?>" <?php
                if (isset($selected_categories) &&
                    in_array($row['cat_id'], $selected_categories)) {
                    echo 'selected';
                } ?>><?= safe($row['category']) ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="image_id">Uploaded image:</label>
        <select name="image_id" id="image_id">
            <option value="">Select image</option>
            <?php
            // get the list images
            $getImages = 'SELECT image_id, filename
                          FROM images ORDER BY filename';
            foreach ($conn->query($getImages) as $row) {
                ?>
                <option value="<?= $row['image_id'] ?>"
                    <?php
                    if ($row['image_id'] == $image_id) {
                        echo 'selected';
                    }
                    ?>><?= safe($row['filename']) ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <input type="submit" name="update" value="Update Entry">
        <input name="article_id" type="hidden" value="<?= $article_id ?>">
    </p>
</form>
<?php } ?>
</body>
</html>