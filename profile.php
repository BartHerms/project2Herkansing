<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Profiel</title>
</head>
<body>
    <h1>Profiel</h1>
    <img src="test.png" alt="test" width="500" height="600">
    <a href="">Profielfoto wijzigen</a>
    <h2>Jane Doe</h2>
    <form action="" method="post">
        <label for="adres">Adres</label>
        <input type="text" name="adres" value="<?php echo $adres; ?>">

        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" value="<?php echo $postcode; ?>">

        <label for="name">Telefoon</label>
        <input type="int" name="telephone" value="<?php echo $telephone; ?>">

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">

        <input type="submit" name="submit" value="Profiel wijzigen">
    </form>
</body>
</html>