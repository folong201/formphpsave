<?php
include("dbSservice.php");
class Chat{
    private $sender;
    private $content;
    private $conn;
     public function __construct($sender=null,$content=null) {
        $this->sender = $sender;
        $this->content = $content;
        $db = new DbService();
        $this->conn = $db->connection();
    }

    function save(){
        $sql = "INSERT INTO messages(sender,content) VALUES(?,?)";
        $prepare = $this->conn->prepare($sql);
        $prepare->bindParam(1,$this->sender);
        $prepare->bindParam(2, $this->content);
        if ($prepare->execute()) {
            header("location: index.php");
        }
    }
     function lire(){
        $sql = "SELECT * FROM messages";
        $result = $this->conn->query($sql);
        return $result;
    }
}