<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="monblog" content="articles blog">
  <meta name="keywords" content="blog">
  <link rel="stylesheet" href="/asset/style2.css">
  <script src="script.js"></script> 
  <title>Blog Poésie</title>
</head>
<body>

    <header><h1>Le blog Poésie d'Amélie</h1></header>

<main id="main" >     

            <div id="container">

                <div class="mes_articles">
                    <form action="/login.php" method="post">
                        <h3> Connexion </h3>
                        <br>
                            <div>
                                <label for="pseudo">Email :</label>
                                <input pattern="[a-z_0-9]" id="pseudo" name="email" required="required" title="Que des lettres minuscules et chiffres">
                            </div>
                            <div>
                                <label for="mot_de_passe">Pasword :</label>
                                <input type="password" id="mdp" name="password" required="required">
                            </div>
                            <div class="boutons_valider">
                                <br><input class="Valider"
                           type="submit"
                           value="Valider">
                            </div>
                    </form>
                    <br>
                    <a href="inscription.html">Je créé mon compte</a>
                    <br>
                </div>

            </div>
</main>


    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>