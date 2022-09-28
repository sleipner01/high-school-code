<?php
    $page = 'upload';
    include "header.php";
    require_once "../database/connection.php";

    if(isset($_POST["upload"])) {

        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["upload"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "Filen du prøvde å laste opp er ikke et bilde. Prøv på nytt.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Beklager, filen eksisterer allerede.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 500000000) {
            echo "Beklager, filen din er for stor til å lastes opp.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Beklager, du kan bare laste opp JPG, JPEG, PNG & GIF filer.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Beklager, filen din ble ikke lastet opp av uventet grunn.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Filen ". basename( $_FILES["file"]["name"]). " har blitt lastet opp.";

                    $revy_id = $_POST["arrangor"];
                    $bilde_navn = $_FILES['file']['name'];
                    $bilde_type = $_POST["type"];

                    $sql = "INSERT INTO bilde (revy_revy_id, bilde_navn, bilde_type)
                            VALUES ('$revy_id','$bilde_navn','$bilde_type');";
                
                    if($kobling->query($sql)) {
                        echo "<div class='code-correct'>Registreringen av -- var vellykket!</div>";
                    }   else {
                            echo "<div class='code-failed'>Noe gikk galt med spørringen $sql ($kobling->error).</div>";
                    }

            } else {
                echo "Beklager, kunne ikke laste opp filen.";
            }
        }
    } else {


    echo "<div class='form'>
            <div class='answers'>
                <form action='upload.php' method='POST' enctype='multipart/form-data'>";
                

                    $sql= "SELECT arrangor_id, navn FROM arrangor;";
                    $result = mysqli_query($kobling, $sql);

                    echo "<div class='dropdown-container'>
                            <label for='arrangor'>Arrangør</label>
                                <select name='arrangor' class='dropdown' required>";
                                    echo "<option hidden></option>";

                                    while ($row= $result->fetch_assoc()) {
                                        $arrangor_id = $row["arrangor_id"];
                                        $navn = $row["navn"];

                                    echo "<option value=$arrangor_id>$navn</option>";
                                    }
                                echo "</select>";
                        echo"</div>";

                        echo "<div class='dropdown-container'>
                                <label for='type'>Type</label>
                                    <select name='type' class='dropdown' required>
                                        <option hidden></option>
                                        <option value='logo'>Logo</option>
                                        <option value='banner'>Banner</option>
                                        <option value='aapning'>Åpningsnummer</option>
                                        <option value='avslutning'>Avslutning</option>
                                        <option value='sketsj'>Sketsj</option>
                                        <option value='annet'>Annet</option>
                                    </select>
                              </div>";

                        echo "<input type='file' name='file' class='file'><br />
                            
                              <input type='submit' name='upload' value='Last opp' class='submit'>";


                echo "</form>";
            echo"</div>";
    echo "</div>";
}
?>

<!--Avsluttende "Innhold"-->
</div>

<div class="header">
    <p>Last opp bilde til en anmeldt revy:</p>
</div>
<?php
    include "footer.php";
?>