<?php
include_once("functions/dbconnect.php");
include_once("functions/uploadimage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Profielfoto wijzigen</title>     
</head>
<body>
    <div class="item">
        <div class="uploadfile">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="upload">Upload nieuwe profielfoto</label>
                <input type="file" name="upload">
                <input type="submit" name="submit" value="Profielfoto opslaan">
            </form>
        </div>
    </div>
</body>
</html>