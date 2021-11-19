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

        return $error ;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error ["message"].= "Saisissez un email valide svp";
        $error ["exist"] .= true ;

        return $error ;
    }

    $password = passwordHash ($password);
    
    addUser ($pseudo, $email, $password, $user_type, $accepted);


    return $error ;
}

//si bien renseigné, on intègre le nouvel utilisateur dans la table
function addUser($pseudo, $email, $password, $user_type, $accepted) 
{
    global $connexion;
    global $error;

    $query = $connexion->prepare("INSERT INTO `user` (`pseudo`, `email`, `pwd`, `user_type`, `accepted`) values (:pseudo, :email, :pwd, :user_type, :accepted");
    $response = $query->execute(["pseudo"=>$pseudo, "email"=>$email, "pwd"=>$password, "user_type"=>$user_type, "accepted"=>$accepted]);

    if (!$response) {

        $error["message"] .= "Une erreur s'est produite durant l'insertion" ;
        $error["exist"] = true ;
     }

}

function passwordHash($password) {
    $hash_password = passwordHash($password, PASSWORD_DEFAULT);

    return $hash_password;
}