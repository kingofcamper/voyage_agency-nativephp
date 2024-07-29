<?php

class Reservation
{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=locationvoituretica',
            "root", "");
    }

    //Add voiture
    function create($data){
        $s = $data['serie'];
        $c = $data['couleur'];
        $pj = $data['prixJ'];
        $modele = $data['modele'];
        $this->db->exec("insert into reservation 
values ('', '$s','$c','$pj','$modele')");

    }
    function index(){
        return $this->db->query("select * from reservation");
    }

    function getOneById($id){
        return $this->db->query("select * from reservation where id='$id'")->fetch();
    }
}