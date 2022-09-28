	<?php 
	include 'header.php';
	include 'connection_info.php';
	
	if(isset($_POST["leggTil"])) {
			
		
		//Lagrer feltene i variable
		$fornavn = $_POST["fornavn"];
		$etternavn = $_POST["etternavn"];
		$adresse = $_POST["adresse"];
		$postnummer = $_POST["poststed"];		
	
		$sql = "INSERT INTO person (fornavn, etternavn, adresse, postnummer) VALUES ('$fornavn','$etternavn','$adresse','$postnummer')";
	
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført. ";
		}else{
			echo "Noe gikk galt med spørringen $sql ($kobling->error).";
		}
	}
	?>

	<form method="POST">
	
		<label for="fornavn">Fornavn</label>
		<input type="text" name="fornavn"><br />
		<label for="etternavn">Etternavn</label>
		<input type="text" name="etternavn"><br />
		<label for="adresse">Adresse</label>
		<input type="text" name="adresse"><br />
		<label for="poststed">Poststed</label>
		<?php
		
			
		
			//Lag nedtrekksliste med sjanger
			echo "<select name='poststed'>";
			$sql = "SELECT * FROM poststed ORDER BY postnummer";
			$resultat = mysqli_query($kobling, $sql);
			
			if(!$resultat) {
				die("Fikk ikke tak i dataene: " . mysql_error());
			}
			else {
				//Legg til data i listen
				if(mysqli_num_rows($resultat) > 0) {
					while($rad = mysqli_fetch_array($resultat)) {
						$postnummer = $rad["postnummer"];
						$poststed = $rad["poststed"];
						echo "<option value=$postnummer>$postnummer $poststed</option>";
					}
				}
				else {
					echo "Finner ingen data i database";
				}
			}

			mysqli_free_result($resultat);
			echo "</select></br>";
		?>
		<input type="submit" name="leggTil" value="Legg til person">
	</form>

	<?php	
	include 'footer.php';
	?>