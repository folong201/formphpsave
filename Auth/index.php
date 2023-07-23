<?php
session_start();
// include("authServcie.php");
//logique pour verifier que l'utilisateur est bien connecter
// $auth = new Auth();
// $auth->isAuth();
if (isset($_SESSION['isAuth'])) {
    if (!$_SESSION['isAuth']) {
       header("Location: login.php");
    }
}else{
    header("Location: login.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("nav.php"); ?>
    <center>
        <h2>Dashboard</h2>
    </center>
    Nom: <?=$_SESSION['email']?>
</body>

</html>