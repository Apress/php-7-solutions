<?php
use PhpSolutions\File\Upload;

require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
// create database connection
$conn = dbConnect('write', 'pdo');
if (isset($_POST['insert'])) {
    // initialize flag
    $OK = false;
    if(isset($_POST['upload_new']) && $_FILES['image']['error'] == 0) {
        $imageOK = false;
        require_once '../PhpSolutions/File/Upload.php';
        $loader = new Upload('../images/');
        $loader->upload();
        $names = $loader->getFilenames();
        // $names will be an empty array if the upload failed
        if ($names) {
            // use named placeholders
            $sql = 'INSERT INTO images (filename, caption)
                    VALUES (:filename, :caption)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':filename', $names[0], PDO::PARAM_STR);
            $stmt->bindParam(':caption', $_POST['caption'], PDO::PARAM_STR);
            $stmt->execute();
            // use rowCount() to get the number of affected rows
            $imageOK = $stmt->rowCount();
        }
        // get the image's primary key or find out what went wrong
        if ($imageOK) {
            // lastInsertId() must be called on the PDO connection object
            $image_id = $conn->lastInsertId();
        } else {
            $imageError = implode(' ', $loader->getMessages());
        }
    } elseif (isset($_POST['image_id']) && !empty($_POST['image_id'])) {
        // get the primary key of a previously uploaded image
        $image_id = $_POST['image_id'];
    }

    // insert blog details only if there hasn't been an image upload error
    if (!isset($imageError)) {
        // create SQL
        $sql = 'INSERT INTO blog (image_id, title, article)
                VALUES(:image_id, :title, :article)';
        // prepare the statement
        $stmt = $conn->prepare($sql);
        // bind the parameters
        // if $image_id exists, use it
        if (isset($image_id)) {
            $stmt->bindParam(':image_id', $image_id, PDO::PARAM_INT);
        } else {
            // set image_id to NULL
            $stmt->bindValue(':image_id', NULL, PDO::PARAM_NULL);
        }
        $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(':article', $_POST['article'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
    }
    // if the blog entry was inserted successfully, check for categories
    if ($OK && isset($_POST['category'])) {
        // get the article's primary key
        $article_id = $conn->lastInsertId();
        foreach ($_POST['category'] as $cat_id) {
            if (is_numeric($cat_id)) {
                $values[] = "($article_id, " . (int) $cat_id . ')';
            }
        }
        if ($values) {
            $sql = 'INSERT INTO article2cat (article_id, cat_id) VALUES ' . implode(',', $values);
            // execute the query and get error message if it fails
            // PDO uses the exec() method for non-SELECT queries
            if (!$conn->exec($sql)) {
                $catError = $conn->error;
            }
        }
    }
    // redirect if successful or display error
    if ($OK && !isset($imageError) && !isset($catError)) {
        header('Location: http://localhost/phpsols-4e/admin/blog_list_pdo.php');
        exit;
    } else {
        $error = '';
        if (isset($stmt)) {
            $error .= $stmt->errorInfo()[2];
        } else {
            $error .= $conn->errorInfo()[2];
        }
        if (isset($imageError)) {
            $error .= ' ' . $imageError;
        }
        if (isset($catError)) {
            $error .= ' ' . $catError;
        }
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
<form method="post" action="blog_insert_pdo.php" enctype="multipart/form-data">
    <p>
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="<?php if (isset($error)) {
            echo safe($_POST['title']);
        } ?>">
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
            // use foreach loop to submit query and display results
            foreach ($conn->query($getCats) as $row) {
                ?>
                <option value="<?= $row['cat_id'] ?>" <?php
                if (isset($_POST['category']) && in_array($row['cat_id'], $_POST['category'])) {
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
            // get the list of images
            $getImages = 'SELECT image_id, filename
                          FROM images ORDER BY filename';
            // use foreach loop to submit query and display results
            foreach ($conn->query($getImages) as $row) {
                ?>
                <option value="<?= $row['image_id'] ?>"
                    <?php
                    if (isset($_POST['image_id']) && $row['image_id'] == $_POST['image_id']) {
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
<script src="toggle_fields.js"></script>
</body>
</html>