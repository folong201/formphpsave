<?php
session_start();
include("User.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user =  new User();
        $ok =  $user->register($_POST['username'],$_POST['email'], $_POST['password']);
        if ($ok) {
            //configurer la session
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['isAuth'] = true;

            //rediriger ver la pasge index
            header("Location: index.php");
        }
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
        <h1>
            Regitration Page
        </h1>
    </center>
    <div class="container">

        <form action="register.php" method="post">
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <input type="submit" value="Save" class="btn btn-primary">
    </form>
</div>
</body>

</html>