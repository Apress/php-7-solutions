<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Thumbnail</title>
</head>

<body>
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