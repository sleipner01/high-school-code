<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Takk for din henvendelse</h1>
    <h3>Dette er informasjonen om deg</h3>
    <?php
    //Sjekker om knappen er trykket.
    //I å fall har vi fått informasjon fra skjemaet

    if(isset($_GET["sendinn"])) {
        //Lagerer skjemafeltene i enklere variabler
        $navn = $_GET["dittnavn"];
        $film = $_GET["favorittfilm"];

        echo "<p>Du heter $navn, og din favorittfilm er $film</p>";
    }
    ?>
    <br><br><br>
    <?php
        if(isset($_GET["sendinn"])) {
            //Lagrer skjemafeltene i enklere variabler
            $navn = $_GET["navn"];
            $size = $_GET["storrelse"];

            echo "Ditt navn er $navn, og du har $size genetalie";
        }
    ?>
    <form method="GET">
        <p>Ditt navn</p>
        <input type="text" name="navn">
        <p>Størrelse</p>
        <input type="text" name="storrelse">

        <input type="submit" name="sendinn" value="Send inn">
    </form>
</body>
</html>