<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/styles.css?version=2">
    <title>GBAF Intranet Index</title>
</head>
<body>
    <div id="main">
    <header>
        <?php include("header.php"); ?>
    </header>

    <section>
        
        <form method="post" action="newcomment.php">
            <label for="pseudo">Pseudo</label><br /><input type="text" name="pseudo" /><br />
            <label for"commentaire">Commentaire</label><br /><textarea name="commentaire" rows="20" cols="150"></textarea><br />
            <input type="submit" class="button" value="Valider">
        </form>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
    </div>
</body>
</html>