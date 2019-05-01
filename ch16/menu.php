<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
<nav>
    <ul>
        <li><a href="index.php" <?php if ($currentPage == 'index.php') {
            echo 'id="here"'; } ?>>Home</a></li>
        <li><a href="blog.php" <?php if ($currentPage == 'blog.php') {
                echo 'id="here"'; } ?>>Blog</a></li>
        <li><a href="gallery.php" <?php if ($currentPage == 'gallery.php') {
                echo 'id="here"'; } ?>>Gallery</a></li>
        <li><a href="contact.php" <?php if ($currentPage == 'contact.php') {
                echo 'id="here"'; } ?>>Contact</a></li>
    </ul>
</nav>
