<?php
session_start();
require_once("./config/config.php"); //configuration php
//require_once("./config/mysql.php"); connexion à la bdd

//CONNEXION BDD dejà dans un fichier voir require


        $username = "root";
        $password = ""; 
        $host = "localhost"; //localhost 
        $db = "BLOG";
        $port = "3306";

        $option = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8;port=$port";

        try {
            $connexion = new \PDO($dsn, $username, $password, $option);
        } catch (\PDOException $error) {
            $message = $error->getMessage();
            var_dump($message);
            die("Erreur lors de ma connexion PDO");
        }

//CONTROLLER
if (isset( $_POST['email'], $_POST['password'])) {
    $isValid = checkLogin(
        $_POST['email'],
        $_POST['password']
    );

    if (!$isValid['exist']) {
        header("Location:" . $domaine . "/index.php");
        return;
    }

    header("Location:" . $domaine . "/vues/account/login.php?error=". $isValid['message']);
}

//MODEL
require_once("./config/mysql.php");

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

    $query = $connexion->prepare("SELECT `password`, `id`, `pseudo` FROM `user` WHERE email =:email;");
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

    createSession($aDatas);
    
}

function createSession($aDatas){

    $_SESSION['user']['id'] = $aDatas['id'];
    $_SESSION['user']['pseudo'] = $aDatas['pseudo'];
}
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="monblog" content="articles blog">
  <meta name="keywords" content="blog">
  <link rel="stylesheet" href="./asset/style2.css">
  <title>Blog Poésie</title>
</head>
<body>

    <header><h1>Le blog Poésie d'Amélie</h1></header>

<main id="main" >     
            <div id="container">
                <div class="mes_articles">
                    <form action="?type=add" method="post" id="form-control">
                        <h3> Connexion </h3>
                        <br>
                            <div>
                                <label for="email">Email :</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div>
                                <label for="mot_de_passe">Password :</label>
                                <input type="password" id="mdp" name="password" required="required">
                            </div>
                            <div>
                            <small><?php  if( isset($_GET['error'])) { echo $_GET['error'];  } ?></small>
                            </div>
                            <div class="boutons_valider">
                                <br><input class="Valider"
                           type="submit"
                           value="Valider">
                            </div>
                    </form>
                    <br>
                    <a href="/blog_amelie/vue/account/signup.php">Je créé mon compte</a>
                    <br>
                </div>
            </div>
    </main>

    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>