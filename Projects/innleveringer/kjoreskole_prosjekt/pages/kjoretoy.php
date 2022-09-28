<!--Info om alle kjørtøy, Øverst: mulighet for å legge inn kjøretøy, slette kjøretøy og filtrere-->
<?php
    $page = 'kjoretoy';
    include '../includes/header.php';
    include '../database/connection.php';
?>

<div class="main">
    <div class="leggtil">
    <?php
        if(isset($_POST['legg-til-kjoretoy'])) {

                include '../includes/upload.php';

                $merke = $_POST["merke"];
                $modell = $_POST["modell"];
                $type = $_POST["type"];
                $aar = $_POST["aar"];
                $klasse = $_POST["klasse"];
                $idkurssted = $_POST["idkurssted"];
            
                $sql = "INSERT INTO kjoretoy (merke, modell, type, år, klasse, kurssted_idkurssted, bilde_navn) 
                        VALUES ('$merke','$modell', '$type', '$aar', '$klasse', '$idkurssted', '$bilde_navn')";
            
                if($kobling->query($sql)) {
                    echo "<div class='code-correct'>Kjøretøyet er blitt lagt til i databasen!</div>";
                }else{
                    echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
                }
        }

        if(isset($_POST['leggTil'])) {
            echo'<form method="POST" enctype="multipart/form-data">';
                echo'<label>Merke</label><br>';
                echo'<input type="text" required name="merke"><br>';
                echo'<label>Modell</label><br>';
                echo'<input type="text" required name="modell"><br>';
                echo'<label>Type (optional)</label><br>';
                echo'<input type="text" name="type"><br>';
                echo'<label>Årsmodell</label><br>';
                echo'<input type="number" required name="aar" value="2019"><br>';
                echo'<label>Klasse</label><br>';
                echo'<select required name="klasse">
                        <option value="A">Motorsykkel - A</option>
                        <option value="AM">Moped -  AM</option>
                        <option value="B">Personbil - B</option>
                        <option value="BE">Personbil med tilhenger - BE</option>
                        <option value="C/CE">Lastebil - C/CE</option>    
                        <option value="D1/D1E">Minibuss - D1/D1E</option>
                        <option value="T">Traktor - T</option>                        
                        <option value="S">Snøscooter - S</option>                                           
                     </select><br>';
                
                    echo'<label>Lokale</label><br>';                     
                     echo'<select name="idkurssted">';
                     echo'<option hidden></option>';
     
                     $sql= "SELECT idkurssted, stedsnavn, adresse, nummer FROM kurssted;";
                     $result = mysqli_query($kobling, $sql);
     
                     while($row = $result->fetch_assoc()) {
                         $idkurssted = $row["idkurssted"];
                         $stedsnavn = $row["stedsnavn"];
                         $adresse = $row["adresse"];
                         $nummer = $row["nummer"];
     
                         echo '<option value=' . $idkurssted . '>' . $stedsnavn . ' - ' . $adresse . ' ' . $nummer . '</option>';
                     }
                     echo'</select><br>';
                
                echo'<label>Bilde</label><br>';
                echo'<input type="file" name="file"><br>';
                
                echo'<input type="submit" value="Legg til kjøretøy" name="legg-til-kjoretoy" class="submit">';
            echo'</form>';
        }   else {
            echo'<form method="POST">';
                echo'<input type="submit" value="Legg til nytt kjøretøy &rarr;" name="leggTil" class="add">';
            echo'</form>';
        }
    ?>
    <hr>
    </div>
    <?php
        include '../includes/filter-kjoretoy.php';

        $sql = 'SELECT * FROM kjoretoy JOIN kurssted ON kjoretoy.kurssted_idkurssted = kurssted.idkurssted;';

        if(isset($_GET["filter"])) {
            $idkurssted = $_GET["filter"];

            $sql = "SELECT * FROM kjoretoy JOIN kurssted ON kjoretoy.kurssted_idkurssted = kurssted.idkurssted WHERE idkurssted = '$idkurssted';";
        }
        

        if(isset($_POST["sort-filter"])) {
                
            $sort = $_POST["sort"];
            $filter = $_POST["filter"];
    
           if($filter == "0") {
               $sql = "SELECT * FROM kjoretoy JOIN kurssted ON kjoretoy.kurssted_idkurssted = kurssted.idkurssted 
                       ORDER BY $sort;";
           }    else {
                    $sql = "SELECT * FROM kjoretoy JOIN kurssted ON kjoretoy.kurssted_idkurssted = kurssted.idkurssted 
                            WHERE kurssted_idkurssted = '$filter' ORDER BY $sort;";
                }    
        
        }
    
        if(isset($_POST["search"])) {
                    $search = $_POST["search"];
    
                    $sql = "SELECT * FROM kjoretoy JOIN kurssted ON kjoretoy.kurssted_idkurssted = kurssted.idkurssted
                    WHERE merke LIKE '%$search%' 
                    OR modell LIKE '%$search%';";
                    //Denne må utvides
        }

        $resultat = mysqli_query($kobling, $sql);
        
        if(!$resultat) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                if(mysqli_num_rows($resultat) > 0) {

                    echo "<div class='kjoretoyliste'>";
                        echo "<div class='kjoretoyheader'>";
                            echo "<div></div>";
                            echo "<div>Merke</div>";
                            echo "<div>Modell</div>";
                            echo "<div>Klasse</div>";
                            echo "<div>Stasjonering</div>";
                        echo "</div>";

                    while($rad = mysqli_fetch_array($resultat)) {
                        $merke = $rad["merke"];
                        $modell = $rad["modell"];
                        $type = $rad["type"];
                        $aar = $rad["år"];
                        $klasse = $rad["klasse"];
                        $stedsnavn = $rad["stedsnavn"];
                        $adresse = $rad["adresse"];
                        $nummer = $rad["nummer"];
                        $bilde = $rad["bilde_navn"];

                        echo "<div class='kjoretoyinfo'>";
                            echo "<div><img src='../uploads/$bilde' alt='$bilde' width='80%'></div>";
                            echo "<div>$merke</div>";
                            echo "<div>$modell $type $aar</div>";
                            echo "<div>$klasse</div>";
                            echo "<div>$stedsnavn $adresse $nummer</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                }
                else {
                    echo "<div class='kursliste'>Det finnes ingen kjøretøy som samsvarer filteret, eller så er det ingen kjøretøy lagt til i databasen.</div>";
                }
            }

        
    ?>
</div>

<?php
    include '../includes/footer.html';
?>