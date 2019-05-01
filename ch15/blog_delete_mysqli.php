<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
$conn = dbConnect('write');
// initialize flags
$OK = false;
$deleted = false;
// initialize statement
$stmt = $conn->stmt_init();
// get details of selected record
if (isset($_GET['article_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT article_id, title, created
            FROM blog WHERE article_id = ?';
    if ($stmt->prepare($sql)) {
        // bind the query parameters
        $stmt->bind_param('i', $_GET['article_id']);
        // execute the query, and fetch the result
        $OK = $stmt->execute();
        // bind the result to variables
        $stmt->bind_result($article_id, $title, $created);
        $stmt->fetch();
    }
}
// if confirm deletion button has been clicked, delete record
if (isset($_POST['delete'])) {
    $sql = 'DELETE FROM blog WHERE article_id = ?';
    if ($stmt->prepare($sql)) {
        $stmt->bind_param('i', $_POST['article_id']);
        $stmt->execute();
        // if there's an error affected_rows is -1
        if ($stmt->affected_rows > 0) {
            $deleted = true;
        } else {
            $error = 'There was a problem deleting the record. ';
        }
    }
}
// redirect the page if deletion is successful, 
// cancel button clicked, or $_GET['article_id'] not defined
if ($deleted || isset($_POST['cancel_delete']) || !isset($_GET['article_id']))  {
    header('Location: http://localhost/phpsols-4e/admin/blog_list_mysqli.php');
    exit;
}
// if any SQL query fails, get the error message
if (isset($stmt) && !$OK && !$deleted) {
    $error .= $stmt->error;
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
if (isset($error)  && !empty($error)) {
    echo "<p class='warning'>Error: $error</p>";
}
if($article_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
    <p class="warning">Please confirm that you want to delete the following item. This action cannot be undone.</p>
    <p><?= $created . ': ' . safe($title); ?></p>
<?php } ?>
<form method="post" action="blog_delete_mysqli.php">
    <p>
        <?php if(isset($article_id) && $article_id > 0) { ?>
            <input type="submit" name="delete" value="Confirm Deletion">
        <?php } ?>
        <input name="cancel_delete" type="submit" value="Cancel">
        <?php if(isset($article_id) && $article_id > 0) { ?>
            <input name="article_id" type="hidden" value="<?= $article_id; ?>">
        <?php } ?>
    </p>
</form>
</body>
</html>
