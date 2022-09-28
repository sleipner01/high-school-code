<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/i.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Nettside</h1>

    <?php
        $tall = 105;
        echo "<p>Tallet er $tall. </p>";

        $tall = 42;
        echo "<p>Nå er tallet $tall. </p>";

        $storttall = $tall * $tall;
        echo "$storttall er $tall ganget med $tall.";
    ?>

</body>
</html>