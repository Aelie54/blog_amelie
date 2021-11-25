<?php
session_start();
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

            <?php
            if (isset($aArticles['exist'])) {
                echo $_GET['datas']['message'];
            }

            /*echo '<div class="mes_articles"> <h3>Liste des articles:</h3>';
            foreach ($aArticles as $key => $array_element) {
             echo '<a href="/controller/ArticleController.php?action=modify&id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
             }echo "</div>";*/

            echo '<div class="mes_articles"> <h3>Liste des articles:</h3>';
            foreach ($aArticles as $key => $array_element) {
             echo '<a href="/blog_amelie/vue/articles/article.php?id=' . $array_element['id'] . '"><br>' . $array_element["title"] . '</a>';
             }echo "</div>";
           
            foreach ($aArticles as $key => $array_element) {
                    echo '<div class="mes_articles"><h3>'. $array_element['title'] . '</h3><p>'. $array_element['title'] .'<br>'. $array_element['categorie'].'</p></div>';
            }

            ?>
</div>

</main>

</body>

</html>