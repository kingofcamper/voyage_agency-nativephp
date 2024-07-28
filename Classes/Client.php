<?php

class Client
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=voyage-reservation',
            "root", "");
    }

    function listeClient()
    {
        $q = "select * from user where role='ROLE_CLIENT'";
        $clients = $this->db->query($q);
        return $clients;
    }

    //Ajout d'1 client
    function addClient($data)//$data = $_POST
    {
        $nom = $data['nom'];
        $pr = $data['prenom'];
        $a = $data['adresse'];
        $this->db->exec("insert into client values ('','$nom', '$pr', '$a')");
    }

    //Suppression d'1 client
    function deleteClient($id)
    {
        $this->db->exec("delete from client where id='$id'");
    }

    //MAJ d'1 client
    function updateClient($data)
    {
        $id = $data['idC'];
        $n = $data['nom'];
        $p = $data['prenom'];
        $a = $data['adresse'];
        $this->db->exec("update client set nom ='$n', prenom='$p', adresse = '$a' where id='$id'");
    }

    //Get Client by ID
    function getClientById($id)
    {
        $clients = $this->db->query("select * from client where id='$id'");
        return $clients->fetch();
    }
}