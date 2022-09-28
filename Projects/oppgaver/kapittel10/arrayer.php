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
    <?php
        $figurer = array("Langbein", "Asterix", "Skrue McDuck", "Mikke mus", "Donald Duck", "Tom", "Jerry");

        echo "<h3>Noen tegneseriefigurer</h3>";
        for($i=0; $i < count($figurer); $i++) {
            echo "Figur med indeks $i: $figurer[$i] <br>";
        }

        echo '<h3>Arrayen $figurer</h3>';

        foreach($figurer as $value) {
            echo "$i => $value<br>";
        }
        echo $figurer[2];
    ?>
    <br><br>
    <h3>Assisiativt array</h3>
    <?php
        $art = array("Langbein"=>"Hund", "Skrue McDuck"=>"And", "Donald Duck"=>"And", "Mikke mus"=>"Mus");

        echo "<p>Langbein er en " . $art["Langbein"] . ".</p>";
        echo "<p>Skrue McDuck er en " . $art["Skrue McDuck"] . ".</p>";
        echo "<p>Donald Duck er også en " . $art["Donald Duck"] . ".</p>";

        echo '<h3>Arrayen $art</h3>';
        var_dump($art);
    ?>
    <h3>Sum</h3>
    <?php
        $tall = array(1, 2, 3, 4, 5, 6);
        $sum_array = $tall[0]+$tall[1]+$tall[2]+$tall[3]+$tall[4]+$tall[5];
        $a = 0;

        echo "$tall[0]<br>";
        echo "$sum_array<br>";
        echo "</p>Summen er " . array_sum($tall) . ".</p>";

        for ($i = 0; $i < count($tall); $i++) {
            $a = $a + $tall[$i];
        }
        echo $a;
    ?>
    <br><br><h3>Tilfeldig kort</h3>
    <?php
        $tall =  rand(1, 52);
        $type = rand(1,4);

        if ($type = 1) {
            $type = "Ruter ";
        }   else if ($type = 2) {
            $type = "Kløver ";
        }   else if( $type = 3) {
            $type = "Hjerter ";
        }   else if($type = 4) {
            $type = "Spar ";
        }

        echo $type;
        echo $tall;
    ?>

</body>
</html>