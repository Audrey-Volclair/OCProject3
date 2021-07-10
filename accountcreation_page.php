<?php
    require("accountcreation.php");
    include("header.php"); ?>

<section class="center" id="creationaccount">
    <form method="post" action="accountcreation_page.php">
        <?php
                    if(isset($success))
                    {
                        echo('<p class="center" style="color: red;">' .$success. '</p>');
                        header('Refresh:2 ;url=connexion_page.php');
                    }
                    
                    if(isset($erreur))
                    {
                    echo('<p class="center" style="color: red;">' .$erreur. '</p>');
                    }
                    ?>
        <h2>Création d'un compte utilisateur</h2><br /><br />
        <table>
            <tr>
                <td>
                    Nom:
                </td>
                <td>
                    <input type="text" placeholder="Votre nom" name="nom" />
                </td>
            </tr>
            <tr>
                <td>
                    Prénom:
                </td>
                <td>
                    <input type="text" placeholder="Votre prénom" name="prenom" />
                </td>
            </tr>
            <tr>
                <td>
                    UserName:
                </td>
                <td>
                    <input type="text" placeholder="Votre Username" name="username" />
                </td>
            </tr>
            <tr>
                <td>
                    Mot de Passe:
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" name="password" />
                </td>
            </tr>
            <tr>
                <td>
                    Confirmation Mot de Passe:
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" name="verifpassword" />
                </td>
            </tr>
            <tr>
                <td>
                    Question secrète:
                </td>
                <td>
                    <select name="question">
                        <option value="Nom de jeune fille de votre mère">Nom de jeune fille de votre mère
                        </option>
                        <option value="Quel est votre animal préféré?">Quel est votre animal préféré?
                        </option>
                        <option value="Quelle est la ville de naissance de votre père?">Quelle est la ville
                            de naissance de votre père?
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Réponse à la question secrète:
                </td>
                <td>
                    <input type="text" placeholder="Réponse à votre question secrète" name="reponse">
                </td>
            </tr>
        </table><br />
        <input type="submit" name="accountcreation" class="button" value="Valider">


    </form>
</section>


<?php include("footer.php"); ?>