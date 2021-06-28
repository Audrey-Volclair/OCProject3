<?php
    require("bdd_connexion.php");
    session_start();

    if(!EMPTY($_SESSION['id_user']))
    {
        if(isset($_POST['reinit_mdp2']))
        {
            if(!EMPTY($_POST['newpassword']) AND !EMPTY($_POST['verifnewpassword']))
            {
                $newpassword = htmlspecialchars($_POST['newpassword']);
                $verifnewpassword = htmlspecialchars($_POST['verifnewpassword']);

                if($newpassword == $verifnewpassword)
                {
                    $newmdp = $bdd->prepare('UPDATE account SET password = :password WHERE id_user = :id_user');
                    $newmdp->execute(array(
                        'password' => password_hash($newpassword, PASSWORD_DEFAULT),
                        'id_user' => $_SESSION['id_user']
                    ));
                    header('connexion_page.php');
                }
                else
                {
                    $erreur = 'Les mots de passe ne correspondent pas!';
                }
            }
            else
            {
                $erreur = 'Veuillez remplir tous les champs';
            }
        }
    }
    else
    {
        header('location:connexion_page.php');
    }

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=6">
    <title>GBAF Extranet</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section id="reinit_mdp">
            <center>
                <h3>Réinitiatlisation Mot de Passe</h3><br />
                <form method="post" action="">
                    <?php
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?><br />
                    <label for="newpassword">Nouveau mot de passe</label></br /><input type="password"
                        name="newpassword" /><br />
                    <label for="verifnewpassword">Confirmation Nouveau mot de passe</label></br /><input type="password"
                        name="verifnewpassword" /><br />
                    <br />
                    <input type="submit" name="reinit_mdp2" class="button" value="Valider">
                </form>
            </center>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>