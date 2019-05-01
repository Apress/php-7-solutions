<?php
use PhpSolutions\Image\ThumbnailUpload;

if (isset($_POST['upload'])) {
    require_once('../PhpSolutions/Image/ThumbnailUpload.php');
    try {
        $loader = new ThumbnailUpload('C:/upload_test/', true);
        $loader->setThumbOptions('C:/upload_test/thumbs/');
        $loader->upload('image');
        $messages = $loader->getMessages();
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Thumbnail Upload</title>
</head>

<body>
<?php
if (!empty($messages)) {
    echo '<ul>';
    foreach ($messages as $message) {
        echo "<li>$message</li>";
    }
    echo '</ul>';
}
?>
<form action="create_thumb_upload.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="image">Upload images to create thumbnails:</label>
        <input type="file" name="image[]" id="image" multiple>
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
</body>
</html>