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
    <h1>Løkker</h1>

    <?php
        /*Eks "While" */
        $tall = 0;

        while($tall <= 10) {
            echo "$tall";
            $tall = $tall + 1;
        }
    ?>
    <br><br><br>
    <?php

        /* Eks "For" */
        for($i=0; $i<=8; $i++) {
            echo "Verdien av variablen er: $i. <br><br><br>";
        }
    ?>
    <br><br><br>
    <?php
        $shit = 1;

        while($shit <= 15) {
            echo "$shit, ";
            $shit++;
        }
    ?>
    <br>
    <?php
        for($t=1; $t<=15; $t++) {
            echo "$t, ";
        }
    ?>
    <br><br>
    <?php
        $it = 1;
        while ($it <= 42) {
            echo "IT1, ";
            $it++;
        }
    ?>
    <br>
    <?php
        for($ti = 1; $ti <= 42; $ti++) {
            echo "IT1, ";
        }
    ?>
    <br><br><br>
    <?php
        $to = 2;
        while($to <= 20) {
            echo "$to, ";
            $to =$to + 2;
        }
    ?>
    <br><br>
    

</body>
</html>