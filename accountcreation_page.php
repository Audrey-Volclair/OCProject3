<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=2">
    <title>GBAF Intranet Index</title>
</head>
<body>
    <div id="main">
    <header>
        <?php include("header.php"); ?>
    </header>

    <section>
        <center>
        <form method="post" action="accountcreation.php">
        <label for="nom">Nom</label><br /><input type="text" name="nom" /><br />
        <label for="prenom">Prénom</label><br /><input type="test" name="prenom" /><br />
        <label for="username">UserName</label></br /><input type="text" name="username" /><br />
        <label for="password">Mot de Passe</label><br /><input type="password" name="password" /><br />
        <label for="secretquestion">Question secrète</label><br />
        <select name="secretquestion">
            <option value="choix1">Nom de jeune fille de votre mère</option>
            <option value="choix2">Prénom de votre premier animal de compagnie</option>
            <option value="choix3">Ville de naissance de votre père</option>
        </select><br />
        <label for="awnsersecret">Réponse à la question secrète</label><br /><input type="test" name="awnsersecret"><br />
        <input type="submit"class="button" value="Valider">
        </form>
        <?php
            // Connexion à la base de données
            try
                {
	                $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
                }
            catch(Exception $e)
                {
                   die('Erreur : '.$e->getMessage());
                }
        ?>
        </center>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
    </div>
</body>
</html>