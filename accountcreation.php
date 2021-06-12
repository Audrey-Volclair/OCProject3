<?php
    // Connexion à la base de données
    require("bdd_connexion.php");
    // verification des données envoyées par l'utilisateur
    if(isset($_POST['accountcreation']))
        {                
                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $username = htmlspecialchars($_POST['username']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $question = ($_POST['question']);
                $reponse = htmlspecialchars($_POST['reponse']);
                
            if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['question']) AND !empty($_POST['reponse']))
            {
                $nomlength = strlen($nom);
                $prenomlength = strlen($prenom);
                $usernamelength = strlen($username);
                $passwordlength = strlen($password);
                $reponselength = strlen($reponse);
                if($nomlength <= '100')
                {
                    if($prenomlength <= '100')
                    {
                        if($usernamelength <= '100')
                        {
                            if($passwordlength >= '8')
                            {
                                if($reponselength <= '100')
                                {// Inscription dans la bdd
                                    $req = $bdd->prepare('INSERT INTO account(nom, prenom, username, password, question, reponse) VALUES(:nom, :prenom, :username, :password, :question, :reponse)');
                                    $req->execute(array(
                                        'nom' => $nom,
                                        'prenom' => $prenom,
                                        'username' => $username,
                                        'password' => $password,
                                        'question' => $question,
                                        'reponse' => $reponse,
                                    ));
                                    header('location:connexion.php');
                                    
                                }
                                else
                                {
                                    $erreur ="La réponse à votre question secrète ne doit pas contenir plus de 100 caractères!";
                                }
                            }
                            else
                            {
                                $erreur = "Votre mot de passe doit contenir au minimum 8 caractères!"; 
                            }
                        }
                        else
                        {
                            $erreur = "Votre Username ne doit pas contenir plus de 100 caractères!";
                        }
                    }
                    else{
                        $erreur = "Votre Prénom ne doit pas contenir plus de 100 caractères!";
                    }
                }
                else
                {
                    $erreur = "Votre Nom ne doit pas contenir plus de 100 caractères!";
                }
            }
            else
            {
                $erreur = "Tous les champs doivent être complétés!";
            }
        }
?>