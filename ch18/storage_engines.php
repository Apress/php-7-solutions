<?php
// edit the first three lines to match your remote server setup
$host = 'localhost';
$username = 'username';
$password = 'password';
$conn = new MySQLi($host, $username, $password);
$sql = 'SHOW ENGINES';
$result = $conn->query($sql);
if (!$result) {
    $error = $conn->error;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Check Storage Engines</title>
</head>

<body>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
    <table>
        <tr>
            <th>Storage Engine</th><th>Supported</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['Engine']; ?></td><td><?= $row['Support']; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php }?>
</body>
</html>