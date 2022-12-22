<?php session_start(); ?>
<?php include 'LoginKlant.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $_SESSION['email'] = $userEmail;
    $_SESSION['loggedIn'] = true;
    
    $db = mysqli_connect("localhost", "root", "", "project2");
    $result = $db->query("call getLoginValue('{$userEmail}')");
    $db-> close();
    $LoginKlant = new LoginKlant();
    $LoginKlant-> setLoginKlant($result);
    if ($LoginKlant-> getPassword() == $userPassword)
    {
        header("location:mainPageTest.php");
    }
    else
    {
        header("location:Login.php?error=1");
    }
}         
?>