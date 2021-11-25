<?php
session_start();
require_once("../../config/mysql.php");
require_once('../../helpers/ArticlesHelper.php');

if (!isset($_GET['id'])) {
    die('Il manque un paramètre');
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
  <script src="script.js"></script> 
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

                <h2><?php echo $aArticle['title'] ;?></h2>

                   <p> 
                   <?php echo $aArticle['content'] ;?>
                    </p>

                   <button> 
                  
                   <?php
                    echo '<a href="/blog_amelie/vue/articles/modifyArticle.php?id=' . $aArticle['id'] . '"> Modifier</a>' 
                   ?>

                    </button>
                
            </div>
</main>

</body>