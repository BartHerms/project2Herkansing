<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <link rel="stylesheet" type=text/css href="style.css">
<body>
<div class="background center">
        <a href="./landingpage.php"><img class="logo" src="logo" alt="logo"></a>
        <div class="content width-1">
            <h1>Sign in</h1>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                <!-- Email field -->
                <input class="formfield" type="emailadress" name="emailadress" id="emailadress" placeholder="Email">
                <p class="errortext" id="emailerror">Gelieve geldige gebruikersgegevens te gebruiken</p>

                <!-- Wachtwoord field -->
                <input class="formfield" type="password" name="password" id="password" placeholder="Password...">
                <p class="errortext" id="passworderror">Je wachtwoord moet minstens 8 tekens bevatten</p>
                <p class="errortext" id="incorrectPassword">Gelieve geldige gebruikersgegevens te gebruiken</p>

                <!-- Submit -->
                <input class="formbutton" type="submit" name="login" id="login" value="Sign In">

                <!-- Remember me -->
                <div class="content1">
                    <div class="checkbox">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Mij onthouden</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    // Form input validate
    if (isset($_POST['login'])) {
        if (filter_input(INPUT_POST, 'emailadress', FILTER_VALIDATE_EMAIL)) {
            $email = filter_input(INPUT_POST, 'emailadress', FILTER_SANITIZE_EMAIL);
            if (($password = $_POST['password']) && strlen($_POST['password']) >= 8) {
                $remember = isset($_POST['remember']) == 1 ? 1 : 0;
                
                // Database connection
                $sql = "SELECT Password, Id FROM `account` WHERE Email = ?";

                $passResult = $results["Password"][0];
                $id = $results["Id"][0];

                if (password_verify($_POST['password'], $passResult)) {
                    header("Location: ./loginredirect.php?rem={$remember}&id={$id}");
                } else {
          

</body>
</html>