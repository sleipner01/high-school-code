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
    <a href="legg_inn_flyreise.html" style="font-size= 50px;">Feil side. Trykk her for å registrere flyreise</a>
    <?php
        $avreise = $_POST["avreise"];
        $destinasjon = $_POST["ankomst"];
        $avreisetidspunkt = $_POST["avreisetidspunkt"];
        $ankomsttidspunkt = $_POST["ankomsttidspunkt"];

        if(isset($_POST["avreise"])) {
            $avreise = $_POST["avreise"];
            echo "<h4>Avreisen er ifra $avreise</h4>";
        } else {
            die("Du må angi en avreise.");
        }

        //Tilkobling database
        $dbc = mysqli_connect('localhost', 'root', '', 'flyreise')
            or die('Error connecting to MySQL server.');

        $query = "INSERT INTO flybillett (avreise, destinasjon, avgang, ankomst) 
                VALUES ('$avreise', '$destinasjon', '$avreisetidspunkt', '$ankomsttidspunkt')";

        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');

        mysqli_close($dbc);

        echo "<h3>Følgende avreise er registrert</h3>";
        echo "Avreise fra $avreise <br>";
        echo "Destinasjon er $destinasjon <br>";
        echo "Avreisetidspunkt er $avreisetidspunkt <br>";
        echo "Ankomst er klokka $ankomsttidspunkt <br>";
    ?>
</body>
</html>