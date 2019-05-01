<?php
require_once '../includes/connection.php';
require_once '../includes/utility_funcs.php';
$conn = dbConnect('read', 'pdo');
$getImages = 'SELECT image_id, filename FROM images';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>PDO: Insert Integer in SQL</title>
    <style>
        figure {
            margin: 30px;
            display:block;
        }
        figcaption {
            font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-weight:bold;
            display:inline-block;
            max-width:250px;
            margin:10px;
        }
    </style>
</head>

<body>
<form action="pdo_integer.php" method="get">
    <select name="image_id">
        <?php foreach ($conn->query($getImages) as $row) { ?>
            <option value="<?= $row['image_id'] ?>"
                <?php if (isset($_GET['image_id']) && $_GET['image_id'] == $row['image_id']) {
                    echo 'selected';
                } ?>
                ><?= safe($row['filename']) ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="go" value="Display">
</form>
<?php
if (isset($_GET['image_id'])) {
    $image_id = (int)$_GET['image_id'];
    $error = ($image_id === 0) ? true : false;
    if (!$error) {
        $sql = "SELECT filename, caption FROM images
                        WHERE image_id = $image_id";
        $result = $conn->query($sql);
        $row = $result->fetch();
        ?>
        <figure><img src="../images/<?= safe($row['filename']) ?>">
            <figcaption><?= safe($row['caption']) ?></figcaption>
        </figure>
    <?php }
    if ($error) {
        echo '<p>Image not found</p>';
    }
} ?>
</body>
</html>