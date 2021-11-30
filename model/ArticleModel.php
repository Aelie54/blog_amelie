<?php
require_once("../config/mysql.php");
require_once("../config/config.php");




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




function modifyArticle($article_id, $title, $content, $user_id, $is_draft) {
    global $connexion;
    global $error;

    /*$is_draft =0 ;*/

    if ( empty($_POST['is_draft'] ) ) {
        $is_draft = 0;
    }
    
    if ( $_POST['is_draft'] == "on") {
        $is_draft = 1;   /*var_dump($is_draft); die(); */
    }

    try {
        $query = $connexion->prepare("UPDATE `article` SET `title` = :title , `content`= :content, `is_draft`= :is_draft  WHERE `user_id` = :user_id AND `id`= :article_id ");
        $response = $query->execute(['article_id' => $article_id, 'content' => $content, 'title' => $title, 'user_id' => $user_id, 'is_draft' => $is_draft]);
    } catch ( \PDOException $err) {
        $error_code = $err->getCode();
        $error_msg = $err->getMessage();
        $error["message"] .= $error_msg;
        $error["exist"] = true;

        return $error;
    }

    if (!$response) {
        $error["message"] .= "Une erreur s'est produite durant la mofication de l'article'";
        $error["exist"] = true;
        return $error;
    }

    return $error;
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