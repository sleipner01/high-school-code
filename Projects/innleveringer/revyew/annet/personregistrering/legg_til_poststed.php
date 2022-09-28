<?php
include 'header.php';
include 'connection_info.php';
	
	if(isset($_POST["leggTil"])) {
		
		//Lagrer feltene i variable
		$postnummer = $_POST["postnummer"];
		$poststed = $_POST["poststed"];
				
		$sql = "INSERT INTO poststed (postnummer, poststed) VALUES ('$postnummer', '$poststed')";
	
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført. ";
		}else{
			echo "Noe gikk galt med spørringen $sql ($kobling->error).";
		}
	}
?>

<form method="POST">
	<label for="postnummer">Postnummer</label>
	<input type="text" name="postnummer"></br>
	<label for="postnummer">Poststed</label>
	<input type="text" name="poststed"></br>
	<input type="submit" name="leggTil" value="Legg til">
</form>

<?php
include 'footer.php';
?>