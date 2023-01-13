<?php session_start(); ?>
<?php include 'loginKlant.php' ?>

<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];
   // $isMedewerker = strpos($userEmail, "serviceit.nl");
    //print($isMedewerker);
  


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
      
        //if useremail contains service it
        //then $_session isklant = false
        //otherwise = true
        
    }
    else
    {
        header("location:loginPagina.php");
    } 


 }

 
      
?>