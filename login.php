<?php include_once './utils/dbconnect.php' ?>
<?php include_once 'loginhelper.php' ?>

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
  <h1>Login</h1>

<form action="loginhelper.php" method="POST">
  <label for="email">E-mail</label><br>
  <input type="text" id="email" name="email" required><br>
  <label for="password">wachtwoord</label><br>
  <input type="password" id="password" name="password" required><br><br>
  <input type="submit" value="login" name="submit">
  <!-- <a href="Register.php">Register</a> -->
</form>
</body>

</html>

<?php

$sql = "SELECT emailadress, password FROM klant";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

if (isset($_REQUEST["error"]))
$msg = "Invalid username or Password";
?>
<p style="color:red;">
<?php if (isset($msg)) {

  echo $msg;
}
?>
          

</body>
</html>