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
<div id="logindiv">
    <form id="form" action="loginhelper.php" method="post">
    <input type="text" id="text" name="email" placeholder="E-mail" required>
    <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
    <input type="submit" id="submitbutton" name="submitlogin">
    </form>
</div>
</body>
</html>