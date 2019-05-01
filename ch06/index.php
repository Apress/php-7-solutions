<?php ob_start();
try {
include './includes/title.php';
include './includes/random_image.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey <?= $title ?? '' ?></title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
    <?php if (isset($imageSize)) { ?>
    <style>
        figcaption {
            width: <?= $imageSize[0] ?>px;
        }
    </style>
    <?php } ?>
</head>

<body>
<header>
    <h1>Japan Journey</h1>
</header>
<div id="wrapper">
   <?php
   $file = './includes/menu.php';
   if (file_exists($file) && is_readable($file)) {
       require $file;
   } else {
       throw new Exception("$file can't be found");
   }
   ?>
    <main>
        <h2>A Journey through Japan with PHP</h2>
        <p>Ut enim ad minim veniam, quis nostrud exercitation consectetur adipisicing elit. Velit esse cillum dolore ullamco laboris nisi in reprehenderit in voluptate. Mollit anim id est laborum. Sunt in culpa duis aute irure dolor excepteur sint occaecat.</p>
        <?php if (isset($imageSize)) { ?>
        <figure>
            <img src="<?= $selectedImage ?>" alt="Random image" class="picBorder" <?= $imageSize[3] ?>>
            <figcaption><?= $caption ?></figcaption>
        </figure>
        <?php } ?>
        <p>Eu fugiat nulla pariatur. Ut labore et dolore magna aliqua. Cupidatat non proident, quis nostrud exercitation ut enim ad minim veniam.</p>
        <p>Consectetur adipisicing elit, duis aute irure dolor. Lorem ipsum dolor sit amet, ut enim ad minim veniam, consectetur adipisicing elit. Duis aute irure dolor ut aliquip ex ea commodo consequat.</p>
        <p>Quis nostrud exercitation eu fugiat nulla pariatur. Ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt velit esse cillum dolore ullamco laboris nisi.</p>
        <p>Sed do eiusmod tempor incididunt ullamco laboris nisi consectetur adipisicing elit. Ut aliquip ex ea commodo consequat. Qui officia deserunt ut labore et dolore magna aliqua. Velit esse cillum dolore eu fugiat nulla pariatur. Sed do eiusmod tempor incididunt cupidatat non proident, sunt in culpa. Sunt in culpa duis aute irure dolor excepteur sint occaecat.</p>
        <p>Quis nostrud exercitation eu fugiat nulla pariatur. Ut labore et dolore magna aliqua. Sunt in culpa duis aute irure dolor excepteur sint occaecat.</p>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>
