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
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nom = $_POST['name'];
        $qty = $_POST['qty'];
        $categorie = $_POST['categorie'];
        $prix = $_POST['price'];
        $id = $_POST['id'];

        $sql = "UPDATE article SET nom=?,prix=?,qty=?,categorie=? WHERE id =?";
        $exec = $conn->prepare($sql);
        $exec->bindParam(1, $nom);
        $exec->bindParam(2, $prix);
        $exec->bindParam(3, $qty);
        $exec->bindParam(4, $categorie);
        $exec->bindParam(5, $id);
try {
    
    $exec->execute();
    header("Location:index.php");
} catch (\Throwable $th) {
    die("erreur".$th->getMessage());
}
    }
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

        <?php
        while ($row = $prepare->fetch()) {
        ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" name="name" value="<?= $row['nom'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">prix</label>
                    <input type="number" name="price" value="<?= $row['prix'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">quantite</label>
                    <input type="number" name="qty" value="<?= $row['qty'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Categorie</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="categorie">
                        <?= $row['catigorie'] ?>
                    </textarea>
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>