<?php
use PhpSolutions\Image\Thumbnail;

if (isset($_POST['create'])) {
    require_once('../PhpSolutions/Image/Thumbnail.php');
    try {
        $thumb = new Thumbnail($_POST['pix'], 'C:/upload_test/thumbs');
        $thumb->create();
        $messages = $thumb->getMessages();
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Thumbnail</title>
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
<form method="post" action="create_thumb.php">
    <p>
        <select name="pix" id="pix">
            <option value="">Select an image</option>
            <?php
            $files = new FilesystemIterator('../images');
            $images = new RegexIterator($files, '/\.(?:jpg|png|gif|webp)$/i');
            foreach ($images as $image) { ?>
                <option value="<?= $image->getRealPath() ?>">
                    <?= $image->getFilename() ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <input type="submit" name="create" value="Create Thumbnail">
    </p>
</form>
</body>
</html>