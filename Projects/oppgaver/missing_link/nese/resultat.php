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
    <h1>Topplister</h1>
    <?php
        $tjener = "localhost";
        $brukernavn = "root";
        $passord = "";
        $database = "nese";
    
        $kobling = new mysqli($tjener, $brukernavn, $passord, $database);
    
      $kobling->set_charset("utf8");
    
            $sql = "SELECT * FROM nesehaar ORDER BY lengde DESC";
            $resultat = $kobling->query($sql);
    
        echo "<div class='liste'>";
            echo "<ol>";
                while($rad = $resultat->fetch_assoc()) {
                $deltager = $rad["deltager"];
                $lengde = $rad["lengde"];
        
                    echo "<li>" . "$deltager, $lengde" . "cm" . "</li>";
            }
            echo "</ol>";
        echo "</div>";
    ?>
</body>
</html>