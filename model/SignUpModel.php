<?php

require_once("../config/mysql.php");

$error = [
    "message" => "",
    "existe" => false
];

// pour verifier si formulaire bien renseigné
function checkSignUp($pseudo, $email, $password, $user_type, $accepted)
{
    global $error;
    $pseudo = htmlspecialchars(strip_tags($_GET['pseudo']));
    $email = htmlspecialchars(strip_tags($_GET['email']));
    $pasword = htmlspecialchars(strip_tags($_GET['pasword']));
    $user_type = htmlspecialchars(strip_tags($_GET['user_type']));
    $message = htmlspecialchars(strip_tags($_GET['message']));
    $accepted = htmlspecialchars(strip_tags($_GET['accepted']));


    if (empty($pseudo) || empty($email)|| empty($pasword)|| empty($user_type)) {
        $error ["message"] .= "veuillez remplir tous les champs svp ! </br>";
        $error ["exist"] .= true ;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error ["message"].= "Saisissez un email valide svp";
        $error ["exist"] .= true ;
    }

    $isInserted =  addUser ($pseudo, $email, $password, $user_type, $accepted);
}

//si bien renseigner, on intègre le nouvel utilisateur dans la table
function addUser($pseudo, $email, $password, $user_type, $accepted) {
    global $connexion;
    $query = $connexion->prepare("INSERT INTO `user` (`pseudo`, `email`, `pwd`, `user_type`, `accepted`) values (:pseudo, :email, :pwd, :user_type, :accepted");
    $reponse = $query->execute(["pseudo"=>$pseudo, "email"=>$email, "pwd"=>$password, "user_type"=>$user_type, "accepted"=>$accepted]);

    return $reponse;

}
