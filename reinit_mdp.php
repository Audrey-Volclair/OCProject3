<?php
    require("bdd_connexion.php");
    session_start();

    if(isset($_POST['reinit_mdp']))
    {
        $username = htmlspecialchars($_POST['username']);
        $reponse = htmlspecialchars($_POST['reponse']);
        $question = ($_POST['question']);

        if(!EMPTY($_POST['username']) AND !EMPTY($_POST['reponse']) AND !EMPTY($_POST['question']))
        {
            $req = $bdd->prepare('SELECT * FROM account WHERE username = :username');
            $req->execute(array(
                'username' => $username
            ));
            $result = $req->fetch();

            $correctanswer = (($_POST['username'] == $result['username']) AND ($_POST['question'] == $result['question']) AND ($_POST['reponse'] == $result['reponse']));

            if($correctanswer)
            {
                $_SESSION['id_user'] = $result['id_user'];
                header('location:reinit_mdp2.php');
            }
            else
            {
                $erreur = 'Informations incorretes!';
            }
        }
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
                    <label for="username">UserName</label></br /><input type="text" name="username" /><br />
                    <label for="question">Question secrète:</label><br />
                    <select name="question">
                        <option value="choix1">Nom de jeune fille de votre mère</option>
                    </select><br />
                    <label for="reponse">Réponse à la question secrète:</label><br /><input type="test"
                        placeholder="Réponse à votre question secrète" name="reponse"><br /><br />
                    <input type="submit" name="reinit_mdp" class="button" value="Valider">
                </form>
                <br />
            </center>
        </section>

        <footer>
            <?php include("footer.php");?>
        </footer>
    </div>
</body>

</html>