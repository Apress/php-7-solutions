<?php
include './includes/title.php';
require_once './includes/connection.php';
require_once './includes/utility_funcs.php';
// define number of columns in table
define('COLS', 2);
// initialize variables for the horizontal looper
$pos = 0;
$firstRow = true;
// set maximum number of records
define('SHOWMAX', 6);
$conn = dbConnect('read', 'pdo');
// prepare SQL to get total records
$getTotal = 'SELECT COUNT(*) FROM images';
// submit query and store result as $totalPix
$total = $conn->query($getTotal);
$totalPix = $total->fetchColumn();
// set the current page
$curPage = (isset($_GET['curPage'])) ? (int) $_GET['curPage'] : 0;
// calculate the start row of the subset
$startRow = $curPage * SHOWMAX;
if ($startRow > $totalPix) {
    $startRow = 0;
    $curPage = 0;
}
// prepare SQL to retrieve subset of image details
$sql = "SELECT filename, caption FROM images LIMIT $startRow," . SHOWMAX;
// submit the query
$result = $conn->query($sql);
// get any error messages
$error = $conn->errorInfo()[2];
if (!$error) {
    // extract the first record as an array
    $row = $result->fetch();
    // get the name for the main image
    if (isset($_GET['image'])) {
        $mainImage = safe($_GET['image']);
    } else {
        $mainImage = safe($row['filename']);
    }
    if (file_exists('images/'.$mainImage)) {
        // get the dimensions of the main image
        $imageSize = getimagesize('images/' . $mainImage)[3];
    } else {
        $error = 'Image not found';
    }
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
        <p id="picCount">Displaying <?php echo $startRow+1;
            if ($startRow+1 < $totalPix) {
                echo ' to ';
                if ($startRow+SHOWMAX < $totalPix) {
                    echo $startRow+SHOWMAX;
                } else {
                    echo $totalPix;
                }
            }
            echo " of $totalPix";
            ?></p>
            <div id="gallery">
            <table id="thumbs">
                <tr>
					<!--This row needs to be repeated-->
                    <?php do {
                        // set caption if thumbnail is same as main image
                        if ($row['filename'] == $mainImage) {
                            $caption = safe($row['caption']);
                        }
                        // if remainder is 0 and not first row, close row and start new one
                        if ($pos++ % COLS === 0 && !$firstRow) {
                            echo '</tr><tr>';
                        }
                        // once loop begins, this is no longer true
                        $firstRow = false;
                        ?>
                    <td><a href="gallery.php?image=<?= safe($row['filename']) ?>&amp;curPage=<?= $curPage ?>">
                            <img src="images/thumbs/<?= safe($row['filename']) ?>"
                                 alt="<?= safe($row['caption']) ?>"
                                 width="80" height="54"></a></td>
                    <?php } while ($row = $result->fetch());
                    while ($pos++ % COLS) {
                        echo '<td>&nbsp;</td>';
                    }
                    ?>
                </tr>
				<!-- Navigation link needs to go here -->
                <tr><td>
                <?php
                // create a back link if current page greater than 0
                if ($curPage > 0) {
                    echo '<a href="gallery.php?curPage=' . ($curPage-1) . '"> &lt; Prev</a>';
                } else {
                    // otherwise leave the cell empty
                    echo '&nbsp;';
                }
                ?>
                </td>
                <?php
                // pad the final row with empty cells if more than 2 columns
                if (COLS-2 > 0) {
                    for ($i = 0; $i < COLS-2; $i++) {
                        echo '<td>&nbsp;</td>';
                    }
                }
                ?>
                <td>
                <?php
                // create a forward link if more records exist
                if ($startRow+SHOWMAX < $totalPix) {
                    echo '<a href="gallery.php?curPage=' . ($curPage+1) . '"> Next &gt;</a>';
                } else {
                    // otherwise leave the cell empty
                    echo '&nbsp;';
                }
                ?>
                </td></tr>
            </table>
            <figure id="main_image">
                <img src="images/<?= $mainImage ?>" alt="<?= $caption ?>" <?= $imageSize ?>>
                <figcaption><?= $caption ?></figcaption>
            </figure>
        </div>
        <?php } ?>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>