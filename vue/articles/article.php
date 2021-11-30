<?php
session_start();
require_once("../../config/mysql.php");
require_once('../../helpers/ArticlesHelper.php');

if (!isset($_GET['id'])) {
    die('Il manque un paramètre/Article.php');
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

                    <?php 
                    if(!isset($_SESSION['user']['pseudo'] )){
                        echo '<li><a href="/blog_amelie/vue/account/login.php">login</a></li>' ; 
                        echo '<li><a href="/blog_amelie/vue/account/signup.php">Signup</a></li>'; 
                        } ?> 

                    <li><a href="/blog_amelie/vue/articles/articles.php">Articles</a></li>
                    <li><a href="/blog_amelie/">Accueil</a></li>
                   
                   <li><?php //var_dump($_SESSION); die();
                    if(isset($_SESSION['user']['pseudo'] )){
                        echo '<li><a href="/blog_amelie/vue/account/logout.php">Log out</a></li>' ; 
                        echo '<li><a href="add_once.php">Ajouter article</a></li>';
                        echo '<li><a href="/blog_amelie/vue/articles/mesArticles.php">Mes Articles publiés</a></li>';
                        echo '<li><a href="/blog_amelie/vue/articles/mesbrouillons.php">Mes brouillons</a></li>';
                        } ?> 

                    <li><?php //var_dump($_SESSION); die();
                    if(isset($_SESSION['user']['pseudo'] )){
                        echo "<div id='pseudo'>" . $_SESSION['user']['pseudo'] . "</div>" ; } ?> </li>
                </ul> 
            </aside>

            
            <div id="container">

                <div class="mes_articles">

                <h2><?php echo $aArticle['title'] ;?></h2>

                   <p> 
                   <?php echo $aArticle['content'] ;?>
                    </p>
                  
                   <?php
                   if(isset ( $_SESSION['user']['pseudo'] )
                   ){
                       if($_SESSION['user']['id'] == $aArticle['user_id']){
                           echo '<button> <a href="/blog_amelie/vue/articles/modifyArticle.php?id=' . $aArticle['id'] . '"> Modifier</a></button>';
                        }
                    }
                    
                   ?>
                
            </div>
</main>

</body> 