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
    <h1>Skjemaer</h1>

    <form action="mottaskjema.php" method="GET">
        <p>Ditt navn</p>
        <input type="text" name="dittnavn"><br>
        <p>Hva er din favorittfilm?</p>
        <input type="text" name="favorittfilm">
        <br>
        <input type="submit" name="sendinn" value="Send inn">
    </form>
    <?php
        
    ?>
</body>
</html>