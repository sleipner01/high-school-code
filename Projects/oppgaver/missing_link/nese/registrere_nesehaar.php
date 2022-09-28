<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registrer nesehårslengde</title>
</head>
<body>
  <h2>Legg inn nytt rekordforsøk</h2>

<?php
  $deltager = $_POST['deltager'];
  $lengde = $_POST['lengde'];
  $dato = $_POST['registreringsdato'];

  $dbc = mysqli_connect('localhost', 'root', '', 'nese')
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO nesehaar (deltager, lengde, registreringsdato)" .
    " VALUES ('$deltager', '$lengde', '$dato')";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

  mysqli_close($dbc);

  echo 'Følgende rekordforsøk er registrert:<br />';
  echo 'Deltager: ' . $deltager . '<br />';
  echo 'Lengde: ' . $lengde . '<br />';
  echo 'Dato: ' . $dato . '<br />';
?>
<a href="nesehaar.html"><h4>Registrer nytt forsøk her</h4></a>
<a href="resultat.php"><h2>Se topplistene her</h2></a>
</body>
</html>
