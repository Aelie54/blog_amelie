<?php

session_start();

require_once("../config/config.php");
require_once("../model/ArticleModel.php");
require_once("../helpers/redirect.php");

if (!isset($_GET['action'])) {
    die("Params needed");
}



$action = $_GET['action'];

switch ($action) {
    case 'add': //ici!
        add();
        break;
    case 'show':
        show();
        break;
    case 'modify':
        
        modify();

        break;
    default:
        die("no action provide");
        break;
}



function add()
{
    global $domaine;
    //var_dump($domaine); die();


    if (!isset(
        $_POST['user_id'],
        $_POST['title'],
        $_POST['content'],
        $_POST['categorie'],

    )) {
        redirect('Location: http://localhost/blog_amelie/vue/article/add.php?error=un_parametre_manque_à_la_requete');
    }

    
    $isValid = checkAddParams($_POST['user_id'], $_POST['title'],  $_POST['content'], $_POST['categorie']);
    //var_dump($isValid); die();

}



function show()
{
    global $domaine;
    redirect('Location: http://localhost/blog_amelie/vue/articles/articles.php');
}



function modify()
{

    if (empty($_POST)) {
        if (!isset($_GET['id'])) {
            die('missed parameters');
        }

        $article_id =  htmlspecialchars(strip_tags($_GET['id']));
        redirect('Location: http://localhost/blog_amelie/vue/articles/modifyArticle.php?id='. $_POST['article_id']);
    }



    if (isset($_POST['article_id'], $_POST['title'], $_POST['content'])) {
        $isModify = modifyArticle($_POST['article_id'], $_POST['title'], $_POST['content'], $_SESSION['user']['id']);
       
        ///var_dump($isModify); die();

        if (!$isModify['exist']) {
            
            redirect('http://localhost/blog_amelie/vue/articles/article.php?id='. $_POST['article_id']);
            
        }
    }

    redirect( 'http://localhost/blog_amelie/vue/articles/articles.php');

}


function checkAddParams($user_id, $title, $content, $categorie) {
    global $error;
    $user_id =  htmlspecialchars(strip_tags($user_id));
    $title =  htmlspecialchars(strip_tags($title));
    $content =  htmlspecialchars(strip_tags($content));
    $categorie =  htmlspecialchars(strip_tags($categorie));

    if ( empty($user_id) || empty($title) ||  empty($content) || empty($categorie)) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    insertArticle($user_id, $title, $content, $categorie);
}

function insertArticle($user_id, $title, $content, $categorie) {
    global $connexion;
    global $domaine;
    $query = $connexion->prepare("INSERT INTO `article` (`title`, `content`, `user_id`) VALUES (:title, :content, :user_id) ");
    $reponse = $query->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id]);

    if($reponse) {
       header("location: http://localhost/blog_amelie/vue/articles/article.php");
       return;
    } else {
        header("Location: http://localhost/blog_amelie/vue/articles/add.php ");
        return;
    }
}


