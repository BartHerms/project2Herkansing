<?php
if(isset($_POST["submit"])){
    //check if there is a file uploaded
    if(!empty($_FILES["upload"])){
        $target_direction = "upload/";
        $target_file = $target_direction . basename($_FILES["upload"]["name"]);
        $file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkfilenamelength = strlen(basename($_FILES["upload"]["name"]));
        

        //check if file already exists
        if(file_exists($target_file)){
            echo "Sorry bestand is al geupload";
        }

        //check the file size
        if($_FILES["upload"]["size"] > 3000000){
            echo "Sorry bestand is groter dan 3MB";
        }

        //check the file name length
        if($checkfilenamelength > 50){
             echo "Sorry bestandsnaam is groter dan 50 tekens";
        }else{
            if($file == "png" || $file == "jpeg" || $file == "jpg"){
                if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
                    echo "Het bestand " . htmlspecialchars(basename($_FILES["upload"]["name"])) . " is succesvol geupload";
                }
            }
        }
    }
}
?>