<?php include_once './utils/dbconnect.php' ?>

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

if(isset($_REQUEST['submit']))
{
$userEmail = $_REQUEST['email'];
$userPassword = $_REQUEST['password'];


$res = "SELECT password FROM klant WHERE emailadress = ?";
         $statement = mysqli_prepare($conn, $res);
         mysqli_stmt_bind_param($statement, "s", $userEmail);
         mysqli_stmt_execute($statement);
         mysqli_stmt_bind_result($statement, $password);
         mysqli_stmt_store_result($statement);
         echo (mysqli_stmt_error($statement));
// $result =  mysqli_stmt_fetch($statement);


if (mysqli_stmt_num_rows($statement) == 1) {
    while (mysqli_stmt_fetch($statement)) {
        if (password_verify($userPassword, $password)) {
            $_SESSION['useradress'] = $userEmail;
           $_SESSION['userpassword'] = $userPassword;
            header("mainPageTest.php");
            echo "succes";
        }
        else {
            header("location:Login.php?error=1");
             echo "fail";
                
            }
        }
    }
}
// if(isset($result))
// // password_verify(string $userPassword, string $result): bool
//  {
// 	session_start (); 
// 	$_SESSION["login"]="1";
// 	// header("location:index.php");
//     echo "succes";
    
//  }
//  else	
//  {
// 	header("location:Login.php?error=1");
//     echo "fail";
	
//  }
// }

// $sqlresult = "SELECT email, password FROM registration";
//         $result = mysqli_prepare($conn, $sqlresult);
//         mysqli_stmt_bind_param($result, "ss", $userEmail);
//         mysqli_stmt_execute($result);
//         mysqli_stmt_bind_result($result, $userEmail, $userPassword);
//         mysqli_stmt_store_result($result);



 //if (mysqli_stmt_num_rows($result) == 1) {
 //    while (mysqli_stmt_fetch($result)) {
        
 //        if (password_verify($userPassword, $password)) {
            // $_SESSION['userId'] = $id;
  //           $_SESSION["login"]="1";
            // $_SESSION['email'] = $userEmail;
 //            header("location: index.php");
  //           exit;
             // else	
 //       }
 //   } 
// } 
         
?>