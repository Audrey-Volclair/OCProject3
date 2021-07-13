<?php
    require("connexion.php");
    include("header.php"); ?>


<section class="center" id="connexion">

    <?php
                    if(isset($erreur))
                    {
                    echo('<p class="center red">' .$erreur. '</p>');
                    }
                    ?>
    <h3>Connexion</h3><br />
    <form method="post" action="connexion_page.php">
        UserName<br /><input type="text" name="username" /><br />
        Mot de Passe<br /><input type="password" name="password" /><br />
        <input type="submit" name="connexion" class="button" value="Valider">
    </form>
    <br />
    <a href="reinit_mdp.php">Mot de passe oublié?</a>

</section>


<?php include("footer.php"); ?>