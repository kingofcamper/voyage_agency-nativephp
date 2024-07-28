<?php

class Location
{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=locationvoituretica',
            "root", "");
    }
    //Add d'une location
    function addLocation($data)
    {
        $dd = $data['dd'];
        $dr = $data['dr'];
        $client = $data['client'];
        $voiture = $data['voiture'];
        $etat = 'en cours';
        $prixTotal = 0;

        //  Disponiblité de la voiture $voiture
        $q = "select * from location where ((dateD < '$dd' AND dateR > '$dd') OR (dateD < '$dr' AND dateR > '$dr')) AND idV='$voiture' AND etat != 'annulee'";
        $results = $this->db->query($q);
        if ($results->rowCount() != 0) {
            echo "La voiture n'est pas disponible";
        } else {
            //Calcul Prix Total
            //1-  Nombre de jours
            $diff = strtotime($dr) - strtotime($dd);//secondes
            $nbrJour = abs($diff / (60 * 60) / 24);

            //2- Prix Jour
            $v = $this->db->query("select prixJour from voiture where id='$voiture'")->fetch();
            $prixJour = $v['prixJour'];

            //3- PrixT
            $prixTotal = $nbrJour * $prixJour;
            //Insert
            $this->db->exec("insert into location 
values('', '$dd', '$dr','$prixTotal','$etat','$voiture', '$client')");
        }
    }

    //Liste des locations
    function listeL(){
        return $this->db->query("select * from location");
    }

    //Annuler
    function annulerL($id)
    {
     $this->db->exec("update location set etat='annulee' where id='$id'");
    }
    //Confirmer
    function confirmerL($id)
    {
        $this->db->exec("update location set etat='confirmee' where id='$id'");
    }
}