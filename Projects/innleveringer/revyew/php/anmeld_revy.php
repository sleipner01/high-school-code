<?php
    $page = 'anmeld_revy';
    include "header.php";
    require_once "../database/connection.php";

    if(isset($_POST["leggTil"])) {
                
            
                //Lagrer feltene i variable
                $konsept = $_POST["konsept"];
                $instruktor = $_POST["instruktor"];
                $karakter = $_POST["karakter"];
                $premiere = $_POST["premiere"];	
                $siste = $_POST["siste_forestilling"];
                $skole = $_POST["arrangor"];
                $info = $_POST["info"];
            
                $sql = "INSERT INTO revy (konsept, instruktor, premiere, siste_forestilling, arrangor_arrangor_id, karakter_karakter_id, info) 
                        VALUES ('$konsept','$instruktor','$premiere','$siste','$skole','$karakter','$info')";
            
                if($kobling->query($sql)) {
                    echo "<div class='code-correct'>Registreringen av revyen var vellykket!</div>";
                }else{
                    echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
                }
    }
?>  
<div class="form">
    <div class="answers">
        <form method="POST">
            <div class="field">
                <input type="text" name="konsept" id="konsept" placeholder=" " required>
                <label class="floating-label"for="konsept">Konsept</label>
            </div>
            
            <div class="field">
                <input type="text" name="instruktor" id="instruktor" placeholder=" " required>
                <label class="floating-label" for="instruktor">Instruktør</label>
            </div>
            
            <!--Arrangør-->
            <?php
                $sql= "SELECT arrangor_id, navn FROM arrangor;";
                $result = mysqli_query($kobling, $sql);

                echo "<div class='dropdown-container'><label for='arrangor'>Arrangør</label><select name='arrangor' class='dropdown' required>";
                echo "<option hidden></option>";

                while ($row= $result->fetch_assoc()) {
                    $arrangor_id = $row["arrangor_id"];
                    $navn = $row["navn"];

                    echo "<option value=$arrangor_id>$navn</option>";
                }
                echo "</select></div>";
            ?>
            
            <label for="premiere">Premiere</label><br />
            <input type="DATE" name="premiere" class="date" required><br />
            
            <label for="siste_forestilling">Siste forestilling</label><br />
            <input type="DATE" name="siste_forestilling" class="date" required><br />

            <!--Karakter-->
            <?php
                $sql= "SELECT karakter FROM karakter ORDER BY karakter DESC";
                $result = mysqli_query($kobling, $sql);

                echo "<div class='dropdown-container-short'><label>Karakter</label><select name='karakter' class='dropdown-short' required>";
                echo "<option hidden></option>";

                while ($row= mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['karakter'] . "'>" . $row['karakter'] . "</option>";
                }
                echo "</select></div>";
            ?>

            <textarea name="info" rows="14" cols="60" class="info" required></textarea><br />

            <input type="submit" name="leggTil" value="Legg til" class="submit">
        </form>
    </div>
</div>

<!--Avsluttende "Innhold"-->
</div>

<div class="header">
    <p>Anmeld revy:</p>
</div>
<?php
    include "footer.php";
?>