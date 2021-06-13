<?php
    // début session
    session_start();

    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }

    require("bdd_connexion.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=4">
    <title>GBAF Intranet Index</title>
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section>
            <article id="cadrepresa">
                <center>
                    <h1>Groupement banque-assurance français</h1>
                    <p>texte présentation du GBAF et du site</p>
                    <img src="" />
                </center>
            </article>
            <article>
                <h2>H2</h2>
                <p>texte acteurs et partenaires</p>
            </article>

            <?php
                    $req = $bdd->query('SELECT * FROM acteur');
                    // boucle récupération des données des différents acteurs
                    while($data = $req->fetch())
                    {
                ?>
            <article>
                <img class="logo" src="<?php echo $data['logo'];?>" /><br />
                <?php
                    echo '<h2>' .$data['acteur']. '</h2>';
                    echo substr($data['description'], 0, 100), '...';
                ?>
                <button class="button"
                    onclick="window.location.href='partenaire_page.php?id=<?php echo $data['id_acteur']; ?>';">En savoir
                    plus</button>
            </article>
            <?php
                // Fermeture de la boucle
                    }
                ?>

        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>