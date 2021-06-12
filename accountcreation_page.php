<?php
    require("accountcreation.php");
?>

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
                <form method="post" action="">
                    <?php
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?>
                    <table>
                        <tr>
                            <td align="right">
                                <label for="nom">Nom:</label>
                            </td>
                            <td align="left">
                                <input type="text" placeholder="Votre nom" name="nom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="prenom">Prénom:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Votre prénom" name="prenom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="username">UserName:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Votre Username" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="password">Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Votre mot de passe" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="question">Question secrète:</label>
                            </td>
                            <td>
                                <select name="question">
                                    <option default>Choisissez votre question secrète</option>
                                    <option value="choix1">Nom de jeune fille de votre mère</option>
                                    <option value="choix2">Prénom de votre premier animal de compagnie</option>
                                    <option value="choix3">Ville de naissance de votre père</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="reponse">Réponse à la question secrète:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Réponse à votre question secrète" name="reponse">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="accountcreation" class="button" value="Valider">


                </form>
            </center>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>