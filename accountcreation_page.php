<?php
    // Connexion à la base de données
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        }
    catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
                }
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
                if($nomlength <= '255')
                {
                    if($prenomlength <= '255')
                    {
                        if($usernamelength <= '255')
                        {
                            if($passwordlength >= '8')
                            {
                                if($reponselength <= '255')
                                {
                                    $req = $bdd->prepare('INSERT INTO account(nom, prenom, username, password, question, reponse) VALUES(?, ?, ?, ?, ?, ?)');
                                    $req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse']));
                                    $erreur = "Votre compte a bien été créé!";                                    
                                }
                                else
                                {
                                    $erreur ="La réponse à votre question secrète ne doit pas contenir plus de 255 caractères!";
                                }
                            }
                            else
                            {
                                $erreur = "Votre mot de passe doit contenir au minimum 8 caractères!"; 
                            }
                        }
                        else
                        {
                            $erreur = "Votre Username ne doit pas contenir plus de 255 caractères!";
                        }
                    }
                    else{
                        $erreur = "Votre Prénom ne doit pas contenir plus de 255 caractères!";
                    }
                }
                else
                {
                    $erreur = "Votre Nom ne doit pas contenir plus de 255 caractères!";
                }
            }
            else
            {
                $erreur = "Tous les champs doivent être complétés!";
            }
        }
    
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=3">
    <title>GBAF Intranet Index</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>
        <section>
            <center>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td align="right">
                                <label for="nom">Nom:</label>
                            </td>
                            <td align="left">
                                <input type="text" placeholder="Votre nom" name="nom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="prenom">Prénom:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Votre prénom" name="prenom" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="username">UserName:</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Votre Username" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="password">Mot de Passe:</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Votre mot de passe" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="question">Question secrète:</label>
                            </td>
                            <td>
                                <select name="question">
                                    <option default>Choisissez votre question secrète</option>
                                    <option value="choix1">Nom de jeune fille de votre mère</option>
                                    <option value="choix2">Prénom de votre premier animal de compagnie</option>
                                    <option value="choix3">Ville de naissance de votre père</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <label for="reponse">Réponse à la question secrète:</label>
                            </td>
                            <td>
                                <input type="test" placeholder="Réponse à votre question secrète" name="reponse">
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="accountcreation" class="button" value="Valider">


                </form>
                <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
        ?>
            </center>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>