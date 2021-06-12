<?php
    // Connexion à la base de données
    require("bdd_connexion.php");

            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
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
            echo 'Mauvais identifiant ou mot de passe!';
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
                header('location:index_user.php');
            }
            else 
            {
                echo 'Mauvais identifiant ou mot de passe!';
            }
        }
            
?>