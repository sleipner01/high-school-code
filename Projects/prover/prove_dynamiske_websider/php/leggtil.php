<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lagt til</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <?php
        //Henter informasjonen som variabler
        $navn = $_POST['navn'];
        $sjanger = $_POST['sjanger'];
        $land = $_POST['land'];
        $opprettet = $_POST['opprettet'];

        //Oppretter en kobling til databasen
        $dbc = mysqli_connect('localhost', 'root', '', 'artister')
        or die('Error connecting to MySQL server. Contact author for help.<br>
                <a href="../index.html">Go back</a>');
        
        $dbc->set_charset("utf8");

        //Lager en varibel for å sette inn informasjonen ifra index.html
        $query = "INSERT INTO artist (navn, sjanger, land, opprettet)" .
            " VALUES ('$navn', '$sjanger', '$land', '$opprettet')";

        //Sender informasjonen til databasen
        $result = mysqli_query($dbc, $query)
            or die('Error querying database. Contact author for help.<br>
                    <a href="../index.html">Go back</a>');

        //Avslutter koblingen til databasen
        mysqli_close($dbc);

        //Skriver ut verdiene som er sendt til databasen
        echo '<h2>Følgende artist er registrert:</h2>';
            echo 'Artistnavn: ' . $navn . '.<br>';
            echo 'Sjanger: ' . $sjanger . '.<br>';
            echo 'Hjemland: ' . $land . '.<br>';
            echo 'Opprettet: ' . $opprettet . '.<br>';

    ?>
    <!--En lenke for å kjapt kunne legge til flere artister-->
    <a href="../index.html"><h3>Registerer flere artister</h3></a>
    <a href="visartist.php"><h3>Vis alle artister</h3></a>
</body>
</html>