<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Heredoc syntax</title>
</head>

<body>
<?php
$fish = 'whiting';
$book['title'] = 'Alice in Wonderland';
$mockTurtle = <<< Gryphon
"Will you walk a little faster?" said a $fish to a snail.
"There's a porpoise close behind us, and he's treading on my tail."
(from {$book['title']})
Gryphon;
echo $mockTurtle;
?>
</body>
</html>
