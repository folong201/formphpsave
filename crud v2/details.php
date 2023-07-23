<?php

$server_name = "localhost";
$username = "root";
$password = '';
$dbname = "boutique";
// partie pour la connexion a la base de donnee
try {
    $conn = new PDO("mysql:host=$server_name;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //cas ou la connexion reussie
} catch (PDOException $th) {
    //au cas ou la connexion echoue
    echo "connexion a la base de donne echouer: " . $th->getMessage();
}
//verification si la variable id a ete passer en parametre
if (isset($_GET['id'])) {
    //cas ou l'id a ete passe en parametre
    $id = $_GET['id'];
    $sql = "SELECT * FROM article WHERE id = ?";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(1, $id);
    $prepare->execute();
} else {
    //cas ou la variable id n'a pas ete passer en parametre
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creation</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container">
        <div class="row">
            <?php
            while ($row = $prepare->fetch()) {

            ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nom'] ?></h5>
                        <p class="card-text"><?= $row['categorie'] ?></p>
                        <a href="/update.php?id=<?= $row['id'] ?>" class="btn btn-primary">update</a>
                        <form action="/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php

$preparer = [[1, 2, 3, 4, 5], [1, 3, 4], [3, 5, 78]];
$row = ["nom" => "nom 1", 2, 3, 4, 5];

?>