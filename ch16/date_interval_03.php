<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>DateInterval: Diff</title>
</head>

<body>
<p><?php
    $independence = new DateTime('7/4/1776');
    $now = new DateTime();
    $interval = $now->diff($independence);
    echo $interval->format('%Y years %m months %d days'); ?> since American Declaration of Independence.</p>
</body>
</html>