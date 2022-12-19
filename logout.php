<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/home.css">

</head>

<body>
    <!-- include_once 'header' -->
    Je bent nu uitgelogd, terug naar het loginscherm?
    <ul>
        <li><a href="login.php">ticketsysteem login</a></li>
    </ul>
    <!-- include_once 'footer" -->
</body>

</html>

<?php
session_start();
unset($_SESSION["email"]);
//   unset($_SESSION["password"]);
session_destroy();
header("location:loginPagina.php")
?>