<?php
include "../../Classes/Location.php";
include "../../Classes/Voiture.php";
include "../../Classes/Client.php";
$voiture = new Voiture();
$client = new Client();
$location = new Location();
//Liste des locations
$listeL= $location->listeL();

//Action
//Annuler
if(isset($_GET['idL']) AND $_GET['etat'] == 'annuler'){
    $location->annulerL($_GET['idL']);
    header("location: listeLocation.php");
}
//Confirmer
if(isset($_GET['idL']) AND $_GET['etat'] == 'confirmer'){
    $location->confirmerL($_GET['idL']);
    header("location: listeLocation.php");
}
?>
<html lang="en">
<head>
    <title>Liste des Locations</title>
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="margin: 50px">
<?php
include "../nav.php";
?>
<h1>Liste des clients </h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Date début</th>
        <th scope="col">Date Retour</th>
        <th scope="col">Prix Total</th>
        <th scope="col">Voiture</th>
        <th scope="col">Client</th>
        <th scope="col">Etat</th>
        <th scope="col">Annuler</th>
        <th scope="col">Confirmer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //while + fetch pour parcourir un rèsultat de la requete query()
    while ($l = $listeL->fetch()){
       echo "<tr>
                <td>{$l['dateD']}</td>
                <td>{$l['dateR']}</td>
                <td>{$l['prixTotal']}</td>
                <td>{$voiture->getVoitureById($l['idV'])['serie']}</td>
                <td>{$client->getClientById($l['idC'])['nom']}</td>
                <td>{$l['etat']}</td>
                <td><a href='?idL={$l['id']}& etat=annuler'>Annuler</a></td>
                <td><a href='?idL={$l['id']}& etat=confirmer'>Confirmer</a></td>
            </tr>" ;
    }

    ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
