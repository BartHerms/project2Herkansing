<?php session_start(); ?>
<?php include 'LoginKlant.php' ?>

<?php
if(isset($_POST['submitlogin']))
{
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    var_dump($userEmail);
    echo "<br>";
    var_dump($userPassword);
    echo "<br>";

    $db = mysqli_connect("localhost", "root", "root", "project2");
    var_dump($db);
    echo "<br>";
    $result = $db->query("CALL getLoginValue('{$userEmail}')");
    var_dump($db);
    echo "<br>";
    $db->close();
    $LoginKlant = new LoginKlant();
    $LoginKlant->setLoginKlant($result);
    var_dump($LoginKlant->getPassword());
    echo "<br>";
    var_dump($result->fetch_row());
    echo "<br>";
    var_dump($db);
    if (password_verify($LoginKlant->getPassword(), $userPassword))
    {   
        $_SESSION['email'] = $userEmail;
        $_SESSION['loggedIn'] = true;
        header("location:home.php");
    }
    //else
    //{
    //    header("location:Login.php?error=1");
   // }
}         
?>