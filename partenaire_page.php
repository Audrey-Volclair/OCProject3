<?php
    // début session
    session_start();

    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }
    require("bdd_connexion.php");
    
    // verification id acteur
    if(isset($_GET['id']) AND !empty($_GET['id']) AND ctype_digit($_GET['id']))
    {
        $id= ($_GET['id']);
        $req = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur = ?');
        $req->execute(array($_GET['id']));
    }
    else{
        header('location: index_user.php');
    }
    $data = $req->fetch();
    //redirection vers l'index si l'id n'existe pas dans la BDD
    if(!$data)
    {
        header('location: index_user.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dcd8731199.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="/styles.css?version=4">
    <title>GBAF Extranet</title>
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
                    echo ($data['description']);
                ?>
            </article>
            <article>
                <p>
                    <?php
                        //On compte le nombre de commentaire existant dans la BDD
                        $postnumber = $bdd->prepare('SELECT COUNT(post) AS post_number FROM post WHERE id_acteur = :id_acteur');
                        $postnumber->execute(array(
                        'id_acteur' => $_GET['id']
                        ));

                        //On affiche le nombre de commentaire déjà posté
                        while($display = $postnumber->fetch())
                        {
                        echo $display['post_number']. '&nbspcommentaire(s)';
                        }
                        //fermeture boucle while
                        $postnumber->closeCursor();
                    ?>

                    <span id="buttondroite"><button class="button"
                            onclick="window.location.href = '#textwrapper';">Nouveau commentaire</button><button
                            class="button2"><i class="far fa-thumbs-up"></i></button><button class="button2"><i
                                class="far fa-thumbs-down"></i></button></span>
                </p>
            </article>
            <article>
                <?php
<<<<<<< HEAD
                    //Selection des données des commentaires en inner join pour aussi récupérer l'username associté au commentaire
                    $req = $bdd->prepare('SELECT post.id_post, post.id_user, post.id_acteur, DATE_FORMAT(date_add, \'%d/%m/%Y\') as post_date, post.post, account.id_user, account.username FROM post INNER JOIN account ON post.id_user = account.id_user
=======
                    //Selection des données des commentaires en inner join pour aussi récupérer le prénom associé au commentaire
                    $req = $bdd->prepare('SELECT post.id_post, post.id_user, post.id_acteur, DATE_FORMAT(date_add, \'%d/%m/%Y\') as post_date, post.post, account.id_user, account.prenom FROM post INNER JOIN account ON post.id_user = account.id_user
>>>>>>> c8b2910 (corrections, mise en place confimation mdp et réinitialisation du mdp)
                    WHERE id_acteur = ? ORDER BY date_add DESC');
                    $req->execute(array($_GET['id']));
                    
                    //affichage du commentaire et de l'username associé
                    while ($comment = $req->fetch())
                    {
                    ?>

<<<<<<< HEAD
                <p><strong><?php echo $comment['username'];?></strong>, le <?php echo $comment['post_date'];?></p>
                <p><?php echo $comment['post'];?>
=======
                <p><strong><?= $comment['prenom'];?></strong>, le <?= $comment['post_date'];?></p>
                <p><?= $comment['post'];?>
>>>>>>> c8b2910 (corrections, mise en place confimation mdp et réinitialisation du mdp)

                    <?php
                    }
                    //fermeture boucle while
                    $req->closeCursor();
                ?>
            </article>
            <article id="textwrapper">
                <?php include("newcomment.php");?>
            </article>
        </section>

        <footer>
            <?php include("footer.php"); ?>
        </footer>
    </div>
</body>

</html>