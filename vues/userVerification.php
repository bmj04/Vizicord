<?php
session_start();
if (empty($_SESSION['userId'])) {
    header("Location: http://localhost/Vizicord/vues/Accueil.php");
    exit();
}
?>