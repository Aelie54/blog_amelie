<?php
session_start();
//require_once("./config/config.php");
//require_once("./model/LoginModel.php");
require_once("./config/mysql.php");

if ( //le formulaire est-il bien renseigner?
    isset(
        $_POST['pseudo'], 
        $_POST['email'],
        $_POST['password'],
        $_POST['comfirm_password'],
        $_POST['user_type'],
        $_POST['accepted']
    )
){
    
    $isValid = checkSignUp(// si oui, on donne un nom aux inputs
        $_POST['pseudo'],
        $_POST['email'],
        $_POST['password'],
        $_POST['comfirm_password'],
        $_POST['user_type'],
        $_POST['accepted']
    );
        


  if ($isValid['exist']) {
    header('Location: http://localhost/blog_amelie/vue/account/signup.php');
    //header("Location:". $domaine ."/vues/account/signup.php");

    return ;
    }
    header('Location: http://localhost/blog_amelie/');
    //header("Location:". $domaine ."/vues/account/successfully.php");

    return;
}

$error = [
    "message" => "",
    "exist" => false
];

function checkSignUp($pseudo, $email, $password, $comfirm_password, $user_type, $accepted)
{
    global $error;//on securise les données renseignés dans les inputs
    $pseudo =  htmlspecialchars(strip_tags($pseudo));
    $email =  htmlspecialchars(strip_tags($email));
    $password =  htmlspecialchars(strip_tags($password));
    $comfirm_password =  htmlspecialchars(strip_tags($comfirm_password));
    $user_type =  htmlspecialchars(strip_tags($user_type));
    $accepted =  htmlspecialchars(strip_tags($accepted));
    $accepted =  $accepted === "on" ? 1 : 0;

    
    if ( //si un des champs est renseigné par du vide
        empty($pseudo) || empty($email) || empty($password)
        || empty($comfirm_password) || empty($user_type)
    ) 
        {//on envoie un message d'erreur
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //l'email est-il au format email?
        $error["message"] .= "Saisissez un adresse email valide";
        $error["exist"] = true;

        return $error;
    }
    
    $password = passwordHash($password);//on hache le mdp

    addUser($pseudo, $email, $password, $user_type, $accepted);//on ajoute les nouvel utilisateur

    return $error;
}

//fonction permettant d'ajouter le nouvel utilisateur dans la db
function addUser($pseudo, $email, $password, $user_type, $accepted)
{
    global $connexion;
    global $error;

    $query = $connexion->prepare("INSERT INTO `user`(`pseudo`, `email`, `password`, `accepted`)  VALUES (:pseudo, :email, :pwd, :accepted);");
    $response = $query->execute(["pseudo" => $pseudo,  "email" => $email, "pwd" => $password, "accepted" => $accepted]);
    if (!$response) {
        $error["message"] .= "Une erreur s'est produite durant l'insertion";
        $error["exist"] = true ;
    }
}


function passwordHash($password) { //fonction pour hacher le password
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    return $hash_password;
}?>

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

    <header>
        <h1>Le blog Poésie d'Amélie</h1>
    </header>

    <main id="main">

        <div id="container">

            <form action="?type=add" method="post">

                <div class="mes_articles">        

                        <h3> Inscris toi pour commenter </h3><br>
                            
                        <div>
                            <label for="pseudo">Pseudo :</label>
                            <input type="text" required="required" pattern="[a-Z_0-9]{4,8}" id="pseudo" name="pseudo"
                                    title="Que des lettres minuscules et chiffres">
                        </div>

                        <div>
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" />
                        </div>

                        <div>
                            <label for="password">Mot de passe : </label>
                            <input type="password" name="password" id="password" />
                        </div>

                        <div>
                            <label for="comfirm_password">Confirmer votre mot de passe </label>
                            <input type="password" name="comfirm_password" id="comfirm_password" />
                        </div>

                            <div>
                                <label for="user_type">Choissisez votre catégorie </label>
                                <select name="user_type" id="user_type">
                                    <optgroup label="Administrateurs">
                                        <option value="Admin">Admin</option>
                                        <option value="Moderator">Moderator</option>
                                    </optgroup>
                                    <optgroup label="Clients">
                                        <option value="Auteur">Auteur</option>
                                        <option value="Éditeur">Éditeur</option>
                                        <option value="Maison éditorial">Maison éditorial</option>
                                        <option value="Imprésario">Imprésario</option>
                                    </optgroup>
                                </select>
                            </div><br><br>

                            <fieldset>
                                <legend>J'accepte que mes données soient exploitées</legend>
                                <div>
                                    <label for="accepted">Oui, je l'autorise</label>
                                    <input type="checkbox" name="accepted" id="accepted" required>
                                </div>
                            </fieldset>

                        <div class="boutons_valider">
                            <br><input type="submit" value="S'inscrire" />
                    </div>
        
            </form>

            <br><a href="login.php">Je suis déjà inscrit</a><br>

        </div>
        
    </main>

    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>