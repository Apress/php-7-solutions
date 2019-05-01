<?php
// set the maximum upload size in bytes
$max = 51200;
if (isset($_POST['upload'])) {
    // define the path to the upload folder
    $destination = 'C:/upload_test/';
    // move the file to the upload folder and rename it
    move_uploaded_file($_FILES['image']['tmp_name'], $destination . $_FILES['image']['name']);
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Upload File</title>
</head>

<body>
<form action="file_upload.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="image">Upload image:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max ?>">
        <input type="file" name="image" id="image">
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
</body>
</html>