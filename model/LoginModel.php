<?php
require_once("../config/mysql.php");

if (!isset($_SERVER["HTTP_REFERER"])) {
    die("access restricted");
}

if(! $_SERVER["HTTP_REFERER"] === "AccountController.php") {
    die("access restricted");
}

$error = [
    "message" => "",
    "exist" => false
];

function checkLogin($email, $password)
{
    global $error;
    //On sécurise les données d'email et password
    $email =  htmlspecialchars(strip_tags($email));
    $password =  htmlspecialchars(strip_tags($password));

    //si l'un des champs est vide on retourne une erreur
    if ( empty($email) || empty($password)) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    //on vérifie que l'email renseigné a bien un format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["message"] .= "Saisissez un adresse email valide";
        $error["exist"] = true;

        return $error;
    }

    //on appelle la fonction : 
    getPasswordUser($email, $password);

    return $error;
}


//on va chercher dans la table le password pour lequel l'email renseigné = email de la database
function getPasswordUser($email, $password){

    global $connexion;
    global $error;

    $query = $connexion->prepare("SELECT `password` FROM `user` WHERE email =:email;");
    $response = $query->execute(["email" => $email]);

    if (!$response) {
        $error["message"] .= "Une erreur s'est produite";
        $error["exist"] = true ;
        
        return $error ;
    }

    $aDatas = $query->fetchAll();

    //une fois trouvé on appelle la fonction pour vérifier les deux mots de passe
    verifyPassword($aDatas, $password);

    return $error ;

}


//on verifie que le password existe par cette fonction
function verifyPassword($aDatas, $password)
{
    global $error;
    $aDatas = $aDatas[0];

    //si le password n'existe pas...
    if (!isset($aDatas['password'])) {
        $error['message'] .= "Aucun utilisateur n'a était trouvé";
        $error['exist'] = true;

        return $error;
    }
    
    //si le mot de passe est bien celui attendu
    $passwordVerif = password_verify($password, $aDatas['password']);

    if (!$passwordVerif) {
        $error['message'] .= 'Mot de passe incorrect';
        $error['exist'] = true;

        return $error;
    }
}









