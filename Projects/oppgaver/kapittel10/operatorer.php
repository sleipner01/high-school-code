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
        $tall1 = 17;
        $tall2 = 9;
        $tekst1 = "Karl";
        $tekst2 = "Johan";

        $sum = $tall1 + $tall2;
        $differanse = $tall1 - $tall2;
        $produkt = $tall1 * $tall2;
        $kvotient = $tall1 / $tall2;

        $langtekst = $tekst1 . $tekst2;
        $bedretekst = $tekst1 . " " . $tekst2 . "s gate";

        echo "Summen blir $sum <br>";
        echo "Differansen blir $differanse <br>";
        echo "Produktet blir $produkt <br>";
        echo "Kvotienten blir $kvotient <br>";

        echo "<br><br>";

        echo "$langtekst <br>";
        echo "$bedretekst <br><br><br>";


        echo "<a href='https://www.matematikk.org' target='_blank'>Matematikk.org</a><br>";
        echo "<a href='https://www.matematikk.net' target='_blank'>Matematikk.net | Mye bedre nettside </a>";
    ?>
</body>
</html>