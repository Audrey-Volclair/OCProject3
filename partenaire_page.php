<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="https://kit.fontawesome.com/dcd8731199.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=3">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="main">
        <header>
            <?php include("header.php"); ?>
        </header>

        <section>
            <article>
                <img src="" /><br />
                <h2>Nom du partenaire</h2>
                <p><a href="">Lien</a></p>
                <p>Contenu textuel</p>
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
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>