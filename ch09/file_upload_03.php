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
        <input type="file" name="image" id="image">
    </p>
    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
</body>
</html>