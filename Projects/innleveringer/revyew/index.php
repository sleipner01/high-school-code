<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Revyew</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="icon" type="image/png" href="bilder/icon.png" />
    <meta name="author" content="Magnus Byrkjeland">
</head>
<body>
    <?php $page = 'index';?>
    <div class="innpakning">
                <div class="navigation">
                    <div class="logo"><a href="#"><img type="image/png" src="bilder/logo.png" alt="Logo" height="52px"></a></div>
	                <div class="links"><a href="php/revyer.php" class="link_a">Alle anmeldte revyer</a></div>
	                <div class="links"><a href="php/anmeld_revy.php" class="link_a">Anmeld revy</a></div>
                    <div class="links-r"><a href="php/upload.php" class="link_a">Last opp bilde</a></div>
                    <div class="links"><a href="php/registrer_arrangor.php" class="link_a">Registrer arrangør</a></div>
                    <div class="links"><a href="php/rediger_anmeldelse.php" class="link_a">Rediger anmeldelse</a></div>
                </div>
                <div class="innhold">
                    <?php
                        require_once "database/connection.php";

                        $sql = "SELECT revy.revy_id, revy.konsept, revy.instruktor, revy.premiere, revy.siste_forestilling, arrangor.navn, revy.karakter_karakter_id, revy.info, bilde.bilde_navn FROM revy
                                INNER JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id  INNER JOIN bilde ON revy.revy_id = bilde.revy_revy_id WHERE bilde.bilde_type = 'banner' OR bilde.bilde_type = 'aapning' ORDER BY revy.revy_id DESC LIMIT 1;";

                        $resultat = mysqli_query($kobling, $sql);
                            
                        if(!$resultat) {
                            die("Fikk ikke tak i dataene: " . mysql_error());
                        }   else {
                                if(mysqli_num_rows($resultat) > 0) {
                                    
                                    while($rad = mysqli_fetch_array($resultat)) {
                                        $konsept = $rad["konsept"];
                                        $instruktor = $rad["instruktor"];
                                        $premiere = $rad["premiere"];
                                        $siste_forestilling = $rad["siste_forestilling"];
                                        $arrangor = $rad["navn"];
                                        $karakter = $rad["karakter_karakter_id"];
                                        $info = $rad["info"];

                                        $filnavn = $rad["bilde_navn"];

                                        $year = new DATETIME($premiere);
                                        
                                        echo "<div class='front'>
                                                <div class='f-header'>
                                                    <h1>$arrangor " . $year->format('Y') . "</h1>
                                                </div>

                                                <div class='f-img'>
                                                    <img src='uploads/$filnavn' alt='Bildet ble ikke funnet'/>
                                                </div>
                                                
                                                <div class='f-info'>
                                                    <div class=''> Konsept: <br />
                                                        Arrangør:   <br />
                                                        Instruktør: <br />
                                                        Premiere: <br />
                                                        Siste forestilling: <br />
                                                        Karakter: <br />
                                                    </div>
                                                    <div class=''>
                                                        $konsept <br />
                                                        $arrangor <br />
                                                        $instruktor <br />
                                                        $premiere <br />
                                                        $siste_forestilling <br />
                                                        $karakter <br />
                                                    </div>
                                                </div>
                                                <div class='f-review'>
                                                    $info
                                                </div>
                                            </div>";
                                    }
                                }   else {//Legg inn en backup statisk hovedside
                                        echo "<div>Ingen revyer ble funnet.</div>";
                                    }
                        }
                    ?>
                          
                </div>
	</div>

</body>
</html>