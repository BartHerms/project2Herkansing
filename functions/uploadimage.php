<?php
$filename = $_FILES["upload"]["name"];
$filetype = $_FILES["upload"]["type"];

if(isset($_POST["submit"])){
    //check if there is a file uploaded
    if(!empty($_FILES["upload"])){
        $target_direction = "../images/";
        $target_file = $target_direction . basename($filename);
        $file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkfilenamelength = strlen(basename($filename));
        

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
                    echo "Het bestand " . htmlspecialchars(basename($filename)) . " is succesvol geupload";
                }
            }
        }
    }
}
?>