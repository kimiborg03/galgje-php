<?php

session_start();

if (isset($_POST["choice"])) {
    $woord = strtolower($_POST["galgje"]);
    $_SESSION["woord"] = $woord;
    header('Location: spel.php');
}
