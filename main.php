<?php
require_once "data_config/conn.php";

$query = "SELECT id, brukernavn, telefonnr FROM deltaker;";
$stmt = $pdo->prepare($query);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wolfenstein LAN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<p>Wolfenstein LAN</p>

<form action="data_config/logout.php" method="post" class="user">
    <input type="submit" name="submit" value="Logg ut">
</form>

<?php
if ($stmt->rowCount() > 0) {
?>
<table>
    <tr>
        <th>ID</th>
        <th>Brukernavn</th>
        <th>Telefonnummer</th>
    </tr>
    <?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
<?php
}
?>

</body>
</html>
