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
        $terningkast = rand(1,6);

        if ($terningkast == 1) {
            echo "<h1>Hei taper</h1>";
        }   else if ($terningkast == 6) {
            echo "<h1>Hei Magnus</h1>";
        }   else {
            echo "<h1>Hei Kim</h1>";
        }

        echo "Du fikk $terningkast på terningen. <br>";

        echo "Det er ";

        if($terningkast == 1) {
            echo "helt jævlig! Du suger dritt.<br><br><br>";
        }   else if($terningkast == 6) {
            echo "sjuukt bra! Du er like god som meg.<br><br><br>";
        }   else {
            echo "like dritt som Kim.<br><br><br>";
        }

        $maaned = date("m");
        echo "Det er ";

        if ($maaned == 1 ) {
            echo "Januar<br><br><br>";
        }   else {
            echo "ikke Januar<br><br><br>";
        }
        

        $year = date("Y");
        echo "Det er $year<br>";
        $birth = rand(1990,2006);
        echo "Du er født i $birth<br>";

        if ($year - $birth > 18) {
            echo "Du er over 18 år<br>";
        }   else if ($year - $birth == 18) {
                echo "Du er eller blir 18 år<br>";
        }   else if ($year - $birth < 18) {
            echo "Du er ikke over 18 år<br>";
        }
    ?>

</body>
</html>