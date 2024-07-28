<?php

class Authentication
{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=voyage-reservation',
            "root", "");
    }

    //Sign up
    function signup($data){
        if($this->verifEmail($data['email'])){
            return false;
        }
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $pass = md5($data['password']);
        $role = "ROLE_CLIENT";
        $this->db->exec("insert into user values ('', '$first_name','$last_name','$email','$role','$pass')");
    }
    function signin($email, $password){
        return $this->db->query("select * from user where email='$email' and password='$password'");
    }

    //Vérification Username
    function verifEmail($email){
        return $this->db->query("select * from user where email='$email'");
    }
}