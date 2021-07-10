<?php
// connexion bdd
    require("bdd_connexion.php");
    session_start();

    if(isset($_GET['v'], $_GET['id'], $_SESSION['id_user']) AND !EMPTY($_GET['v']) AND !EMPTY($_GET['id']) AND !EMPTY($_SESSION['id_user']))
    {
        //verification des variables
        $a_id = (int)$_GET['id'];
        $vote = (int)$_GET['v'];
        $idsession = (int)$_SESSION['id_user'];

        //verification existance de l'id dans la bdd
        $check_a_id = $bdd->prepare("SELECT id_acteur FROM acteur WHERE id_acteur=?");
        $check_a_id->execute(array($a_id));

        //a_id existe
        if($check_a_id->rowCount()==1)
        {
            //likes
            if($vote == 1)
            {
                //déjà liké?
                $check_vote_likes = $bdd->prepare("SELECT vote FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = 1");
                $check_vote_likes->execute(array($a_id, $idsession));
                
                //Disliked? Supprime le dislike
                $supdislikes = $bdd->prepare("DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = -1");
                $supdislikes->execute(array($a_id, $idsession));

                //suppression du like si déjà présent
                if($check_vote_likes->rowCount() == 1)
                {
                    $suplikes = $bdd->prepare("DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = 1");
                    $suplikes->execute(array($a_id, $idsession));
                }

                //ajout du like le cas contraire
                else
                {
                    $add_likes = $bdd->prepare("INSERT INTO vote (id_acteur, id_user,vote) VALUES (?,?, 1)");
                    $add_likes->execute(array($a_id, $idsession));
                }
            }

            //dislikes
            elseif($vote == -1)
            {
                //déjà disliké?
                $check_vote_dislikes = $bdd->prepare("SELECT vote FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = -1");
                $check_vote_dislikes->execute(array($a_id, $idsession));

                //liked? Supprime le like
                $suplikes = $bdd->prepare("DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = 1");
                $suplikes->execute(array($a_id, $idsession));

                //suppression du dislike si déjà présent
                if($check_vote_dislikes->rowCount() == 1)
                {
                    $supdislikes = $bdd->prepare("DELETE FROM vote WHERE id_acteur = ? AND id_user = ? AND vote = -1");
                    $supdislikes->execute(array($a_id, $idsession));
                }

                //ajout du dislike le cas contraire
                else
                {
                    $add_likes = $bdd->prepare("INSERT INTO vote (id_acteur, id_user,vote) VALUES (?,?, -1)");
                    $add_likes->execute(array($a_id, $idsession));
                }
            }

            header('location:partenaire_page.php?id=' .$a_id);
        }
    }
?>