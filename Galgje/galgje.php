<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galgje spel</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateInput(event) {
            var input = event.target.value;
            var pattern = /^[a-zA-Z]+$/;
            if (!pattern.test(input)) {
                alert("Alleen letters zijn toegestaan. Voer een geldig woord in.");
                event.target.value = '';
            }
        }
    </script>
</head>

<body>

    <h1>Galgje</h1>
    <div>
        <form action="random.php" method="POST">
            <input type="submit" value="Random woord" name="random"></input>
        </form>
    </div>

    <div>
        <form action="eigenkeuze.php" method="POST">
            <input type="text" name="galgje" oninput="validateInput(event)" required>
            <input type="submit" value="Speel met dit woord" name="choice"></input>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $galgje = $_POST["galgje"];

        if (ctype_alpha($galgje)) {
            echo "Ingevoerde woord: " . $galgje;
        } else {
            echo "Alleen letters zijn toegestaan. Voer een geldig woord in.";
        }
    }
    ?>

</body>

</html>