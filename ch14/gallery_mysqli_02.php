<?php
include './includes/title.php';
require_once './includes/connection.php';
require_once './includes/utility_funcs.php';
$conn = dbConnect('read');
$sql = 'SELECT filename, caption FROM images';
// submit the query
$result = $conn->query($sql);
if (!$result) {
    $error = $conn->error;
} else {
    // extract the first record as an array
    $row = $result->fetch_assoc();
    // get the name and caption for the main image
    $mainImage = safe($row['filename']);
    $caption = safe($row['caption']);
    // get the dimensions of the main image
    $imageSize = getimagesize('images/'.$mainImage)[3];
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey <?= $title ?? ''; ?></title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <h1>Japan Journey</h1>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>
    <main>
        <h2>Images of Japan</h2>
        <?php if (isset($error)) {
            echo "<p>$error</p>";
        } else {
        ?>
        <p id="picCount">Displaying 1 to 6 of 8</p>
        <div id="gallery">
            <table id="thumbs">
                <tr>
					<!--This row needs to be repeated-->
                    <td><a href="gallery.php">
                            <img src="images/thumbs/<?= safe($row['filename']) ?>"
                                 alt="<?= safe($row['caption']) ?>"
                                 width="80" height="54"></a></td>
                </tr>
				<!-- Navigation link needs to go here -->
            </table>
            <figure id="main_image">
                <img src="images/basin.jpg" alt="" width="350" height="237">
                <figcaption>Water basin at Ryoanji temple, Kyoto</figcaption>
            </figure>
        </div>
        <?php } ?>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>