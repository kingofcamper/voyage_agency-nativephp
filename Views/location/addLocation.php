<?php
include "../../Classes/Client.php";
include "../../Classes/Voiture.php";
include "../../Classes/Location.php";
$location = new Location();
$client = new Client();
$voiture = new Voiture();
//Liste des clients
$listeC = $client->listeClient();

//Liste des voitures
$listeV = $voiture->listeV();

//Add location
if(isset($_POST['add_location'])){
    $location->addLocation($_POST);
}
?>
<html lang="en">
<head>
    <title>Ajouter Location</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="margin: 50px">

<h1>Add Location </h1>
<form method="post" action="">
    <div class="form-group">
        <label for="dd">Date Début</label>
        <input type="date" class="form-control" id="dd"  name="dd" placeholder="Entrer date début">
    </div>
    <div class="form-group">
        <label for="dr">Date Retour</label>
        <input type="date" class="form-control" id="dr" name="dr" placeholder="Entrer date retour">
    </div>

    <div>
        <select name="client">
            <?php
            while ($c = $listeC->fetch()){
                echo "<option value='{$c['id']}'>{$c['nom']} {$c['prenom']} </option>";
            }
            ?>
        </select>
    </div>

    <div>
        <select name="voiture">
            <?php
            while ($v = $listeV->fetch()){
                echo "<option value='{$v['id']}'>{$v['serie']} </option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" name="add_location" class="btn btn-primary">Ajouter Location</button>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
