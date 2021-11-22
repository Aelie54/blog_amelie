<?php
require_once("../config/config.php");
require_once("../model/ArticleAddModel.php");

if(!isset($_GET['type'])){ 
    header("Location:". $domaine . "/vue/article/add.php?error=un parametre manque à la requète");
    return;
}

$type = $_GET['type'];

if($_GET['type']==="add"){
    if (!isset(
        $_POST['title'],
        $_POST['content'],
        $_POST['categorie']
    ) )

    return;
    header("Location:" . $domaine . "/vue/article/add.php,error=un parametre manque à la requete");
    return;
    }

    $isValid = checkAddParams($_POST['title'],$_POST['content'],$_POST['categorie']);