<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>GBAF Intranet Index</title>
</head>
<body>
    <div id="main">
    <header>
        <?php include("header.php"); ?>
    </header>

    <section>
        <center>
        <form method="post" action="connexion.php">
            <label for="username">UserName</label></br /><input type="text" name="username" /><br />
            <label for="password">Mot de Passe</label><br /><input type="password" name="password" /><br />
            <input type="submit" value="Valider">
        </form>
        </center>
    </section>

    <footer>
        <?php include("footer.php"); ?>
    </footer>
    </div>
</body>
</html>