<?php
    // début session
    session_start();
    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }
    require("profilemodification.php");
    
    if(isset($_SESSION['id_user']))
        {
            $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
            $requser->execute(array($_SESSION['id_user']));
            $user = $requser->fetch();
        }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dcd8731199.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/styles.css?version=15">
    <title>GBAF Extranet Profil</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>
        <center>
            <h2>Edition du profil</h2><br /><br />

            <div id="profil">
                <center>
                    <form method="POST" action="">
                        <?php
                    if(isset($erreur1))
                    {
                    echo('<p style="color: red;">' .$erreur1. '</p>');
                    }
                    ?>
                        <table>
                            <tr>
                                <td align="justify">
                                    <label for="newnom">Nom:</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo($user['nom']);?>" name="newnom" />
                                </td>
                            </tr>
                            <tr>
                                <td align="justify">
                                    <label for="newprenom">Prénom:</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo($user['prenom']);?>" name="newprenom" />
                                </td>
                            </tr>
                            <tr>
                                <td align="justify">
                                    <label for="newusername">UserName:</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo($user['username']);?>" name="newusername" />
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="accountmodification1" class="button"
                            value="Mettre à jour les informations">
                </center>
            </div>
            <div id="profil">
                <center>
                    <?php
                if(isset($erreur2))
                    {
                    echo('<p style="color: red;">' .$erreur2. '</p>');
                    }
                    ?>
                    <table>
                        <tr>
                            <td align="justify">
                                <label for="newpassword">Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" name="newpassword" />
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="verifnewpassword">Confirmation Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" name="verifnewpassword" />
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="accountmodification2" class="button"
                        value="Mettre à jour les informations">
                </center>
            </div>
            <div id="profil">
                <center>
                    <?php
                    if(isset($erreur3))
                    {
                    echo('<p style="color: red;">' .$erreur3. '</p>');
                    }
                    ?>
                    <table>
                        <tr>
                            <td align="justify">
                                <label for="newquestion">Question secrète:</label>
                            </td>
                            <td>
                                <select name="newquestion">
                                    <option value="choix1">Nom de jeune fille de votre mère</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="justify">
                                <label for="newreponse">Réponse à la question secrète:</label>
                            </td>
                            <td>
                                <input type="test" name="newreponse" value="<?php echo($user['reponse']);?>">
                            </td>
                        </tr>
                    </table><br />
                    <input type="submit" name="accountmodification3" class="button"
                        value="Mettre à jour les informations">
                    </form>
                </center>
            </div>
        </center>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>

</body>

</html>