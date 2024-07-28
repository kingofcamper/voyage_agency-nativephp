<?php

class Voiture
{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=locationvoituretica',
            "root", "");
    }

    //Add voiture
    function addVoiture($data){
        $s = $data['serie'];
        $c = $data['couleur'];
        $pj = $data['prixJ'];
        $modele = $data['modele'];
        $this->db->exec("insert into voiture 
values ('', '$s','$c','$pj','$modele')");

    }

    //Liste modele
    function listeM(){
        return $this->db->query("select * from modele");
    }

    //Liste des voitures
    function listeV(){
        return $this->db->query("select * from voiture");
    }

    //Get Modele by id
    function getModeleById($id){
        return $this->db->query("select * from modele where id='$id'")->fetch();
    }

    //Get Voiture by id
    function getVoitureById($id){
        return $this->db->query("select * from voiture where id='$id'")->fetch();
    }
}