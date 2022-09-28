<!--Meny for å velge de ulike kursstedene, info kommer opp om kursstedene, og kommende kurs for kursstedene-->
<?php
    $page = 'kurssted';
    include '../includes/header.php';
    include '../database/connection.php';
?>

<!--Mulighet for å oppdatere lokalet, se alle kjøretøy (send til kjoretoy.php med filter på)-->
<div class="main">
    <div class="lokaler">
    <?php
        $sql = 'SELECT * FROM kurssted';

        $resultat = mysqli_query($kobling, $sql);
        
        if(!$resultat) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                if(mysqli_num_rows($resultat) > 0) {

                    while($rad = mysqli_fetch_array($resultat)) {
                        $idkurssted = $rad["idkurssted"];
                        $stedsnavn = $rad["stedsnavn"];
                        $adresse = $rad["adresse"];
                        $nummer = $rad["nummer"];
                        
                        echo '<div class="lokale">';

                            echo '<div class="lokale-design">';
                            echo "$stedsnavn <br>";
                            echo "$adresse $nummer";
                            echo '<div><a href="kjoretoy.php?filter=' . $idkurssted . '">Se alle stasjonerte kjøretøy</a></div>';
                            echo '</div>';

                        echo '</div>';
                    }
                }
            }
    ?>
    </div>
</div>


<?php
    include '../includes/footer.html';
?>