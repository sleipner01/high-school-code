<?php
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST['legg-til-kjoretoy'])) {
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
        }else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Filen ". basename( $_FILES["file"]["name"]). " har blitt lastet opp.";
                
                $bilde_navn = $_FILES['file']['name'];

            } else {
                echo "Beklager, kunne ikke laste opp filen.";
            }
        }
?>