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
    
    include("header.php"); ?>

<section class="center" id="reinit_mdp">
    <h3>Réinitiatlisation Mot de Passe</h3><br />
    <form method="post" action="reinit_mdp.php">
        <?php
                    if(isset($erreur))
                    {
                    echo('<p style="color: red;">' .$erreur. '</p>');
                    }
                    ?><br />
        UserName<br /><input type="text" name="username" /><br />
        Question secrète:<br />
        <select name="question">
            <option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère</option>
            <option value="Quel est votre animal préféré?">Quel est votre animal préféré?
            </option>
            <option value="Quelle est la ville de naissance de votre père?">Quelle est la ville
                de naissance de votre père?
            </option>
        </select><br />
        Réponse à la question secrète:<br /><input type="text" placeholder="Réponse à votre question secrète"
            name="reponse"><br /><br />
        <input type="submit" name="reinit_mdp" class="button" value="Valider">
    </form>
    <br />
</section>

<?php include("footer.php");?>