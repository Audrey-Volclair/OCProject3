<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dcd8731199.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=10">
    <title>GBAF Extranet Index</title>
</head>

<body>
    <div id="main">
        <header>
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
        echo('<p><span id="textheaderuser"><a href="profile_page.php"><i class="fas fa-user-tie"></i> ' .$_SESSION['prenom']. " " .$_SESSION['nom']. '</a></span><br /><a href="disconnect.php">Se déconnecter</a></p>');
        
    }

    
?>
        </header>