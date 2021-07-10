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

    //count likes
    $likes = $bdd->prepare("SELECT vote FROM vote WHERE id_acteur = ? AND vote = 1");
    $likes->execute(array($id));
    $likes = $likes->rowCount();

    //count dislikes
    $dislikes = $bdd->prepare("SELECT vote FROM vote WHERE id_acteur = ? AND vote = -1");
    $dislikes->execute(array($id));
    $dislikes = $dislikes->rowCount();
    
    include("header.php"); ?>


<section>
    <article>

        <img class="logo" src="<?php echo $data['logo'];?>" alt="logo acteur" /><br />
        <?php
                    echo '<h2>' .$data['acteur']. '</h2>';
                    echo ($data['description']);
                ?>
    </article>
    <article id="comm_vote">
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
        </p>
        <p>
            <button class="buttoncomm" onclick="window.location.href = '#textwrapper';">Nouveau
                commentaire</button>

            <button class="buttonlikedislike like"
                onclick="window.location.href='like_dislikes.php?v=1&id=<?= $id; ?>'"><i
                    class="far fa-thumbs-up"></i></button>(<?= $likes ?>)

            <button class="buttonlikedislike dislike"
                onclick="window.location.href='like_dislikes.php?v=-1&id=<?= $id; ?>'"><i
                    class="far fa-thumbs-down"></i></button>(<?= $dislikes ?>)
        </p>
    </article>
    <article>
        <?php
                    //Selection des données des commentaires en inner join pour aussi récupérer le prénom associé au commentaire
                    $req = $bdd->prepare('SELECT post.id_post, post.id_user, post.id_acteur, DATE_FORMAT(date_add, \'%d/%m/%Y\') as post_date, post.post, account.id_user, account.prenom FROM post INNER JOIN account ON post.id_user = account.id_user
                    WHERE id_acteur = ? ORDER BY date_add DESC');
                    $req->execute(array($_GET['id']));
                    
                    //affichage du commentaire et de l'username associé
                    while ($comment = $req->fetch())
                    {
                    ?>

        <p><span id="prenom_comm"><?= $comment['prenom'];?></span>, le <?= $comment['post_date'];?></p>
        <p><?= $comment['post'];?>

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


<?php include("footer.php"); ?>