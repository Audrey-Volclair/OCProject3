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
                    $success ="Votre mot de passe a bien été modifié!";
                    
                    
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
    
    include("header.php"); ?>

<section class="center" id="reinit_mdp">
    <h3>Réinitiatlisation Mot de Passe</h3><br />
    <form method="post" action="reinit_mdp2.php">
        <?php
                    if(isset($success))
                    {
                        echo('<p class="center" style="color: red;">' .$success. '</p>');
                        header('Refresh:2 ;url=connexion_page.php');
                    }
                    
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?><br />
        Nouveau mot de passe<br /><input type="password" name="newpassword" /><br />
        Confirmation Nouveau mot de passe<br /><input type="password" name="verifnewpassword" /><br />
        <br />
        <input type="submit" name="reinit_mdp2" class="button" value="Valider">
    </form>
</section>

<?php include("footer.php"); ?>