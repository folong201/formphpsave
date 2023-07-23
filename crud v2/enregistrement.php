<?php

$server_name = "localhost";
$username = "root";
$password = '';
$dbname = "boutique";

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connnexion a la base de donnee reussi";
} catch (PDOException $th) {
    echo"connexion a la base de donne echouer: ".$th->getMessage();
}

if ($_SERVER['REQUEST_METHOD']=="POST") {
    echo"donnees recu avec la methode post";
    $nom = $_POST['name'];
    $prix = $_POST['price'];
    $qty = $_POST['qty'];
    $categorie = $_POST['categorie'];
    //requette sql qui sera executer
    $sql = "INSERT INTO article(nom,qty,prix,categorie) VALUES(?,?,?,?)";
    //on passe la requette sql a la methode preparer pour qu'elle aprette l'execution de la requette
    $req = $conn->prepare($sql);
    //ici on lie les parametres de la requette aux donnees fournies par le formulaire
    $req->bindParam(1,$nom);
    $req->bindParam(2,$qty);
    $req->bindParam(3,$prix);
    $req->bindParam(4, $categorie);

    try {
        
        //on execute la requette
        $req->execute();
        header("Location: index.php");
    } catch (\Throwable $th) {
        echo"ompossible d'eregistrer ".$th->getMessage();
    }
}else{
    header("Location: creation.php");
}