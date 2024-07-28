<?php
include "../../Classes/Client.php";
//Instance de la classe Client
$client = new Client();

//La liste des clients
$clients = $client->listeClient();
$listeC = [];
while ($c = $clients->fetch()){
    $listeC[] = $c;
}

//Suppression
if(isset($_GET['idC'])){
    $client->deleteClient($_GET['idC']);
    header("location: listeC.php");
}
?>
<html lang="en">
<head>
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="../style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="margin: 50px">
<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars" id="btn"></i>
    <i class="fas fa-times" id="cancel"></i>
</label>
<div class="sidebar">
    <header>Location Voiture</header>
    <ul>
        <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
        <li><a href="client/listeC.php"><i class="fas fa-link"></i>Gestion des clients</a></li>
        <li><a href="location/listeLocation.php"><i class="fas fa-stream"></i>Gestion des locations</a></li>
        <li><a href="voiture/listeV.php"><i class="fas fa-calendar-week"></i>Gestion des voitures</a></li>
    </ul>
</div>

<section>
<h1>Liste des clients </h1>
<table class="table" style="background-color: white">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Adresse</th>
        <th scope="col">Delete</th>
        <th scope="col">Update</th>
    </tr>
    </thead>
    <tbody>
        <?php
            foreach ($listeC as $c){
                echo "<tr>
                        <td>".$c['nom']."</td>
                        <td>".$c['prenom']."</td>
                        <td>".$c['adresse']."</td>
                        <td><a href='?idC=".$c['id']."'>Delete</a></td>
                        <td><a href='updateClient.php?idC=".$c['id']."'>MAJ</a></td>
                    </tr>";
            }

        ?>
    </tbody>
</table>
</section>
</body>

</html>
