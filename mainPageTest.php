<?php session_start (); 
if(!isset($_SESSION["userEmail"])) 

var_dump($_SESSION["userEmail"]);


		
		if(isset($_GET['page'])){
			
			include($_GET['page']. ".php");
		}
		else{
			
			if(isset($_SESSION['loggedIn'])){
				
				echo "<p>You are logged in</p>";
				echo "<a href='index.php?page=logout'>click here to log out</a>";
				echo $_SESSION['image'];
			}
			else{
				
				echo "session not set<br /><br />";
				include("login.php");
			}
			
		} 
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mooiiii test</title>
</head>
<body>
    eeemm testen
</body>
</html>