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

    <header>
        <h1>Le blog Poésie d'Amélie</h1>
    </header>

    <main id="main">

        <div id="container">

            <form action="../../controller/AccountController.php" method="post">

            <div class="mes_articles">        

                    <h3> Inscris toi pour commenter </h3><br>
                        
                    <div>
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" required="required" pattern="[a-Z_0-9]{4,8}" id="pseudo" name="pseudo"
                                title="Que des lettres minuscules et chiffres">
                    </div>

                    <div>
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div>
                        <label for="password">Mot de passe : </label>
                        <input type="password" name="password" id="password" />
                    </div>

                    <div>
                        <label for="comfirm_password">Confirmer votre mot de passe </label>
                        <input type="password" name="comfirm_password" id="comfirm_password" />
                    </div>

                        <div>
                            <label for="user_type">Choissisez votre catégorie </label>
                            <select name="user_type" id="user_type">
                                <optgroup label="Administrateurs">
                                    <option value="Admin">Admin</option>
                                    <option value="Moderator">Moderator</option>
                                </optgroup>
                                <optgroup label="Clients">
                                    <option value="Auteur">Auteur</option>
                                    <option value="Éditeur">Éditeur</option>
                                    <option value="Maison éditorial">Maison éditorial</option>
                                    <option value="Imprésario">Imprésario</option>
                                </optgroup>
                            </select>
                        </div><br><br>

                        <fieldset>
                            <legend>J'accepte que mes données soient exploitées</legend>
                            <div>
                                <label for="accepted">Oui, je l'autorise</label>
                                <input type="checkbox" name="accepted" id="accepted" required>
                            </div>
                        </fieldset>

                    <div class="boutons_valider">
                        <br><input type="submit" value="S'inscrire" />
                    </div>
        
        </form>

            <br><a href="login.php">Je suis déjà inscrit</a><br>

        </div>
        
    </main>


    <footer>
        <button type="button">Retour accueil</button>
    </footer>

</body>