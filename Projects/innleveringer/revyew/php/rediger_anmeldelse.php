<?php
    $page = 'rediger_anmeldelse';
    include "header.php";
    require_once "../database/connection.php";

    if(isset($_POST["rediger"])) {

        $revy_id = $_POST["velg-revy"];

        $sql = "SELECT revy.revy_id, revy.konsept, revy.info, arrangor.navn FROM revy JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id WHERE revy_id = '$revy_id';";

        $result = mysqli_query($kobling, $sql);

        if(!$result) {
            die("Fikk ikke tak i dataene: " . mysql_error());
        }   else {
                while($row = mysqli_fetch_array($result)){
                    $revy_id = $row["revy_id"];
                    $konsept = $row["konsept"];
                    $info = $row["info"];
                    $arrangor = $row["navn"];
                    
                    echo "<div class='form'>";

                        echo "<div class='rediger'>";
                            echo "<div class='rediger-h'>";
                                echo "<label style='font-size: 20px;'>Redigerer anmeldelsen av:</label> <div>$arrangor - $konsept</div>";
                            echo "</div>";

                            echo "<div>";
                                echo "<form method='POST'>";
                                    echo "<input type='hidden' name='revy_id' value='$revy_id'>";
                                    
                                    echo "<textarea name='info' rows='14' cols='70' class='info' required></textarea><br />";
                                    echo "<input type='submit' name='update' value='Oppdater' class='submit'>";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='delete'>";
                            echo "<div class='delete-h'>";
                                echo "<label style='font-size: 20px:'>Slett anmeldelsen av:</label> <div>$arrangor - $konsept</div>";
                            echo "</div>";

                            echo "<div>";
                                echo "<form method='POST'>";
                                    echo "<input type='hidden' name='revy_id' value='$revy_id'>";
                                    echo "<input type='hidden' name='arrangor' value='$arrangor'>";
                                    echo "<input type='hidden' name='konsept' value='$konsept'>";
                                    echo "<input type='submit' name='delete' value='Slett anmeldelsen' class='submit'>";
                                echo "</form>";
                            echo "</div>";
                        echo "</div>";

                    echo "</div>";

                    echo "<hr />";
                }
            }
    }

    if(isset($_POST["update"])) {

        $revy_id = $_POST["revy_id"];
        $info = $_POST["info"];
        $arrangor = $_POST["arrangor"];
        $konsept = $_POST["konsept"];

        $sql = "UPDATE revy SET info='$info' WHERE revy_id = '$revy_id'";

        if($kobling->query($sql)) {
            echo "<div class='code-correct'>";
                echo "$arrangor - $konsept, er blitt oppdatert.";
            echo "</div>";
		}   else{
			echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
		}
    }

    if(isset($_POST["delete"])) {
        $revy_id = $_POST["revy_id"];
        $arrangor = $_POST["arrangor"];
        $konsept = $_POST["konsept"];

        $sql = "DELETE FROM revy WHERE revy_id = '$revy_id';";

        if($kobling->query($sql)) {
            echo "<div class='code-correct'>";
                echo "Anmeldelsen av $arrangor - $konsept, er blitt slettet.";
            echo "</div>";
		}   else{
			echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
		}
    }
?>

<div class="velg">
        <form method="POST">
            <?php
                $sql= "SELECT revy.revy_id, revy.konsept, arrangor.navn FROM revy JOIN arrangor ON revy.arrangor_arrangor_id = arrangor.arrangor_id;";
                $result = mysqli_query($kobling, $sql);

                echo "<div class='dropdown-container'><label for='velg-revy'>Velg revy</label><select name='velg-revy' class='dropdown' required>";
                echo "<option hidden></option>";

                while ($row = mysqli_fetch_array($result)) {
                    $revy_id = $row["revy_id"];
                    $konsept = $row["konsept"];
                    $arrangor = $row["navn"];

                    echo "<option value='$revy_id'>" . $arrangor . " - " . $konsept . "</option>";
                }
                echo "</select></div>";
            ?>

            <input type="submit" name="rediger" value="Rediger" class="submit">
        </form>
</div>

<!--Avsluttende "Innhold"-->
</div>

<div class="header">
    <p>Rediger en anmeldelse:</p>
</div>
<?php
    include "footer.php";
?>
