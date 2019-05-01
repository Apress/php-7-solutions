<?php
// if the form has been submitted, process the input text
if (isset($_POST['putContents'])) {
    // create a file ready for writing only if it doesn't already exist
    // error control operator prevents error message from being displayed
    if ($file = @ fopen('C:/private/once_only.txt', 'x')) {
        // write the contents
        fwrite($file, $_POST['contents']);
        // close the file
        fclose($file);
    } else {
        $error = 'File already exists, and cannot be overwritten.';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Exclusive Write</title>
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
        .warning {
            font-weight: bold;
            color: #f00;
        }
    </style>
</head>

<body>
<?php if (isset($error)) { ?>
<p class="warning"><?= $error ?></p>
<?php } ?>
<form name="writeFile" method="post" action="">
    <p>
        <label for="contents">Write this to file:</label>
        <textarea name="contents" id="contents"></textarea>
    </p>
    <p>
        <input name="putContents" type="submit" id="putContents" value="Write to file">
    </p>
</form>
</body>
</html>
