<?php
session_start();
require_once("../blog_amelie/config/config.php");
require_once("../blog_amelie/config/mysql.php");
//var_dump($_SESSION); die ;


$error = [
    "message" => "",
    "exist" => false
];

//CONTROLLER
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    
    
    if ($_GET['type'] === "add") {
    
        $is_draft =0 ;

        if(!isset(
            $_POST['user_id'],
            $_POST['title'],
            $_POST['content'],
            $_POST['categorie']
            )) {
                header("Location:" . $domaine . "/add_once.php?error=un parametre manque à la requete");
                return;
            }

            if ( empty($_POST['is_draft'] ) ) {
                $is_draft = 0;
            }
            
            if ( $_POST['is_draft'] == "on") {
                $is_draft = 1;
                /*var_dump($is_draft); die(); */
            }
            
            $isValid = checkAddParams($_POST['user_id'], $_POST['title'],  $_POST['content'], $_POST['categorie'], $is_draft);
        
        }
}   

//MODEL
function checkAddParams($user_id, $title, $content, $categorie, $is_draft) {
    global $error;

    $user_id =  htmlspecialchars(strip_tags($user_id));
    $title =  htmlspecialchars(strip_tags($title));
    $content =  htmlspecialchars(strip_tags($content));
    $categorie =  htmlspecialchars(strip_tags($categorie));
    $is_draft =  htmlspecialchars(strip_tags($is_draft));


    if ( empty($user_id) || empty($title) ||  empty($content) || empty($categorie)) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    insertArticle($user_id, $title, $content, $categorie, $is_draft);
    
}


function insertArticle($user_id, $title, $content, $categorie, $is_draft) {
    global $connexion;
    global $domaine;
    $query = $connexion->prepare("INSERT INTO `article` (`title`, `content`, `user_id`, `categorie`, `is_draft`) VALUES (:title, :content, :user_id, :categorie, :is_draft)");
    $reponse = $query->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id, 'categorie' => $categorie,  'is_draft' => $is_draft]);


    if($reponse) {
        header("location: http://localhost/blog_amelie/vue/articles/articles.php");
        return;
     } else {
        header("Location: http://localhost/blog_amelie/vue/articles/add.php");
        return;
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="monblog" content="articles blog">
    <meta name="keywords" content="blog">
    <link rel="stylesheet" href="../blog_amelie/asset/style2.css">
    <title>Blog Poésie</title>
    <head></head>
    <header><h1>Le blog Poésie d'Amélie</h1></header>
    
    <main id="main" >     
        <div id="container">
            <form action="?type=add" method="post" id="form-control">
            <div class="mes_articles">  

                <h3> Ajouter un article </h3><br>

                <form action="?type=add" method="POST" id="form-control">
                    <input type="hidden" name="user_id" id="user_id" value="<?php if(isset($_SESSION['user']['id'])) { echo $_SESSION['user']['id']; } ?>">
                    <div>
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" required />
                    </div>
                    <div>
                        <label for="content">Ici le contenu de l'article </label>
                        <textarea name="content" id="content" required></textarea>
                    </div>
                    <div>
                        <select name="categorie" id="categorie">
                            <option value="1">Héros</option>
                            <option value="2">Avengers</option>
                            <option value="3">Méchants</option>
                        </select><br><br>
                    </div>
                    

                        <!-- brouillon? -->
                        <div>
                            <label name="is_draft">Brouillon - en cours de rédaction</label>
                            <input type="checkbox" name="is_draft" id="is_draft">
                        </div><br>


                    <div id="login_button">
                        <input type="submit" value="Ajouter l'article" />
                    </div>

                    <span>
                        <small id="error">

                            <?php if (isset($_GET['error'])) {
                                echo $_GET['error'];
                            } ?>

                        </small>
                    </span>
                    <br><a href="/blog_amelie/vue/account/signup.php">Je créé mon compte</a>
            </div>
        </div>
        </form>  
    </main>

</html>