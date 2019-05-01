<?php
if (isset($_POST['insert'])) {
    require_once '../includes/connection.php';
    // initialize flag
    $OK = false;
    // create database connection
    $conn = dbConnect('write');
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
<form method="post" action="blog_insert_mysqli.php">
    <p>
        <label for="title">Title:</label>
        <input name="title" type="text" id="title">
    </p>
    <p>
        <label for="article">Article:</label>
        <textarea name="article" id="article"></textarea>
    </p>
    <p>
        <input type="submit" name="insert" value="Insert New Entry">
    </p>
</form>
</body>
</html>