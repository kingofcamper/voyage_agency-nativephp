<?php
include "../../Classes/Client.php";
$client = new Client();

if(isset($_POST['add_client'])){
    $client->addClient($_POST);
    header("location: listeC.php");
}
?>
<html lang="en">
<head>
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="margin: 50px">

<h1>Add Client </h1>
<form method="post" action="">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom"  name="nom" placeholder="Entrer nom">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer prénom">
    </div>

    <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrer adresse">
    </div>

    <button type="submit" name="add_client" class="btn btn-primary">Ajouter Client</button>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
