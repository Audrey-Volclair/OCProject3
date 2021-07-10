<?php
    // début session
    session_start();

    if(!$_SESSION['username'])
    {
        header("location: connexion_page.php");
    }

    require("bdd_connexion.php");
    
    include("header.php"); ?>

<br /><br />
<section>
    <article id="cadrepresa">

        <h1>Groupement banque-assurance français</h1><br />

        <p>Le Groupement Banque-Assurance Français (GBAF) est une fédération représentant 6 grands groupes
            français:
        <ul>
            <li>BNP Paribas;</li>
            <li>BPCE;</li>
            <li>Crédit Agricole;</li>
            <li>Crédit Mutuel-CIC;</li>
            <li>Société Générale;</li>
            <li>La Banque Postale;</li>
        </ul>
        <br />
        Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
        de la même façon pour gérer près de 80 millions de comptes sur le territoire
        national.<br />
        Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
        les axes de la réglementation financière française. Sa mission est de promouvoir
        l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
        pouvoirs publics.</p>
        <br />
        <img src="images/banque-finance.jpg" width="990" alt="image courbe banque" />

    </article>
    <article>

        <h2>Acteurs et Partenaires</h2>

        <p>Vous trouverez ci-dessous la liste des acteurs et partenaire du GBAF</p>
    </article>

    <?php
                    $req = $bdd->query('SELECT * FROM acteur');
                    // boucle récupération des données des différents acteurs
                    while($data = $req->fetch())
                    {
                ?>
    <article id="partenaires">
        <figure><img id="logo_index" src="<?php echo $data['logo'];?>" alt="logo acteur" /></figure>
        <div id="partenaires_right"><?php
                    echo '<h3>' .$data['acteur']. '</h3>';
                    echo substr($data['description'], 0, 100), '...';
                ?><br />
            <span id="buttondroite">
                <button class="button"
                    onclick="window.location.href='partenaire_page.php?id=<?php echo $data['id_acteur']; ?>';">En
                    savoir
                    plus</button>
            </span>
        </div>
    </article>
    <?php
                // Fermeture de la boucle
                    }
                ?>

</section>

<?php include("footer.php"); ?>