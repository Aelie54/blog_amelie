<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="monblog" content="articles blog">
  <meta name="keywords" content="blog">
  <link rel="stylesheet" href="./asset/style2.css">
  <title>Blog Poésie</title>
</head>
<body>

    <header><h1>Le blog Poésie d'Amélie</h1></header>

<main id="main" >     

            <div id="container">

                <div class="mes_articles">
                    <form action="/controller/AccountController.php" method="post">
                        <h3> Inscris toi pour commenter </h3>
                        <br>
                            <div>
                                <label for="pseudo">Pseudo :</label>
                                <input type="text" required="required" pattern="[a-Z_0-9]{4,8}" id="pseudo" name="email"  title="Que des lettres minuscules et chiffres">
                            </div>
                            <div>
                                <label for="email">Email :</label>
                                <input  id="pseudo" name="email" required="required" title="Que des lettres minuscules et chiffres">
                            </div>
                            <div>
                                <label for="mot_de_passe">Pasword :</label>
                                <input type="password" id="mdp" name="password" required="required">
                            </div>
                            <div>
                                <label for="mot_de_passe_confirm">Confirm Pasword :</label>
                                <input type="password" id="mdp" name="password" required="required">
                            </div>
                            <div>
                                <label for="statut">Statut :</label>
                                        <select name="pays" id="pays">
                                            <optgroup label="Admin">
                                                <option value="admin">admin</option>
                                            </optgroup>
                                            <optgroup label="Utilisateur">
                                                <option value="Utilisateur">utilisateur</option>
                                            </optgroup>
                                        </select>
                                        <br><br>
                                        <fieldset>
                                            <legend>Autorisez-vous :</legend>
                                            <div>
                                              <input type="checkbox" id="coding" name="interest" value="coding">
                                              <label for="coding">le partage de données</label>
                                            </div>
                                            <div>
                                              <input type="checkbox" id="pub" name="pub" value="music">
                                              <label for="music">la publicité ciblée</label>
                                            </div>
                                          </fieldset>
                                 </form>
                            </div>
                            <div class="boutons_valider">
                                <br><input class="Valider" type="submit" value="Valider">
                            </div>
                    </form>
                    <br>
                    <a href="connexion.html">Je suis déjà inscrit</a>
                    <br>
                </div>

            </div>
</main>


    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>