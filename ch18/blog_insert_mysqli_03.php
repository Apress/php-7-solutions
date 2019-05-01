<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('write');
if (isset($_POST['insert'])) {
    // initialize flag
    $OK = false;
    // initialize prepared statement
    $stmt = $conn->stmt_init();
    // create SQL
    $sql = 'INSERT INTO blog (title, article)
            VALUES(?, ?)';
    if ($stmt->prepare($sql)) {
        // bind parameters and execute statement
        $stmt->bind_param('ss', $_POST['title'], $_POST['article']);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $OK = true;
        }
    }
    // redirect if successful or display error
    if ($OK) {
        header('Location: http://localhost/phpsols-4e/admin/blog_list_mysqli.php');
        exit;
    } else {
        $error = $stmt->error;
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert Blog Entry</title>
    <link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Insert New Blog Entry</h1>
<?php if (isset($error)) {
    echo "<p>Error: $error</p>";
} ?>
<form method="post" action="blog_insert_mysqli.php" enctype="multipart/form-data">
    <p>
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="<?php if (isset($error)) {
            echo safe($_POST['title']);
        } ?>"
        >
    </p>
    <p>
        <label for="article">Article:</label>
        <textarea name="article" id="article"><?php if (isset($error)) {
                echo safe($_POST['article']);
            } ?></textarea>
    </p>
    <p>
        <label for="category">Categories:</label>
        <select name="category[]" size="5" multiple id="category">
            <?php
            // get categories
            $getCats = 'SELECT cat_id, category FROM categories ORDER BY category';
            $categories = $conn->query($getCats);
            while ($row = $categories->fetch_assoc()) {
                ?>
                <option value="<?= $row['cat_id'] ?>" <?php
                if (isset($_POST['category']) && in_array($row['cat_id'],
                        $_POST['category'])) { echo 'selected';
                } ?>><?= safe($row['category']) ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="image_id">Uploaded image:</label>
        <select name="image_id" id="image_id">
            <option value="">Select image</option>
            <?php
            // get the list of images
            $getImages = 'SELECT image_id, filename
                                 FROM images ORDER BY filename';
            $images = $conn->query($getImages);
            while ($row = $images->fetch_assoc()) {
                ?>
                <option value="<?= $row['image_id'] ?>"
                    <?php
                    if (isset($_POST['image_id']) && $row['image_id'] ==
                        $_POST['image_id']) {
                        echo 'selected';
                    }
                    ?>><?= safe($row['filename']) ?></option>
            <?php } ?>
        </select>
    </p>
    <p id="allowUpload">
        <input type="checkbox" name="upload_new" id="upload_new">
        <label for="upload_new">Upload new image</label>
    </p>
    <p class="optional">
        <label for="image">Select image:</label>
        <input type="file" name="image" id="image">
    </p>
    <p class="optional">
        <label for="caption">Caption:</label>
        <input name="caption" type="text" id="caption">
    </p>
    <p>
        <input type="submit" name="insert" value="Insert New Entry">
    </p>
</form>
</body>
</html>