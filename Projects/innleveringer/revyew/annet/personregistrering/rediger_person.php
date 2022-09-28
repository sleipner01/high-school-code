	<?php 
	include 'header.php';
	include 'connection_info.php';
	
	if(isset($_POST["redigerPerson"])) {
		
		//Lagrer feltene i variable
		$personId = $_POST["person"];
	
		$sql = "SELECT * FROM person WHERE person_id = $personId";
		$resultat = mysqli_query($kobling, $sql);
			
			if(!$resultat) {
				die("Fikk ikke tak i dataene: " . mysql_error());
			}
			else {
				echo '<form method = "POST">';
				//Legg til data i listen
				if(mysqli_num_rows($resultat) > 0) {
					while($rad = mysqli_fetch_array($resultat)) {
						$id = $rad["person_id"];
						$fornavn = $rad["fornavn"];
						$etternavn = $rad["etternavn"];
						$adresse = $rad["adresse"];
						echo '<input type="hidden" name="id" value=' . $id . ' ><br />';
						echo '<label for="fornavn">Fornavn</label>';
						echo '<input type="text" name="fornavn" value=' . $fornavn . ' ><br />';
						echo '<label for="etternavn">Etternavn</label>';
						echo '<input type="text" name="etternavn" value=' . $etternavn . ' ><br />';
						echo '<label for="adresse">Adresse</label>';
						echo '<input type="text" name="adresse" value=' . $adresse . ' ><br />';
					}
				}
				else {
					echo "Finner ingen data i database";
				}
				echo '<input type="submit" name="oppdaterPerson" value="Oppdater opplysninger">';
				echo "</form>";
			}
	}
	
	if(isset($_POST["oppdaterPerson"])) {
		
		//Lagrer feltene i variable
		$id = $_POST["id"];
		$fornavn = $_POST["fornavn"];
		$etternavn = $_POST["etternavn"];
		$adresse = $_POST["adresse"];
		
		$sql = "UPDATE person SET fornavn='$fornavn', etternavn='$etternavn', adresse = '$adresse' WHERE person_id = '$id'";
	
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført. ";
		}else{
			echo "Noe gikk galt med spørringen $sql ($kobling->error).";
		}
	}
	?>

	<form method="POST">
	
		<label for="person">Velg person</label>
		<?php
			//Lag nedtrekksliste med sjanger
			echo "<select name='person'>";
			$sql = "SELECT * FROM person ORDER BY fornavn";
			$resultat = mysqli_query($kobling, $sql);
			
			if(!$resultat) {
				die("Fikk ikke tak i dataene: " . mysql_error());
			}
			else {
				//Legg til data i listen
				if(mysqli_num_rows($resultat) > 0) {
					while($rad = mysqli_fetch_array($resultat)) {
						$id = $rad["person_id"];
						$fornavn = $rad["fornavn"];
						$etternavn = $rad["etternavn"];
						
						echo "<option value=$id>$fornavn $etternavn</option>";
					}
				}
				else {
					echo "Finner ingen data i database";
				}
			}

			mysqli_free_result($resultat);
			echo "</select></br>";
		?>
		<input type="submit" name="redigerPerson" value="Rediger person">
	</form>
	
	<?php	
	include 'footer.php';
	?>