<?php
    require("bdd_connexion.php");

    if(isset($_POST['commentaire']))
    {
        $username = htmlspecialchars($_POST['username']);
        $post = htmlspecialchars($_POST['post']);
        $id_user = ($_POST['id_user']);
        $id_acteur = ($_POST['id_acteur']);

        //on vérifie que le commentaire existe et qu'il n'est pas vide
        if(isset($_POST['post']) AND !EMPTY($_POST['post']))
        {
            //on vérifie que l'utilisateur n'a pas déjà commenté
            $reqpostuser = $bdd->prepare('SELECT post FROM post WHERE id_user = :id_user AND id_acteur = :id_acteur');
            $reqpostuser->execute(array(
                'id_user' => $id_user,
                'id_acteur' => $id_acteur,
            ));

            $postexist = $reqpostuser->rowcount();

            if($postexist == 0)
            {
                //on insert dans la bdd
                $reqpost = $bdd->prepare('INSERT INTO post(id_user, id_acteur, post, date_add) VALUES(:id_user, :id_acteur, :post, NOW())');
                $reqpost->execute(array(
                    'id_user' => $id_user,
                    'id_acteur' => $id_acteur,
                    'post' => $post
                ));
                header('location: partenaire_page.php?id='.$data['id_acteur']);
            }
            else
            {
                echo('<p style="color: red;">Vous ne pouvez commenter qu\'une seule fois la page d\'un acteur</p>');
            }
        }
        else
        {
            echo('<p style="color: red;">Vous ne pouvez pas envoyer un commentaire vide!</p>');
        }
    }
?>

<form method="post" action="partenaire_page.php?id=<?= $_GET['id']; ?>">
    <input type="hidden" name="username" value="<?php echo($_SESSION['username']);?>" /><br />
    <label for="post">Ecrire un nouveau commentaire</label><br /><textarea name="post" rows="20" cols="150"
        placeholder="Donnez-nous votre avis!"></textarea><br />
    <input type="hidden" name="id_user" value="<?php echo ($_SESSION['id_user']);?>">
    <input type="hidden" name="id_acteur" value="<?php echo($_GET['id']); ?>">
    <input type="submit" name="commentaire" class="button" value="Valider">
</form>