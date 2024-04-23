<?php

session_start();
echo "<h1>Galgje</h1>";
if (isset($_SESSION["fout"]) == false) {
    $_SESSION["fout"] = 1;
}
$letters = range("a", "z");
$woord = $_SESSION['woord'];
$counter = 0;
if (isset($_SESSION["correctwoord"]) == false) {
    for ($countchar = 0; $countchar < strlen($woord); $countchar++) {
        $_SESSION["correctwoord"][$countchar] = "_";
    }
}
if (isset($_POST['char'])) {
    for ($teller = 0; $teller < strlen($woord); $teller++) {
        if ($_POST['char'] == $woord[$teller]) {
            $_SESSION["correctwoord"][$teller] = $_POST['char'];
        } else {
            $counter += 1;
        }
    }
    if (strlen($woord) - $counter == 0) {
        $_SESSION["fout"]++;
    }
}
foreach ($_SESSION["correctwoord"] as $value) {
    echo "<a>";
    echo $value . " ";
    echo "<a>";
}
$_SESSION["wincounter"] = 0;
foreach ($_SESSION["correctwoord"] as $prot) {
    if ($prot === "_") {
        $_SESSION["wincounter"] += 1;
    }
}
if ($_SESSION["wincounter"] == 0) {
    echo '<h1>Goed gedaan, je hebt gewonnen!</h1>';
    $_SESSION["verloren"] = true;
}
switch ($_SESSION["fout"]) {
    case 1:
        echo "<img src='galgje1.png' alt='galg1' style='width: 500px;'>" . PHP_EOL;
        break;
    case 2:
        echo "<img src='galgje2.png' alt='galg2' style='width: 500px;'>" . PHP_EOL;
        break;
    case 3:
        echo "<img src='galgje3.png' alt='galg3' style='width: 500px;'>" . PHP_EOL;
        break;
    case 4:
        echo "<img src='galgje4.png' alt='galg4' style='width: 500px;'>" . PHP_EOL;
        break;
    case 5:
        echo "<img src='galgje5.png' alt='galg5' style='width: 500px;'>" . PHP_EOL;
        break;
    case 6:
        echo "<img src='galgje6.png' alt='galg6' style='width: 500px;'>" . PHP_EOL;
        break;
    case 7:
        echo "<img src='galgje77.png' alt='galg7' style='width: 500px;'>" . PHP_EOL;
        break;
    case 8:
        echo '<h1>Womp, Womp! Verloren</h1>' . PHP_EOL;
        $_SESSION["verloren"] = true;
        echo 'the correct answer was: ' . $_SESSION['woord'] . PHP_EOL;
        echo "<img src='gameover.png' alt='galg8' style='width: 500px;'>" . PHP_EOL;
        break;
}
if (isset($_SESSION["verloren"]) == false) {
    $gebruikt = '';

    if (isset($_POST['gebruikt'])) {
        $gebruikt = $_POST['gebruikt'] . $_POST['char'];
    }
    $letters = range("a", "z");
    echo '<form action="spel.php" method="POST">';
    echo '<input value="' . $gebruikt . '" hidden name="gebruikt">';
    echo '<p>Kies een van de volgende letters:</p>';
    foreach ($letters as $gok) {
        if (str_contains($gebruikt, $gok)) {
            echo "<input type='submit' name='char'  disabled class='disabled' value='$gok'>";
        } else {
            echo "<input type='submit' name='char' style='width: 50px; height: 50px;' value='$gok'>";
        }
    }
}
echo '<form action="spel.php" method="POST">
<input type="submit" name="reset" value="Terug" style="width: 110px; height: 65px";>
</form>';
if (isset($_POST["reset"])) {
    session_destroy();
    header('Location: galgje.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>galgje</title>
</head>

<body>
</body>

</html>