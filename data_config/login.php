<?php
require_once 'session.php';

if (isset($_POST["submit"])) {
    try {
        require_once 'conn.php';

        $passord = trim($_POST["passord"]);

        $query = "SELECT * FROM deltaker WHERE brukernavn = :navn;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":navn", $_POST["brukernavn"]);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $verify = $result["passord"];
            if (password_verify($passord, $verify)) {
                session_unset();
                $_SESSION["id"] = $result["id"];
                header("Location: ../main.php");
            } else {
                $_SESSION["message"] = "Passordet er feil";
                header("Location: ../index.php");
            }
        } else {
            $_SESSION["message"] = "Brukernavn er ikke funnet";
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
