<?php
require_once 'session.php';
require_once 'conn.php';

if (isset($_POST["submit"])) {
    try {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
}
