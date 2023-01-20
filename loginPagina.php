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
    if ($_GET ['melding'] == 'fout') {
        echo "Uw wachtwoord of email is onjuist";
        echo "<form id='form' action='loginh.php' method='post'>";
        echo "<input type='text' id='text' name='email' placeholder='E-mail' required>";
        echo "<input type='password' id='password' name='password' placeholder='Wachtwoord' required>";
        echo "<input type='submit' id='submitbutton' name='submitlogin'>";
        echo "</form>";
        

    } 
    else
    {
        echo "<form id='form' action='loginh.php' method='post'>";
        echo "<input type='text' id='text' name='email' placeholder='E-mail' required>";
        echo "<input type='password' id='password' name='password' placeholder='Wachtwoord' required>";
        echo "<input type='submit' id='submitbutton' name='submitlogin'>";
        echo "</form>";
    }
    ?>

</div>
</body>
</html>