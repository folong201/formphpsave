<?php
    include("Chat.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user =  new Chat($_POST['sender'],$_POST['content']);
        $row =  $use->login($_POST['email'], $_POST['password']);
        if ($row != null) {
            //configurer la session

            //rediriger ver la pasge index
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messag Page</title>
</head>

<body>
    <?php include("nav.php"); ?>
    <center>
        <h2>
            Message Pages
        </h2>
    </center>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">sender</label>
            <input type="text" name="sender" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
</body>

</html>