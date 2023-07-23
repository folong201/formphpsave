<?php

$server_name = "localhost";
$username = "root";
$password = '';
$dbname = "boutique";

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    echo "connexion a la base de donne echouer: " . $th->getMessage();
}
$sql = "SELECT * FROM article";
$data = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    include('nav.php');
    ?>
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nom</th>
                    <th scope="col">prix</th>
                    <th scope="col">Qty</th>
                    <th scope="col">categorie</th>
                    <th scope="col">Detais</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $data->fetch()) {

                ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['prix'] ?></td>
                        <td><?= $row['qty'] ?></td>
                        <td><?= $row['categorie'] ?></td>
                        <td>
                            <a href="details.php?id=<?=$row['id'] ?>" class="btn btn-primary">Show</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>