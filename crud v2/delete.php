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

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $id = $_POST['id'];
    $sql = "DELETE FROM article WHERE id =?";
    $prepare = $conn->prepare($sql);
    $prepare->bindParam(1,$id);
    $prepare->execute();
    header("Location: index.php");
}else {
    header("Location: index.php");
}