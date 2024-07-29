<?php

class Trip
{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=locationvoituretica',
            "root", "");
    }

    function index(){
        return $this->db->query("select * from trip");
    }
    function create($data){
        $destination = $data['destination'];
        $description = $data['description'];
        $price = $data['price'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $available_seats = $data['available_seats'];
        $this->db->exec("insert into trip 
values ('', '$destination','$description','$price','$start_date','$end_date','$available_seats')");
    }

    //Get Modele by id
    function getOneById($id){
        return $this->db->query("select * from trip where id='$id'")->fetch();
    }

    function delete($id){
        return $this->db->exec("delete from trip where id='$id'");
    }
}