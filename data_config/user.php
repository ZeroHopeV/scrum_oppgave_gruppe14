<?php
require_once 'session.php';

if (isset($_POST["submit"])) {
    try {
        require_once 'conn.php';

        $passord = trim($_POST["passord"]);
        $bekreft = trim($_POST["bekreft"]);

        if ($passord !== $bekreft) {
            $_SESSION["message"] = "Passordene er ikke like";
            header("Location: ../index.php");
        } else {
            $hash = password_hash($passord, PASSWORD_DEFAULT);

            $query = "INSERT INTO deltaker (brukernavn, telefonnr, passord) VALUES (:navn, :telefon, :passord);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":navn", $_POST["brukernavn"]);
            $stmt->bindParam(":telefon", $_POST["telefon"]);
            $stmt->bindParam(":passord", $hash);
            $stmt->execute();

            session_unset();
            $_SESSION["id"] = $pdo->lastInsertId();
            header("Location: ../main.php");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
