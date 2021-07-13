<?php
    // début session
    session_start();
    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }
    require("profilemodification.php");
    
    if(isset($_SESSION['id_user']))
        {
            $requser = $bdd->prepare("SELECT * FROM account WHERE id_user = ?");
            $requser->execute(array($_SESSION['id_user']));
            $user = $requser->fetch();
        }
        
    include("header.php"); ?>


<div class="position">
    <h2 class="center">Edition du profil</h2><br />
    <?php 
        if(isset($success))
            {
                echo('<p class="center green">' .$success. '</p>');
            }
        if(isset($erreur1))
            {
                echo('<p class="center red">' .$erreur1. '</p>');
            }
    ?>
    <br />
    <form method="POST" action="profile_page.php">
        <div class="center profil">
            <table>
                <tr>
                    <td>
                        Nom:
                    </td>
                    <td>
                        <input type="text" value="<?php echo($user['nom']);?>" name="newnom" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Prénom:
                    </td>
                    <td>
                        <input type="text" value="<?php echo($user['prenom']);?>" name="newprenom" />
                    </td>
                </tr>
                <tr>
                    <td>
                        UserName:
                    </td>
                    <td>
                        <input type="text" value="<?php echo($user['username']);?>" name="newusername" />
                    </td>
                </tr>
            </table>
            <input type="submit" name="accountmodification1" class="button buttoncenter"
                value="Mettre à jour les informations">
        </div>

        <div class="center profil">
            <table>
                <tr>
                    <td>
                        Mot de Passe:
                    </td>
                    <td>
                        <input type="password" name="newpassword" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Confirmation Mot de Passe:
                    </td>
                    <td>
                        <input type="password" name="verifnewpassword" />
                    </td>
                </tr>
            </table>
            <input type="submit" name="accountmodification2" class="button buttoncenter"
                value="Mettre à jour les informations">
        </div>

        <div class="center profil">
            <table>
                <tr>
                    <td>
                        Question secrète:
                    </td>
                    <td>
                        <select name="newquestion">
                            <option selected><?php echo($user['question']);?>
                            </option>
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
                        <input type="text" name="newreponse" value="<?php echo($user['reponse']);?>">
                    </td>
                </tr>
            </table><br />
            <input type="submit" name="accountmodification3" class="button buttoncenter"
                value="Mettre à jour les informations">
        </div>
    </form>

</div>

<?php include("footer.php"); ?>