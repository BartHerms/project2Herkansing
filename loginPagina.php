<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div>
    <?php
    session_start();
    ?>
    
    <form id="form" action="loginh.php" method="post">
    <input type="text" id="text" name="email" placeholder="E-mail" required>
    <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
    <input type="submit" id="submitbutton" name="submitlogin">
        <?php
            if(isset($_SESSION['error'])){
                $error = $_SESSION["error"];
                echo "<span>$error</span>";
            }
        ?>
    </form>

</div>
</body>
</html>
<?php
    unset($_SESSION["error"]);
?>