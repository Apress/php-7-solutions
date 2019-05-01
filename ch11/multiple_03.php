<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Multiple form 3</title>
</head>

<body>
<form method="post" action="multiple_03.php">
    <p>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
    </p>
    <p>
        <label for="city">Town/City:</label>
        <input type="text" name="city" id="city">
    </p>
    <p>
        <label for="country">Country:</label>
        <select name="country" id="country">
            <option value="" selected>Please Select</option>
            <option value="Canada">Canada</option>
            <option value="France">France</option>
            <option value="Germany">Germany</option>
            <option value="Japan">Japan</option>
            <option value="UK">United Kingdom</option>
            <option value="USA">United States</option>
            <option value="other">Other</option>
        </select>
    </p>
    <p>
        <input type="submit" name="next" value="Send details">
    </p>
</form>
</body>
</html>
