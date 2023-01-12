<?php session_start(); ?>
<?php include 'loginKlant.php' ?>

<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
    $isMedewerker = strpos($userEmail, "serviceit.nl");

    $db = mysqli_connect("localhost", "root", "", "project2");
    $result = $db->query("call getLoginValue('{$userEmail}')");
    // call moet nog aangepast worden
    $db-> close();
    $LoginKlant = new loginKlant();
    $LoginKlant-> setLoginKlant($result);
    if (password_verify( $LoginKlant-> getPassword(), $userPassword))
    // password verify bestaat nog niet in de loginklant class
    {   
        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;
        
        if ($isMedewerker == true)
            {
                $_SESSION['isKlant'] = false;
            }
        else
            {
                $_SESSION['isKlant'] = true;
            }
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