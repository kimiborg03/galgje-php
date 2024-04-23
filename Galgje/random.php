<?php

session_start();
$woorden = array(
    "tafel", "stoel", "televisie", "laptop", "klok", "tijd", "gebouw", "grasveld", "kijken", "ontdekken", "gezondheid", "verkeer", "informeel"
);

if (isset($_POST["random"])) {
    $index = array_rand($woorden);
    $_SESSION["woord"] = $woorden[$index];
    header('Location: spel.php');
}
