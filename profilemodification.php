<?php
    // connexion bdd
    require("bdd_connexion.php");

    //modification profil

    if(isset($_SESSION['id_user']))
    {
        if(isset($_POST['accountmodification1']))
        {
            $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
            $requser->execute(array($_SESSION['id_user']));
            $user = $requser->fetch();

            if(isset($_POST['newnom']) AND !EMPTY($_POST['newnom']) AND $_POST['newnom'] != $user['nom'])
            {
                $newnom = htmlspecialchars($_POST['newnom']);
                $insertnom= $bdd->prepare("UPDATE account SET nom = ? WHERE id_user = ?");
                $insertnom->execute(array($newnom, $_SESSION['id_user']));
                header('location: profile_page.php?id='.$_SESSION['id_user']);
            }

            if(isset($_POST['newprenom']) AND !EMPTY($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom'])
            {
                $newprenom = htmlspecialchars($_POST['newprenom']);
                $insertprenom= $bdd->prepare("UPDATE account SET prenom = ? WHERE id_user = ?");
                $insertprenom->execute(array($newprenom, $_SESSION['id_user']));
                header('location: profile_page.php?id='.$_SESSION['id_user']);
            }

            if(isset($_POST['newusername']) AND !EMPTY($_POST['newusername']) AND $_POST['newusername'] != $user['username'])
            {
                $newusername = htmlspecialchars($_POST['newusername']);
                $requsername = $bdd->prepare('SELECT * FROM account WHERE username = ?');
                $requsername->execute(array($newusername));
                $usernameexist = $requsername->rowcount();
                // verification que le nouveau username n'existe pas déjà
                if($usernameexist == 0)
                {
                    $insertusername= $bdd->prepare("UPDATE account SET username = ? WHERE id_user = ?");
                    $insertusername->execute(array($newusername, $_SESSION['id_user']));
                    header('location: profile_page.php?id='.$_SESSION['id_user']);
                }

                else
                {
                    $erreur1 ="Cet username existe déjà!";
                }
            }
        }

        if(isset($_POST['accountmodification2']))
        {
            $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
            $requser->execute(array($_SESSION['id_user']));
            $user = $requser->fetch();

            if(isset($_POST['newpassword']) AND !EMPTY($_POST['newpassword']))
            {
                if(isset($_POST['verifnewpassword']) AND !EMPTY($_POST['verifnewpassword']))
                {
                    $newpassword = $_POST['newpassword'];
                    $verifnewpassword = $_POST['verifnewpassword'];

                    if($newpassword == $verifnewpassword)
                    {
                    $insertpassword= $bdd->prepare("UPDATE account SET password = :newpassword WHERE id_user = :id_user");
                    $insertpassword->execute(array(
                        'newpassword' => password_hash($_POST['newpassword'], PASSWORD_DEFAULT),
                        'id_user' => $_SESSION['id_user']));
                    header('location: profile_page.php?id='.$_SESSION['id_user']);
                    }
                    else
                    {
                        $erreur2 = "Les mots de passe ne correspondent pas";
                    }
                }
            }
        }

        if(isset($_POST['accountmodification3']))
        {
            $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
            $requser->execute(array($_SESSION['id_user']));
            $user = $requser->fetch();

            if(isset($_POST['newquestion']) AND !EMPTY($_POST['newquestion']) AND $_POST['newquestion'] != $user['question'])
            {
                $newquestion = ($_POST['newquestion']);
                $insertquestion= $bdd->prepare("UPDATE account SET question = ? WHERE id_user = ?");
                $insertquestion->execute(array($newquestion, $_SESSION['id_user']));
                header('location: profile_page.php?id='.$_SESSION['id_user']);
            }

            if(isset($_POST['newreponse']) AND !EMPTY($_POST['newreponse']) AND $_POST['newreponse'] != $user['reponse'])
            {
                $newreponse = ($_POST['newreponse']);
                $insertreponse= $bdd->prepare("UPDATE account SET reponse = ? WHERE id_user = ?");
                $insertreponse->execute(array($newreponse, $_SESSION['id_user']));
                header('location: profile_page.php?id='.$_SESSION['id_user']);
            }
        }
    }
    
?>