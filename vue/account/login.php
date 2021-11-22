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

            <div id="container">

                <div class="mes_articles">
                    <form action="../../controller/AccountController.php" method="post" id="form-control">
                        <h3> Connexion </h3>
                        <br>
                            <div>
                                <label for="email">Email :</label>
                                <input id="email" name="email" required="required">
                            </div>
                            <div>
                                <label for="mot_de_passe">Pasword :</label>
                                <input type="password" id="mdp" name="password" required="required">
                            </div>
                            <div>
                            <small><?php  if( isset($_GET['error'])) { echo $_GET['error'];  } ?></small>
                            </div>
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

            </div>
</main>


    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>