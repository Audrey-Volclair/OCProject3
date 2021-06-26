<?php
    if(EMPTY($_SESSION['username']))
    {
        echo '<a href="index.php"><img src="Images\LOGO_GBAF_ROUGE" alt="Logo GBAF" height="200" /></a>';
    }
    else
    {
        echo '<a href="index_user.php"><img src="Images\LOGO_GBAF_ROUGE" alt="Logo GBAF" height="200" /></a>';
    }

    if(EMPTY($_SESSION['username']))
    {
        echo '<p id="textheader"><a href="connexion_page.php">Se connecter</a> - <a href="accountcreation_page.php">Créer un compte</a></p>';
    }
    else{
        echo('<p id="textheader"><strong><a href="profile_page.php"><i class="fas fa-user-tie"></i> ' .$_SESSION['prenom']. " " .$_SESSION['nom']. '</strong></a><br /><a href="disconnect.php">Se déconnecter</a></p>');
        
    }

    
?>