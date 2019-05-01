<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('write', 'pdo');
// initialize flags
$OK = false;
$deleted = false;
// get details of selected record
if (isset($_GET['image_id']) && !$_POST) {
    // prepare SQL query
    $sql = 'SELECT image_id, filename, caption
            FROM images WHERE image_id = ?';
    $stmt = $conn->prepare($sql);
    // execute query by passing variable as a single-element array
    $OK = $stmt->execute([$_GET['image_id']]);
    // assign result array to variables
    $stmt->bindColumn(1, $image_id);
    $stmt->bindColumn(2, $filename);
    $stmt->bindColumn(3, $caption);
    // fetch the result
    $stmt->fetch();
}
// if confirm deletion button has been clicked, delete record
if (isset($_POST['delete'])) {
    $sql = 'SELECT COUNT(*) FROM blog WHERE image_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindColumn(1, $count);
    $stmt->execute([$_GET['image_id']]);
    // if $count is not 0, there are dependent records
    if ($count) {
        $error = 'That image has dependent records in a child table, and cannot be deleted.';
    } else {
        $sql = 'DELETE FROM images WHERE image_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['image_id']]);
        // get number of affected rows
        $deleted = $stmt->rowCount();
        if (!$deleted) {
            $error = 'There was a problem deleting the record.';
        }
        // To delete the image, you also need to pass the filename and path to unlink
        if ($deleted) {
            unlink('../images/' . $filename);
        }
    }
}
// redirect the page if deletion is successful, 
// cancel button clicked, or $_GET['image_id'] not defined
if ($deleted || isset($_POST['cancel_delete']) || !isset($_GET['image_id']))  {
    header('Location: ' . $image_list); // you need to create an image list similar to blog_list_mysqli.php
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Image</title>
    <link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Delete Image </h1>
<?php
if (isset($error)) {
    echo "<p class='warning'>Error: $error</p>";
} elseif(isset($image_id) && $image_id == 0) { ?>
    <p class="warning">Invalid request: record does not exist.</p>
<?php } else { ?>
    <p class="warning">Please confirm that you want to delete the following image. This action cannot be undone.</p>
    <p><img src="../images/<?= safe($filename) ?>" alt=""></p>
    <p><?= safe($caption) ?></p>
<?php } ?>
<form id="form1" method="post" action="image_delete_pdo_myisam_restrict.php">
    <p>
        <?php if(isset($image_id) && $image_id > 0) { ?>
            <input type="submit" name="delete" value="Confirm Deletion">
        <?php } ?>
        <input name="cancel_delete" type="submit" id="cancel_delete" value="Cancel">
        <?php if(isset($image_id) && $image_id > 0) { ?>
            <input name="image_id" type="hidden" value="<?= $image_id ?>">
        <?php } ?>
    </p>
</form>
</body>
</html>
