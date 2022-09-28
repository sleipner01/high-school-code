<!--Alle innkommende kurs. Øverst: mulighet for å legge inn/redigere kurs, og filtrere-->
<?php
    $page = 'kurs';
    include '../database/connection.php';
    include '../includes/header.php';
?>

<div class="main">
    <!--Legge inn kurs-->
    <div class="leggtil">
    <?php
        if(isset($_POST['legg-til-kurs'])) {
                $kurs = $_POST["kurs"];
                $varighet = $_POST["varighet"];
                $pris = $_POST["pris"];
                $dato = $_POST["dato"];
                $klokkeslett = $_POST["klokkeslett"];
            
                $sql1 = "INSERT INTO kurs (kurs, varighetMin, pris, dato) 
                        VALUES ('$kurs','$varighet', '$pris', '$dato $klokkeslett');";
                
                if($kobling->query($sql1)) {
                    echo "<div class='code-correct'>Kurset er blitt lagt til i tabellen!</div>";
                }else{
                    echo "<div class='code-failed'>Noe gikk galt med spørringen $sql1 ($kobling->error).</div>";
                }

                $sql = "SELECT idkurs FROM kurs ORDER BY kurs.idkurs DESC LIMIT 1;";

                $resultat = mysqli_query($kobling, $sql);

                while($rad = mysqli_fetch_assoc($resultat)) {
                    $idkurs = $rad["idkurs"];
                    echo $idkurs . "er id";
                }
                $idkurssted = $_POST["idkurssted"];

                $sql2 = "INSERT INTO kurssted_has_kurs (kurssted_idkurssted, kurs_idkurs)
                        VALUES ('$idkurssted', '$idkurs');";

                if($kobling->query($sql2)) {
                    echo "<div class='code-correct'>Idene er blitt lagt til!</div>";    
                }else{
                    echo "<div class='code-failed'>Noe gikk galt med spørringen $sql2 ($kobling->error).</div>";
                }
        }

        if(isset($_POST['leggTil'])) {
            echo'<form method="POST">';
                echo'<label>Kurs</label><br>';
                echo'<input type="text" required name="kurs"><br>';
                echo'<label>Varighet</label><br>';
                echo'<input type="text" required name="varighet"><br>';

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

                echo'<label>Pris</label><br>';                
                echo'<input type="text" required name="pris"><br>';
                echo'<label>Dato</label><br>';                
                echo'<input type="date" required name="dato"><br>';
                echo'<label>Klokkeslett</label><br>';                
                echo'<input type="time" required name="klokkeslett"><br>';
                echo'<input type="submit" value="Legg til kurs" name="legg-til-kurs" class="submit">';
            echo'</form>';
        } else {
            echo'<form method="POST">';
                echo'<input type="submit" value="Legg til kurs &rarr;" name="leggTil" class="add">';
            echo'</form>';
        }
    ?>
    <hr>
    </div>        
    <!--Filtrer kurs-->
    <?php include '../includes/filter-kurs.php';?>
    <!--Se alle kurs-->
    <?php
        $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs
                LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted;";
        
        if(isset($_GET["filter"])) {
            $idkurssted = $_GET["filter"];

            $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs
                    LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted WHERE idkurssted = '$idkurssted';";
        }
        

        if(isset($_POST["sort-filter"])) {
                
            $sort = $_POST["sort"];
            $filter = $_POST["filter"];
    
           if($filter == "0") {
               $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs
                       LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted ORDER BY $sort;";
           }    else {
                    $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs
                            LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted WHERE kurssted_idkurssted = '$filter' ORDER BY $sort;";
                }    
        
        }
    
        if(isset($_POST["search"])) {
                    $search = $_POST["search"];
    
                    $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs
                    LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted
                    WHERE kurs LIKE '%$search%' 
                    OR dato LIKE '%$search%'
                    OR stedsnavn LIKE '%$search%'
                    OR adresse LIKE '%$search%';";
                    //Denne må utvides
        }

        $resultat = mysqli_query($kobling, $sql);
        
        if(!$resultat) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                if(mysqli_num_rows($resultat) > 0) {

                    echo "<div class='kursliste'>";
                        echo "<div class='kursheader'>";
                            echo "<div>Kurs</div>";
                            echo "<div>Varighet</div>";
                            echo "<div>Dato</div>";
                            echo "<div>Pris</div>";
                            echo "<div>Lokale</div>";
                        echo "</div>";

                    while($rad = mysqli_fetch_array($resultat)) {
                        $kurs = $rad["kurs"];
                        $varighet = $rad["varighetMin"];
                        $pris = $rad["pris"];
                        $dato = $rad["dato"];
                        $kurssted = $rad["stedsnavn"];
                        $adresse = $rad["adresse"];
                        $nummer = $rad["nummer"];

                        echo "<div class='kursinfo'>";
                            echo "<div>$kurs</div>";
                            echo "<div>$varighet min</div>";
                            echo "<div>$dato</div>";
                            echo "<div>$pris kr</div>";
                            echo "<div>$kurssted | $adresse $nummer</div>";
                        echo "</div>";
                    }
                        
                    echo "</div>";
                }
            else {
                echo "<div class='kursliste'>Det finnes ingen kurs som samsvarer filteret, eller så er det ingen kurs lagt til i databasen.</div>";
            }
            }

        
    ?>
</div>

<?php
    include '../includes/footer.html';
?>