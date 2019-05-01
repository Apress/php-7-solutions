<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('write', 'pdo');
// initialize flags
$OK = false;
$deleted = false;
// get details of selected record
if (isset($_GET['article_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT article_id, title, created FROM blog WHERE article_id = ?';
    $stmt = $conn->prepare($sql);
    // execute query by passing variable as a single-element array
    $OK = $stmt->execute([$_GET['article_id']]);
    // assign result array to variables
    $stmt->bindColumn(1, $article_id);
    $stmt->bindColumn(2, $title);
    $stmt->bindColumn(3, $created);
    // fetch the result
    $stmt->fetch();
}
// if confirm deletion button has been clicked, delete record
if (isset($_POST['delete'])) {
    // first, delete the references to the article in the cross-reference table
    $sql = 'DELETE FROM article2cat WHERE article_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET['article_id']]);
    // then delete the article itself
    $sql = 'DELETE FROM blog WHERE article_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['article_id']]);
    // get number of affected rows
    $deleted = $stmt->rowCount();
    if (!$deleted) {
        $error = 'There was a problem deleting the record.';
    }
}
// redirect the page if deleted, cancel button clicked, or $_GET['article_id'] not defined
if ($deleted || isset($_POST['cancel_delete']) || !isset($_GET['article_id']))  {
    header('Location: http://localhost/phpsols-4e/admin/blog_list_pdo.php');
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Blog Entry</title>
    <link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Delete Blog Entry </h1>
<?php
if (isset($error)) {
    echo "<p class='warning'>Error: $error</p>";
} elseif (isset($article_id) && $article_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
    <p class="warning">Please confirm that you want to delete the following item. This action cannot be undone.</p>
    <p><?= $created .': ' . safe($title) ?></p>
<?php } ?>
<form id="form1" method="post" action="blog_delete_pdo_myisam_cascade.php">
    <p>
        <?php if (isset($article_id) && $article_id > 0) { ?>
            <input type="submit" name="delete" value="Confirm Deletion">
        <?php } ?>
        <input name="cancel_delete" type="submit" id="cancel_delete" value="Cancel">
        <?php if (isset($article_id) && $article_id > 0) { ?>
            <input name="article_id" type="hidden" value="<?= $article_id ?>">
        <?php } ?>
    </p>
</form>
</body>
</html>
