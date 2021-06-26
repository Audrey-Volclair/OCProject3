<?php
    require("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=7">
    <title>GBAF Extranet Connexion</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section id="connexion">
            <center>
                <?php
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?>
                <h3>Connexion</h3><br />
                <form method="post" action="">
                    <label for="username">UserName</label></br /><input type="text" name="username" /><br />
                    <label for="password">Mot de Passe</label><br /><input type="password"
                        name="password" /><br /><br />
                    <input type="submit" name="connexion" class="button" value="Valider">
                </form>
                <br />
                <a href="reinit_mdp.php">Mot de passe oublié?</a>
            </center>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>