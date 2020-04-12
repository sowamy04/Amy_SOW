<?php
$prenomErreur = $nomErreur = $loginErreur = $passwordErreur= $repeatPasswordErreur= $avatarErreur = "";
$prenom = $nom = $login = $password = $repeatPassword = $avatar = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["prenom"])) {
    $prenomErreur = "Prenom est requis";
  } else {
    $prenom = test_input($_POST["prenom"]);
  }

  if (empty($_POST["nom"])) {
    $nomErreur = "Nom est requis";
  } else {
    $nom = test_input($_POST["nom"]);
  }

  if (empty($_POST["login"])) {
    $loginErreur = "Login est requis";
  } else {
    $login = test_input($_POST["login"]);
  }

  if (empty($_POST["password"])) {
    $passwordErreur = "Password est requis";
  } else {
    $password = test_input($_POST["password"]);
  }

  if (empty($_POST["repeatPassword"])) {
    $repeatPasswordErreur = "Confirmation de mot de passe est requise";
  } else {
    $repeatPassword = test_input($_POST["repeatPassword"]);
  }

  if (empty($_POST["avatar"])) {
    $avatarErreur = "Le choix d'un avatar est obligatoire";
  } else {
    $avatar = test_input($_POST["avatar"]);
  }

}
?>