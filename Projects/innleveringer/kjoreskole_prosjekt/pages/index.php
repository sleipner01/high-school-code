<?php
    $page = "index";
    include '../includes/header.php';
    include '../database/connection.php';
?>
<div class="main_i">
    <h1>Friskolens oversiktnettsted!</h1>
    <p style="font-size: 26px;">Her kan du legge inn nye kurs for opplæring i motorvogner, holde oversikt over bilparken og legge inn nye biler!</p>

<!--
    Kurs
    <div class="kurs">
    <?php
        $sql = "SELECT * FROM kurs LEFT OUTER JOIN kurssted_has_kurs ON kurs.idkurs = kurssted_has_kurs.kurs_idkurs LEFT OUTER JOIN kurssted ON kurssted_has_kurs.kurssted_idkurssted = kurssted.idkurssted LIMIT 1;";

        $resultat = mysqli_query($kobling, $sql);
        
        if(!$resultat) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                if(mysqli_num_rows($resultat) > 0) {

                    while($rad = mysqli_fetch_array($resultat)) {
                        $kurs = $rad["kurs"];
                        $varighet = $rad["varighetMin"];
                        $pris = $rad["pris"];
                        $dato = $rad["dato"];
                        $kurssted = $rad["stedsnavn"];
                        $adresse = $rad["adresse"];
                        $nummer = $rad["nummer"];

                        echo $kurs;
                        echo $varighet . ' min';
                        echo $pris . 'kr';
                        echo $dato;
                        echo $kurssted;
                        echo $adresse . " " . $nummer;
                    }
                }
            }
    ?>
    </div>
    Lokaler
    <?php
        $randid = rand(1,4);

        $sql = "SELECT * FROM kurssted WHERE idkurssted = $randid";

        $resultat = mysqli_query($kobling, $sql);
        
        if(!$resultat) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                if(mysqli_num_rows($resultat) > 0) {

                    echo "<div class='kurssted'>";

                    while($rad = mysqli_fetch_array($resultat)) {
                        $idkurssted = $rad["idkurssted"];
                        $stedsnavn = $rad["stedsnavn"];
                        $adresse = $rad["adresse"];
                        $nummer = $rad["nummer"];

                        echo $stedsnavn . ' ';
                        echo $adresse . ' ';
                        echo $nummer . ' ';
                        echo '<a href="kjoretoy.php?filter=' . $idkurssted . '">Se alle stasjonerte kjøretøy</a>';
                    }
                
                echo "</div>";
                
                }
            }
    ?>
-->  
</div>

<?php
    include '../includes/footer.html';
?>