<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vis artist</title>
</head>
<body>

<a href="../index.html">Tilbake til registrering</a>

<?php
$dbtjener = "localhost";
$dbbruker = "root";
$dbpassord = "";
$dbdatabase = "artister";

$kobling = new mysqli($dbtjener, $dbbruker, $dbpassord, $dbdatabase);

if($kobling->connect_error) {
    die("Noe gikk galt: " . $kobling->connect_error);
}

$kobling->set_charset("utf8");

$sql = "SELECT * FROM artist";

$resultater = $kobling->query($sql);

if($resultater->num_rows > 0) {
    echo "<p>Søket ga $resultater->num_rows treff</p>";
    echo "<table>
            <tr>
                <th>Navn</th>
                <th>Sjanger</th>
                <th>Land</th>
                <th>Opprettet</th>
            </tr>";
} else {
    echo "<p>Beklager, søket ga ingen treff</p>";
}

while($rad = $resultater->fetch_assoc()) {
    $navn = $rad["navn"];
    $sjanger = $rad["sjanger"];
    $land = $rad["land"];
    $opprettet = $rad["opprettet"];

    echo "<tr>
            <td>$navn</td>
            <td>$sjanger</td>
            <td>$land</td>
            <td>$opprettet</td>
        </tr>";
}
echo "</table>";

?>

</body>
</html>