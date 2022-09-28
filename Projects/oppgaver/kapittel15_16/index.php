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
    <h4>Første SQL spørring</h4>
    <?php
        //Tilkoblingsinformasjon
        $tjener = "localhost";
        $brukernavn = "root";
        $passord = "";
        $database = "tegneseriefigurer";

        //opprette en kobling
        $kobling = new mysqli($tjener, $brukernavn, $passord, $database);

        //Sjekke om koblingen funker
        if ($kobling->connect_error) {
            die("Noe gikk galt: " . $kobling->connect_error);
        }  else {
            echo "Koblingen virker.";
        }
        //Angi UTF-8 som tegnsett
        $kobling->set_charset("utf8");

        $sql = "SELECT * FROM blad";
        $resultat = $kobling->query($sql);

        echo "Spørringen: $sql <br>Ga $resultat->num_rows rader.";
        echo "<br><br><br> <h4>Utehenting av info</h4>";

        while($rad = $resultat->fetch_assoc()) {
            $blad_id = $rad["blad_id"];
            $bladnavn = $rad["bladnavn"];

            echo "$blad_id $bladnavn<br>";
        }

        //Annen kode for det samme
        $sql = "SELECT * FROM blad";
        $resultat = $kobling->query($sql);

        echo "<br><h4>Annen kode for det samme</h4>";

        while($rad = $resultat->fetch_assoc()) {
            echo "$rad[blad_id] $rad[bladnavn] <br>";
        }
    ?>
    <?php
        //Spørring som liste
        $sql = "SELECT * FROM blad";
        $resultat = $kobling->query($sql);

        echo "<br><h4>Som Liste</h4>";
            echo "<ul>";
                while($rad = $resultat->fetch_assoc()) {
                    $blad_id = $rad["blad_id"];
                    $bladnavn = $rad["bladnavn"];

                    echo "<li>$blad_id. $bladnavn</li>";
                }
            echo "</ul>"
    ?>
    <br><br>
    <?php
        //Spørring som tabell
        $sql = "SELECT * FROM blad";
        $resultat = $kobling->query($sql);
        
        echo "<h4>Spørring som tabell</h4>";
            echo "<table>";
                echo "<tr>";
                    echo "<th>blad_id</th>";
                    echo "<th>bladnavn</th>";
                echo "</tr>";

                while($rad = $resultat->fetch_assoc()) {
                    $blad_id = $rad["blad_id"];
                    $bladnavn = $rad["bladnavn"];

                    echo "<tr>";
                        echo "<td>$blad_id</td>";
                        echo "<td>$bladnavn</td>";
                    echo "</tr>";
                }
            echo "</table>";

            echo "<hr><br>";

            //Enkel spørring om all info i tabell "figur"
            $sql = "SELECT * FROM figur";
            $resultat = $kobling->query($sql);
            
            echo '<h4>Enkel spørring om all info i tabell "figur"</h4>';
            while($rad = $resultat->fetch_assoc()) {
                $figur_id = $rad["figur_id"];
                $figurnavn = $rad["figurnavn"];
                $aarstall = $rad["aarstall"];
                $blad_id = $rad["blad_blad_id"];

                echo "$figur_id $figurnavn $aarstall $blad_id<br>";
            }

            echo "<br>";

            //Uthenting fra flere tabeller
            echo '<h4>Uthenting fra flere tabeller, ved bruk av "JOIN"</h4>';

            $sql = "SELECT figurnavn, bladnavn FROM figur JOIN blad ON figur.blad_blad_id = blad.blad_id";
            $resultat = $kobling->query($sql);

            echo "<table>";
                echo "<tr>";
                 echo "<th>figurnavn</th>";
                 echo "<th>bladnavn</th";
                echo "</tr>";

                while($rad = $resultat->fetch_assoc()) {
                    $figurnavn = $rad["figurnavn"];
                    $bladnavn = $rad["bladnavn"];

                    echo "<tr>";
                        echo "<td>$figurnavn</td>";
                        echo "<td>$bladnavn</td>";
                    echo "</tr>";
                }
            echo "</table>";

            //Sending av variabler
            echo "<h4>Sending av variabler</h4>";

            $sql = "SELECT * FROM blad";
            $resultat = $kobling->query($sql);

            echo "<table>";
                echo "<tr>";
                    echo "<th>blad_id</th>";
                    echo "<th>bladnavn</th>";
                echo "</tr>";

                while($rad = $resultat->fetch_assoc()) {
                    $blad_id = $rad["blad_id"];
                    $bladnavn = $rad["bladnavn"];

                    echo "<tr>";
                        echo "<td>$blad_id</td>";
                        echo "<td><a href='figurer.php?blad_id=$blad_id&bladnavn=$bladnavn'>$bladnavn</a></td>";
                    echo "</tr>";
                }
            echo "</table>";
    ?>
</body>
</html>