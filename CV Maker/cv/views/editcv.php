<?php

include '../controller/CVController.php';

$error = "";

// create CV
$cv = null;

// create an instance of the controller
$cvC = new CVController();
if (
    isset($_POST["profile_image"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["profession"]) &&
    isset($_POST["email"]) &&
    isset($_POST["numtel"]) &&
    isset($_POST["poste"]) &&
    isset($_POST["entreprise"]) &&
    isset($_POST["lieue"]) &&
    isset($_POST["deb"]) &&
    isset($_POST["fin"]) &&
    isset($_POST["objectif"]) &&
    isset($_POST["competences"]) &&
    isset($_POST["diplome"]) &&
    isset($_POST["institution"]) &&
    isset($_POST["lieud"]) &&
    isset($_POST["from1"]) &&
    isset($_POST["to1"])
) {
    if (
        !empty($_POST["profile_image"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["profession"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["numtel"]) &&
        !empty($_POST["poste"]) &&
        !empty($_POST["entreprise"]) &&
        !empty($_POST["lieue"]) &&
        !empty($_POST["deb"]) &&
        !empty($_POST["fin"]) &&
        !empty($_POST["objectif"]) &&
        !empty($_POST["competences"]) &&
        !empty($_POST["diplome"]) &&
        !empty($_POST["institution"]) &&
        !empty($_POST["lieud"]) &&
        !empty($_POST["from1"]) &&
        !empty($_POST["to1"])
    ) {
        $dateDebutEntreprise = new DateTime($_POST["deb"]);
        $dateFinEntreprise = new DateTime($_POST["fin"]);
        $dateDebutDiploma = new DateTime($_POST["from1"]);
        $dateFinDiploma = new DateTime($_POST["to1"]);
        $dateDebutEntrepriseString = $dateDebutEntreprise->format('Y-m-d');
        $dateFinEntrepriseString = $dateFinEntreprise->format('Y-m-d');
        $dateDebutDiplomaString = $dateDebutDiploma->format('Y-m-d');
        $dateFinDiplomaString = $dateFinDiploma->format('Y-m-d');

        $cv = new CV(
            $_POST["profile_image"],
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["profession"],
            $_POST["email"],
            $_POST["numtel"],
            $_POST["poste"],
            $_POST["entreprise"],
            $_POST["lieue"],
            $dateDebutEntrepriseString,
            $dateFinEntrepriseString,
            $_POST["objectif"],
            $_POST["competences"],
            $_POST["diplome"],
            $_POST["institution"],
            $_POST["lieud"],
            $dateDebutDiplomaString,
            $dateFinDiplomaString
        );
        $cvC->updateCV($cv, $_POST['cvid']);
        header('Location:cv_list.php');
    } else
        $error = "Missing information";
}
?>