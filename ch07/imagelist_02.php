<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Dynamically Generated Image Menu</title>
</head>

<body>
<form method="post">
    <select name="pix" id="pix">
        <option value="">Select an image</option>
        <?php
        $files = new FilesystemIterator('../images');
        $images = new RegexIterator($files, '/\.(?:jpg|png|gif|webp)$/i');
        foreach ($images as $image) {
            $filename = $image->getFilename();
            ?>
            <option value="<?= $filename; ?>"><?= $filename; ?></option>
        <?php } ?>

    </select>
</form>
</body>
</html>