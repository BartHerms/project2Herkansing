<?php session_start(); ?>
<<<<<<< Updated upstream
<?php include 'Klant.php' ?>
=======
<?php include 'LoginKlant.php' ?>
>>>>>>> Stashed changes

<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "", "project2");
    $result = $db->query("call getLoginValue('{$userEmail}')");
    $db-> close();
<<<<<<< Updated upstream
    $LoginKlant = new Klant();
    $LoginKlant-> setKlant($result);
    if (password_verify( $LoginKlant-> getPassword(), $userPassword))
    {   
        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;
=======
    $LoginKlant = new LoginKlant();
    $LoginKlant-> setLoginKlant($result);
    if ($LoginKlant-> getPassword() == $userPassword)
    {
>>>>>>> Stashed changes
        header("location:home.php");
    }
    else
    {
        header("location:Login.php?error=1");
    }
}         
?>