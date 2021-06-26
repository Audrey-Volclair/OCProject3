<?php
    require("accountcreation.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=5">
    <title>GBAF Extranet Inscription</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>
        <section id="creationaccount">
            <center>
                <form method="post" action="">
                    <?php
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?>
                    <h3>Création d'un compte utilisateur</h3><br /><br />
                    <table>
                        <tr>
                            <td align="justify">
                                <label for="nom">Nom:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Votre nom" name="nom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="prenom">Prénom:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Votre prénom" name="prenom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="username">UserName:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Votre Username" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="password">Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Votre mot de passe" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="verifpassword">Confirmation Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Votre mot de passe" name="verifpassword" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="question">Question secrète:</label>
                            </td>
                            <td>
                                <select name="question">
                                    <option value="choix1">Nom de jeune fille de votre mère</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="reponse">Réponse à la question secrète:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Réponse à votre question secrète" name="reponse">
                            </td>
                        </tr>
                    </table><br />
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