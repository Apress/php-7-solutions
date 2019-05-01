<?php
// if the form has been submitted, process the input text
if (isset($_POST['putContents'])) {
    // open the file in write-only mode
    $file = fopen('C:/private/write.txt', 'w');
    // write the contents
    fwrite($file, $_POST['contents']);
    // close the file
    fclose($file);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Write Only</title>
    <style>
        label {
            font-weight: bold;
            display: inline-block;
            float: left;
            margin-right: 15px;
        }
        textarea {
            width: 400px;
            height: 125px;
        }
    </style>
</head>

<body>
<form name="writeFile" method="post" action="">
    <p>
        <label for="contents">Write this to file:</label>
        <textarea name="contents" id="contents"></textarea>
    </p>
    <p>
        <input name="putContents" type="submit" value="Write to file">
    </p>
</form>
</body>
</html>
