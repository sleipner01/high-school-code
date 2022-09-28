<?php
    $page = 'revyer';
    include "header.php";
    require_once "../database/connection.php";

    $sql = "SELECT * FROM revy
            INNER JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id INNER JOIN bilde ON revy.revy_id = bilde.revy_revy_id ORDER BY revy_id DESC;";
    

    if(isset($_POST["sort-filter"])) {
                
        //Lagrer feltene i variabler
        $sort = $_POST["sort"];
        $filter = $_POST["filter"];

       if($filter == "0") {
           $sql = "SELECT revy.revy_id, revy.konsept, revy.instruktor, revy.premiere, revy.siste_forestilling, arrangor.navn, revy.karakter_karakter_id, revy.info, bilde.bilde_navn, bilde.revy_revy_id FROM revy
                   INNER JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id INNER JOIN bilde ON revy.revy_id = bilde.revy_revy_id ORDER BY $sort;";
       }    else {
                $sql = "SELECT revy.revy_id, revy.konsept, revy.instruktor, revy.premiere, revy.siste_forestilling, arrangor.navn, revy.karakter_karakter_id, revy.info, bilde.bilde_navn, bilde.revy_revy_id FROM revy
                INNER JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id INNER JOIN bilde ON revy.revy_id = bilde.revy_revy_id WHERE arrangor_arrangor_id = '$filter' ORDER BY $sort;";
            }    
    
    }

    if(isset($_POST["search"])) {
                $search = $_POST["search"];

                $sql = "SELECT * FROM revy JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id
                WHERE revy.konsept LIKE '%$search%' 
                OR arrangor.navn LIKE '%$search%';";
                //Denne skal utvides
    }


    $resultat = mysqli_query($kobling, $sql);
    
    if(!$resultat) {
        die("Fikk ikke tak i dataene: " . mysql_error());
    }   else {
            if(mysqli_num_rows($resultat) > 0) {

                echo "<div class='table'>";
                
                while($rad = mysqli_fetch_array($resultat)) {
                    $revy_id = $rad["revy_id"];
                    $konsept = $rad["konsept"];
                    $instruktor = $rad["instruktor"];
                    $premiere = $rad["premiere"];
                    $siste_forestilling = $rad["siste_forestilling"];
                    $arrangor = $rad["navn"];
                    $karakter = $rad["karakter_karakter_id"];
                    $info = $rad["info"];
                    $filnavn = $rad["bilde_navn"];
                    $bilde_revy_id = $rad["revy_revy_id"];

                    $year = new DATETIME($premiere);

                                echo "<div class='infobar'>
                                        <div class='name'><div style='text-align:center'>$arrangor " . $year->format('Y') . "</div>
                                      </div>";

                                echo "<div class='row'>
                                        <div class='td1-b'><img src='../uploads/$filnavn' alt='Bildet ble ikke funnet' width='50%' /></div>
                                        <div class='td2-b'>
                                            Konsept: <br />
                                            Arrangør:   <br />
                                            Instruktør: <br />
                                            Premiere: <br />
                                            Siste forestilling: <br />
                                            Karakter: <br />
                                        </div>
                                        <div class='td3-b'>
                                            $konsept <br />
                                            $arrangor <br />
                                            $instruktor <br />
                                            $premiere <br />
                                            $siste_forestilling <br />
                                            $karakter <br />
                                        </div>
                                        <div class='td4-b'>$info</div>
                                      </div>
                                    </div>";
                }   echo "</div>";//Avsluttende tabell 
            }
                else {
                    echo "<div>Ingen revyer ble funnet.</div>";
                }
        }
?>

<!--Avsluttende "Innhold"-->
</div>

<div class="header">
    <p>Alle anmeldte revyer:</p>
</div>
<?php
    include "filter.php";
    include "footer.php";
?>
