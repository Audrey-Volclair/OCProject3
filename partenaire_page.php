<?php
    // début session
    session_start();

    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }
    require("bdd_connexion.php");
    // verification id acteur
    if(isset($_GET['id']) AND !empty($_GET['id']))
    {
        $id= ($_GET['id']);
        $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
        $req->execute(array($_GET['id']));
    }
    $data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="https://kit.fontawesome.com/dcd8731199.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=9">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section>
            <article>

                <img class="logo" src="<?php echo $data['logo'];?>" /><br />
                <?php
                    echo '<h2>' .$data['acteur']. '</h2>';
                    echo nl2br($data['description']);
                ?>

            </article>
            <article>
                <p>Commentaires
                    <span id="buttondroite"><button class="button"
                            onclick="window.location.href = 'newcomment.php';">Nouveau commentaire</button><button
                            class="button2"><i class="far fa-thumbs-up"></i></button><button class="button2"><i
                                class="far fa-thumbs-down"></i></button></span>
                </p>
            </article>
            <article>
                Liste des commentaires déjà postés.
            </article>
            <article id="textwrapper">
                <form method="post" action="newcomment.php">
                    <label for="username">username</label><br /><input type="text" name="username" /><br />
                    <label for="post">Commentaire</label><br /><textarea name="post"></textarea><br />
                    <input type="submit" class="button" value="Valider">
                </form>
            </article>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>