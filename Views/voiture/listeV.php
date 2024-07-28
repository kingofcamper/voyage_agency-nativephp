<?php
include "../../Classes/Voiture.php";
$voiture = new Voiture();

//Liste des voitures
$listeV = $voiture->listeV();

?>
<html lang="en">
<head>
    <title>Liste des voitures</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="margin: 50px">
<h1>Liste des voitures </h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Serie</th>
        <th scope="col">Couleur</th>
        <th scope="col">Prix Jour</th>
        <th scope="col">Modele</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($v = $listeV->fetch()){
        echo "<tr>
                        <td>".$v['serie']."</td>
                        <td>".$v['couleur']."</td>
                        <td>".$v['prixJour']."</td>
                        <td>".$voiture->getModeleById($v['idM'])['nom']."</td>
                    </tr>";
    }

    ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
