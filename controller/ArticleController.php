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
    case 'add':
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
    if (!isset(
        $_POST['user_id'],
        $_POST['title'],
        $_POST['content'],
        $_POST['categorie'],
    )) {
        redirect('Location: http://localhost/blog_amelie/vue/article/add.php?error=un parametre manque à la requete');
    }

    $isValid = checkAddParams($_POST['user_id'], $_POST['title'],  $_POST['content'], $_POST['categorie']);
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