<?php session_start(); ?>
<?php include 'loginKlant.php' ?>

<?php
$error ="verkeerd email en/of wachtwoord";
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "root", "Project2");
    $result = $db->query("call getLoginValue('{$userEmail}')");

    $db-> close();
    $LoginKlant = new loginKlant();
    $LoginKlant-> setLoginKlant($result);

    if (password_verify($userPassword, $LoginKlant->getPassword()))
    {   
        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;

        $acceptedDomains = array('serviceit.nl');

         if(in_array(substr($userEmail, strrpos($userEmail, '@') + 1), $acceptedDomains))
        {
            $_SESSION['isKlant'] = 2;
            header("location:pages/home.php");
        } else{
            $_SESSION['isKlant'] = 3;
            header("location:pages/home.php");
        }  
    }
    else
    {
        $_SESSION['error'] = $error;
        header("location:index.php");
    } 


 }

 
      
?>