<?php session_start(); 
include 'classes/Klant.php'; 

if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    
    $LoginKlant = new Klant();
    $db = mysqli_connect("localhost", "root", "root", "Project2");
    $result = $db->query("CALL getKlant('{$userEmail}')");
   
    $db->close();
    $LoginKlant->setKlant($result);
    $wacht = $LoginKlant->getPassword();

 
     if (password_verify($userPassword, $wacht))
    {   

        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;
        header("location:pages/home.php");
    }
    else
    {
        header("location:Login.php?error=1");
    } 
}         
?>