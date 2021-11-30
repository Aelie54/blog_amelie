<?php session_start();
//session_destroy();
?>

<!doctype html>

<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="monblog" content="articles blog">
  <meta name="keywords" content="blog">
  <link rel="stylesheet" href="./asset/style2.css">
  <script src="script.js"></script> 
  <title>Blog Poésie</title>
</head>
<body>

    <header><h1>Le blog Poésie d'Amélie</h1></header>
    <!--  
            <nav id="navigation2">
    <a href="default.html">Home</a>
    <a href="news.asp">News</a>
    <a href="about.asp">About</a>
    <a href="connexion.html">Se connecter</a> 
            </nav>
        "-->

<main id="main" >     

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
                    <h2>Les Contemplations</h2>
                    <p>
                        Demain, dès l'aube, à l'heure où blanchit la campagne, <br>
                        Je partirai. Vois-tu, je sais que tu m'attends.<br>
                        J'irai par la forêt, j'irai par la montagne.<br>
                        Je ne puis demeurer loin de toi plus longtemps.<br>
                        <br>
                        Je marcherai les yeux fixés sur mes pensées,<br>
                        Sans rien voir au dehors, sans entendre aucun bruit,<br>
                        Seul, inconnu, le dos courbé, les mains croisées,<br>
                        Triste, et le jour pour moi sera comme la nuit.<br>
                        <br>
                        Je ne regarderai ni l’or du soir qui tombe,<br>
                        Ni les voiles au loin descendant vers Harfleur,<br>
                        Et quand j'arriverai, je mettrai sur ta tombe<br>
                        Un bouquet de houx vert et de bruyère en fleur.<br>
                        <br>
                        — Victor Hugo<br>
                    </p>
                </div>

                <div class="mes_articles">
                    <h2>L'albratos</h2>
                    <p>
                        A peine les ont-ils déposés sur les planches,<br>
                        Que ces rois de l’azur, maladroits et honteux,<br>
                        Laissent piteusement leurs grandes ailes blanches<br>
                        Comme des avirons traîner à côté d’eux.<br>
                        <br>
                        Ce voyageur ailé, comme il est gauche et veule !<br>
                        Lui, naguère si beau, qu’il est comique et laid !<br>
                        L’un agace son bec avec un brûle-gueule,<br>
                        L’autre mime, en boitant, l’infirme qui volait !<br>
                        <br>
                        Le Poète est semblable au prince des nuées<br>
                        Qui hante la tempête et se rit de l’archer ;<br>
                        Exilé sur le sol au milieu des huées,<br>
                        Ses ailes de géant l’empêchent de marcher.<br>
                        <br>
                        — Charles Baudelaire<br>
                    </p>
                </div>

                <div class="mes_articles">
                    <h2>tableau</h2>
                    <table>
                        <caption>Passagers du vol 377</caption>
                        <tr>
                            <th>Nom</th>
                            <th>Âge</th>
                            <th>Pays</th>
                        </tr>
                        <tr>
                            <td>Carmen</td>
                            <td>33 ans</td>
                            <td>Espagne</td>
                        </tr>
                        <tr>
                            <td>Michelle</td>
                            <td>26 ans</td>
                            <td>États-Unis</td>
                        </tr>
                        <tr>
                            <td>Carmen</td>
                            <td>33 ans</td>
                            <td>Espagne</td>
                        </tr>
                        <tr>
                            <td>Michelle</td>
                            <td>26 ans</td>
                            <td>États-Unis</td>
                        </tr>
                        <tr>
                            <td>Carmen</td>
                            <td>33 ans</td>
                            <td>Espagne</td>
                        </tr>
                        <tr>
                            <td>Michelle</td>
                            <td>26 ans</td>
                            <td>États-Unis</td>
                        </tr>
                        <tr>
                            <td>Carmen</td>
                            <td>33 ans</td>
                            <td>Espagne</td>
                        </tr>
                     </table>
                      
                </div>
            </div>
</main>


    <footer>
        <button type="button">Page Précédente</button>
        <button type="button">Page Suivante</button>
    </footer>


</body>

    