<?php
include("dbService.php");
class User{
    private $username;
    private $email;
    private $password;
    private $conn ;
    public function __construct($username=null,$email=null,$password=null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $service = new DbService();
        $this->conn = $service->connection();
    }

    public function register($username,$password,$email){
        $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
        $req = $this->conn->prepare($sql);
        $req->bindParam(1,$username);
        $req->bindParam(2,$email);
        $req->bindParam(3, $password);
       return $req->execute();
    }
    function login($email,$password){
        $sql = "SELECT FROM users WHERE email = ? AND password = ? LIMIT 1";
        $req = $this->conn->prepare($sql);
        $req->bindParam(1,$email);
        $req->bindParam(2,$password);
        $req->execute();
        while ($row = $req->fetch()) {
            return $row;
        }

        return null;
    }

}