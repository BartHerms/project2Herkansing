<?php session_start(); ?>
<?php include 'Klant.php' ?>

<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "", "project2");
    $result = $db->query("call getLoginValue('{$userEmail}')");
    $db-> close();
    $LoginKlant = new Klant();
    $LoginKlant-> setKlant($result);
    if (password_verify( $LoginKlant-> getPassword(), $userPassword))
    {   
        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;
        
        //if useremail contains service it
        //then $_session isklant = false
        //otherwise = true
        header("location:home.php");
    }
    else
    {
        header("location:Login.php?error=1");
    }
}         
?>