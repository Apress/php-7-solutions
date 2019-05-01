<?php
include './includes/title.php';
$errors = [];
$missing = [];
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // email processing script
    $to = 'david@example.com';  // use your own email address
    $subject = 'Feedback from Japan Journey';
    // list expected fields
    $expected = ['name', 'email', 'comments'];
    // set required fields
    $required = ['name', 'comments', 'email'];
    require './includes/processmail.php';
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey <?= $title ?? '' ?></title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
    <h1>Japan Journey </h1>
</header>
<div id="wrapper">
    <?php require './includes/menu.php'; ?>
    <main>
        <h2>Contact Us  </h2>
        <?php if ($_POST && $suspect) { ?>
        <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
        <?php } elseif ($missing || $errors) { ?>
        <p class="warning">Please fix the item(s) indicated.</p>
        <?php } ?>
        <p>Ut enim ad minim veniam, quis nostrud exercitation consectetur adipisicing elit. Velit esse cillum dolore ullamco laboris nisi in reprehenderit in voluptate. Mollit anim id est laborum. Sunt in culpa duis aute irure dolor excepteur sint occaecat.</p>
        <form method="post" action="contact.php">
            <p>
                <label for="name">Name:
                <?php if (in_array('name', $missing)) { ?>
                    <span class="warning">Please enter your name</span>
                <?php } ?>
                </label>
                <input name="name" id="name" type="text"
                <?php if ($missing || $errors) {
                    echo 'value="' . htmlentities($name) . '"';
                } ?>>
            </p>
            <p>
                <label for="email">Email:
                <?php if (in_array('email', $missing)) { ?>
                    <span class="warning">Please enter your email address</span>
                <?php } ?>
                </label>
                <input name="email" id="email" type="text"
                <?php if ($missing || $errors) {
                    echo 'value="' . htmlentities($email) . '"';
                } ?>>
            </p>
            <p>
                <label for="comments">Comments:
                <?php if (in_array('comments', $missing)) { ?>
                    <span class="warning">Please enter your comments</span>
                <?php } ?>
                </label>
                <textarea name="comments" id="comments"><?php
                    if ($missing || $errors) {
                        echo htmlentities($comments);
                    } ?></textarea>
            </p>
            <p>
                <input name="send" type="submit" value="Send message">
            </p>
        </form>
        <pre>
            <?php if ($_POST) { print_r($_POST); } ?>
        </pre>
    </main>
    <?php include './includes/footer.php'; ?>
</div>
</body>
</html>
