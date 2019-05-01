<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Foreach loop - shopping list</title>
</head>

<body>
<?php
$shoppingList = ['wine', 'fish', 'bread', 'grapes', 'cheese'];
foreach ($shoppingList as $item) {
    echo $item . '<br>';
}
?>
</body>
</html>
