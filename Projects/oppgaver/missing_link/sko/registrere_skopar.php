<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registrer sko</title>
</head>
<body>
  <h2>Legg et skopar i databasen</h2>

<?php
  $merke = $_POST['merke'];
  $farge = $_POST['farge'];
  $size = $_POST['storleik'];

  $dbc = mysqli_connect('localhost', 'root', '', 'sko')
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO sko (merke, farge, storrelse)" .
    " VALUES ('$merke', '$farge', '$size')";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

  mysqli_close($dbc);

  echo 'Følgende sko er registrert:<br />';
  echo 'Merke: ' . $merke . '<br />';
  echo 'Farge: ' . $farge . '<br />';
  echo 'Størrelse: ' . $size . '<br />';
?>

</br>
<a href="vise_personer.php">Se registrerte personer</a> 
</body>
</html>
