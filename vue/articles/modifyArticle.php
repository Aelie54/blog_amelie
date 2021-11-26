<?php
session_start();
require_once("../../config/mysql.php");
require_once('../../helpers/ArticlesHelper.php');

if (!isset($_GET['id'])) {
    die('Il manque un paramètre ModifyArticle.php');
}

$aArticle = getArticle($_GET['id']);


?>

<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="monblog" content="articles blog">
  <meta name="keywords" content="blog">
  <link rel="stylesheet" href="../../asset/style2.css">
  <title>Blog Poésie</title>
</head>
<body>

    <header><h1>Le blog Poésie d'Amélie</h1></header>
 
<main id="main" >     

            <aside>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="/blog_amelie/vue/account/login.php">login</a></li>
                    <li><a href="login_once.php">login_once</a></li>
                    <li><a href="/blog_amelie/vue/account/signup.php">Signup</a></li>
                    <li><a href="signup_once.php">signup_once</a></li>
                    <li><a href="add_once.php">Add_once</a></li>
                    <li><a href="/blog_amelie/vue/articles/add.php">Add</a></li>
                    <li><a href="/blog_amelie/vue/articles/articles.php">Articles</a></li>
                    <li><a href="">Log out</a></li>
                </ul> 
            </aside>
            
            <div id="container">

                <div class="mes_articles">

                <h2>Modification d'un Article</h2>

                <form action="../../controller/ArticleController.php?action=modify" method="POST" id="form-control">
            
                <input type="hidden" name="article_id" id="article_id" value="<?=$aArticle['id']?>">

            <div>
                <label for="title">Modifier le Titre :</label>
                <input type="text" name="title" id="title" required value="<?=$aArticle['title']?>" />
            </div>

            <div>
                <label for="content" >Modifier le contenu de l'article :</label>
            </div>

            <div>
                <textarea type="text" name="content" id="content" required > 
                    <?=$aArticle['content']?>
                </textarea>
            </div>

            <!-- <div>
                <select name="categorie" id="categorie">
                    <option value="1">Héros</option>
                    <option value="2">Avengers</option>
                    <option value="3">Méchants</option>
                </select>
            </div> -->

            <div id="login_button">
                <input type="submit" value="Modifier l'article" />
            </div>

            <span>
                <small id="error">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </small>
            </span>

        </form>
                
            </div>
</main>

</body>