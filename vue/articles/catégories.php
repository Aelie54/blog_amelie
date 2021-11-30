<?php
session_start();
//var_dump($_SESSION['user']['pseudo'] ); die();

require_once("../../config/mysql.php");
require_once('../../helpers/ArticlesHelper.php');

$aArticles = getArticles(); 

?>
<!DOCTYPE html>
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

<main id="main">
<aside>
                <ul>

                    <?php 
                    if(!isset($_SESSION['user']['pseudo'] )){
                        echo '<li><a href="/blog_amelie/vue/account/login.php">login</a></li>' ; 
                        echo '<li><a href="/blog_amelie/vue/account/signup.php">Signup</a></li>'; 
                        } ?> 

                    <li><a href="/blog_amelie/vue/articles/articles.php">Articles</a></li>
                    <li><a href="/blog_amelie/vue/articles/catégories.php">Articles par catégories</a></li>
                    <li><a href="/blog_amelie/">Accueil</a></li>
                   
                   <li><?php //var_dump($_SESSION); die();
                    if(isset($_SESSION['user']['pseudo'] )){
                        echo '<li><a href="/blog_amelie/vue/account/logout.php">Log out</a></li>' ; 
                        echo '<li><a href="/blog_amelie/add_once.php">Ajouter article</a></li>';
                        echo '<li><a href="/blog_amelie/vue/articles/mesArticles.php">Mes Articles publiés</a></li>';
                        echo '<li><a href="/blog_amelie/vue/articles/mesbrouillons.php">Mes brouillons</a></li>';
                        } ?> 

                    <li><?php //var_dump($_SESSION); die();
                    if(isset($_SESSION['user']['pseudo'] )){
                        echo "<div id='pseudo'>" . $_SESSION['user']['pseudo'] . "</div>" ; } ?> </li>
                </ul> 
            </aside>

            <div id="container">

<?php

if (isset($aArticles['exist'])) {
    echo $_GET['datas']['message'];
}


echo '<div class="mes_articles"> <h3>Liste des articles de cat1:</h3>';
foreach ($aArticles as $key => $array_element) {
    if($array_element['categorie']=="cat 1"){
        if($array_element['is_draft']==0){
            echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
        }
    }
}
echo "</div>";


echo '<div class="mes_articles"> <h3>Liste des articles de cat2:</h3>';
foreach ($aArticles as $key => $array_element) {
    if($array_element['categorie']=="cat 2"){
        if($array_element['is_draft']==0){
            echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
        }
    }
}
echo "</div>";

echo '<div class="mes_articles"> <h3>Liste des articles de cat3:</h3>';
foreach ($aArticles as $key => $array_element) {
    if($array_element['categorie']=="cat 3"){
        if($array_element['is_draft']==0){
            echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
        }
    }
}
echo "</div>";

echo '<div class="mes_articles"> <h3>Liste des articles de cat4:</h3>';
foreach ($aArticles as $key => $array_element) {
    if($array_element['categorie']=="cat 4"){
        if($array_element['is_draft']==0){
            echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
        }
    }
}
echo "</div>";

echo '<div class="mes_articles"> <h3>Liste des articles de cat5:</h3>';
foreach ($aArticles as $key => $array_element) {
    if($array_element['categorie']=="cat 5"){
        if($array_element['is_draft']==0){
            echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
        }
    }
}
echo "</div>";



?>
</div>

</main>

</body>

</html>