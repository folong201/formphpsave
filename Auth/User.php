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

    public function register($username,$email,$password){
        //verifier s'il ny a pas deja un utilisateru aavec cet adresse email
        $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
        $req = $this->conn->prepare($sql);
        $req->bindParam(1,$username);
        $req->bindParam(2,$email);
        $req->bindParam(3, $password);
       return $req->execute();
    }
    function login($email,$password){
        $sql = "SELECT * FROM users ";
        $req = $this->conn->prepare($sql); 
        
        $req->execute();

        while ($row = $req->fetch()) {
            
            if ($row['email']==$email && $row['password']==$password) {
                return $row;
            }
        }
        return null;

    }

}