<?php session_start();
if (!isset($_SESSION["email"]))

    // header("location:loginPagina.php");
    // echo $_SESSION["login"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        
        <link rel="stylesheet" type=text/css href="style.css">
    </head>

    <body>
        <div class="background centervertical">
            <img src="Logo" alt="Logo" class="logo">
            <button class="button btnRight" type="button" onclick="location.href = './loginPagina.php';">Log in</button>
            </div>
        </div>
    </body>

    </html>

<?php  ?>