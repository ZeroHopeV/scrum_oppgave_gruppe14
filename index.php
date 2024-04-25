<?php
require_once "data_config/conn.php";
require_once "data_config/session.php";
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

<?php
if (isset($_SESSION["message"])) {
    echo '<p>'.$_SESSION["message"].'</p>';
    unset($_SESSION["message"]);
}
?>

<form method="post" action="data_config/login.php">
    <p>Login</p>
    <input type="text" name="brukernavn" placeholder="Brukernavn" required>
    <input type="password" name="passord" placeholder="Passord" required>
    <input type="submit" name="submit" value="Logg inn">
</form>

<form method="post" action="data_config/user.php">
    <p>Registrering</p>
    <input type="text" name="brukernavn" placeholder="Brukernavn" required>
    <input type="text" name="telefon" placeholder="Telefonnummer" required>
    <input type="password" name="passord" placeholder="Passord" required>
    <input type="password" name="bekreft" placeholder="Bekreft passord" required>
    <input type="submit" name="submit" value="Registrer">
</form>

</body>
</html>
