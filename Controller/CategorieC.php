<?php
require_once('../config.php');
require_once('../Model/Categorie.php');

$error = "";
$categorie = null;

// Create an instance of the controller
$Categorie = new Categorie();

if (isset($_POST["nom"]) && isset($_POST["description"])) {
    if (!empty($_POST['nom']) && !empty($_POST["description"])) {
        // Create a new Categorie object with sanitized input values
        $categorie = new Categorie(
            null,
            $_POST['nom'],
            $_POST['description']
        );
        $Categorie->addCategorie($categorie);
        header('Location:../View/back-office.html');
    } else {
        $error = "Missing information";
    }
}
