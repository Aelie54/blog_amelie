<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="monblog" content="articles blog">
    <meta name="keywords" content="blog">
    <link rel="stylesheet" href="../../asset/style2.css">
    <title>Blog Poésie</title>
    <header><h1>Le blog Poésie d'Amélie</h1></header>
    
    <main id="main" >     

<aside>
    <ul>
        <li><a href="google.com">Home</a></li>
        <li><a href="google.com">News</a></li>
        <li><a href="google.com">Contact</a></li>
        <li><a href="about.asp">About</a></li>
        <li><a href="/blog_amelie/vue/account/login.php">Se connecter</a></li>
        <li><a href="/blog_amelie/vue/account/signup.php">S'inscrire</a></li>
    </ul> 
</aside>

        <div class="mes_articles">
                    <form action="../../controller/AccountController.php" method="post" id="form-control">
                        <h3> Ajouter un article </h3>
                        <br>

                            <div>
                                <label for="title">Titre :</label>
                                <input type="text" id="title" name="title" required="required">
                            </div>
                            <div>
                                <label for="content">Pasword :</label>
                                <textarea id="content" name="content" required="required"></textarea>
                            </div>
                            <div>
                            <select name="categories" id="catagories">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <div id="error">
                                <?php 
                                if((isset($_GET['error']))){
                                    echo $_GET['error'];
                                } ?>

                            <div class="boutons_valider">
                                <br><input class="Valider"
                           type="submit"
                           value="Valider">
                        </div>
                    </form>
                    <br>
                    <a href="/blog_amelie/vue/account/signup.php">Je créé mon compte</a>
                    <br>
            </div>
</html>