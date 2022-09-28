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
    <h1>Motta</h1>
    <?php
        if(isset($_GET["blad_id"])) {
            $blad_id = $_GET["blad_id"];
            echo "<h2>Blad_id-en er $blad_id</h2>";
        } else {
            die("Du må angi et blad.");
        }
        if(isset($_GET["bladnavn"])) {
            $bladnavn = $_GET["bladnavn"];
            echo "<h2>Bladnavnet er $bladnavn</h2>";
        } else {
            die("Du må angi et bladnavn.");
        }

        echo "<br><br>";

        //Tilleggsinformasjon
        $tjener = "localhost";
        $brukernavn = "root";
        $passord = "";
        $database = "tegneseriefigurer";

        //Opprette en kobling
        $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

        //Sjekk om koblingen virker
        if ($kobling->connect_error) {
            die("Noe gikk galt: " . $kobling->connect_error);
        }

        //Angi UTF-8 som tegnsett
        $kobling->set_charset("utf8");

        $sql = "SELECT * FROM figur WHERE blad_blad_id=$blad_id";
        $resultat = $kobling->query($sql);

        echo "<h3>FAQ; Når så figurene fra $bladnavn dagens lys?</h3>";

        while($rad = $resultat->fetch_assoc()) {
            $figurnavn = $rad["figurnavn"];
            $aarstall = $rad["aarstall"];

            echo "Figuren $figurnavn så dagens lys i $aarstall. <br>";
        }
    ?>
</body>
</html>