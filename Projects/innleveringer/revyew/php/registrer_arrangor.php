<?php
    $page = 'registrer_arrangor';
    include "header.php";
    require_once "../database/connection.php";

    if(isset($_POST["leggTil"])) {
                
            
                //Lagrer feltene i variabler
                $arrangor = $_POST["arrangor"];
                $bydel_id = $_POST["bydel"];
            
                $sql = "INSERT INTO arrangor (navn, bydel_bydel_id)
                        VALUES ('$arrangor','$bydel_id');";
            
                if($kobling->query($sql)) {
                    echo "<div class='code-correct'>Registreringen av arrangøren var vellykket!</div>";
                }else{
                    echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
                }
    }
?>

<div class="form">
    <div class="answers">
        <form method="POST">
            <div class="field">
                <input type="text" name="arrangor" id="arrangor" placeholder="" required>
                <label class="floating-label" for="arrangor">Arrangør</label>
            </div>

            <?php
                $sql= "SELECT bydel_id, navn FROM bydel;";
                $result = mysqli_query($kobling, $sql);

                echo "<div class='dropdown-container'><label for='bydel'>Bydel</label><select name='bydel' class='dropdown' required>";
                echo "<option hidden></option>";

                while ($row= $result->fetch_assoc()) {
                    $bydel_id = $row["bydel_id"];
                    $navn = $row["navn"];

                    echo "<option value=$bydel_id>$navn</option>";
                }
                echo "</select></div>";
            ?>

            <input type="submit" name="leggTil" value="Legg til" class="submit">
            
        </form>
    </div>
</div>

<!--Avsluttende "Innhold"-->
</div>

<div class="header">
    <p>Registrer en arrangør:</p>
</div>

<?php
    include "footer.php";
?>