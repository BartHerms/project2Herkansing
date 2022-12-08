<?php
if (isset($_COOKIE["rememberLoggedIn"])) {
    header("Location: ./main.php");
} else {
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

<?php } ?>