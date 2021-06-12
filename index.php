<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=4">
    <title>GBAF Intranet Index</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section>
            <center>
                <h2>Bienvenue sur l'extranet du Groupement Banque-Assurance Français</h2>
                <p>Pour accéder au site, veuillez vous connecter ou créer un compte.</p>
                <button class="button" onclick="window.location.href = 'connexion_page.php';">Se connecter</button>
                <button class="button" onclick="window.location.href = 'accountcreation_page.php';">Créer un
                    compte</button>
            </center>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>