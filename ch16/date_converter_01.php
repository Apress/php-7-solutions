<?php require_once './utility_funcs.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Convert Date to ISO Format</title>
    <style>
        input[type="number"] {
            width:50px;
        }
    </style>
</head>

<body>
<form method="post" action="date_converter.php">
    <p>
        <label for="month">Month:</label>
        <select name="month" id="month">
            <option value=""></option>
        </select>
        <label for="day">Date:</label>
        <input name="day" type="number" required id="day" max="31" min="1" maxlength="2">
        <label for="year">Year:</label>
        <input name="year" type="number" required id="year" maxlength="4">
    </p>
    <p>
        <input type="submit" name="convert" id="convert" value="Convert">
    </p>
</form>

</body>
</html>