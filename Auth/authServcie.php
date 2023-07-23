<?php
class Auth{
    function isAuth(){
        if (!$_SESSION['isAuth']) {
            header("Location:login.php");
        }
    }
    function logout(){
        
    }
}