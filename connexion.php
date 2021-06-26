<?php
    // Connexion à la base de données
    require("bdd_connexion.php");

    if(isset($_POST['connexion']))
    {     
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // récupération user et mdp
        $req = $bdd->prepare('SELECT id_user, nom, prenom, password FROM account WHERE username = :username');
        $req->execute(array(
            'username' => $username
        ));
        $resultat = $req->fetch();

        //verification mot de passe
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

        if(!$resultat)
        {
            $erreur = 'Mauvais identifiant ou mot de passe!';
        }
        else
        {
            if($isPasswordCorrect)
            {
                session_start();
                $_SESSION['id_user'] = $resultat['id_user'];
                $_SESSION['nom'] = $resultat['nom'];
                $_SESSION['prenom'] = $resultat['prenom'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header('location:index_user.php');
            }
            else 
            {
                $erreur = 'Mauvais identifiant ou mot de passe!';
            }
        }
    }        
?>