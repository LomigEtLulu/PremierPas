
<?php
    require_once 'models/gestionBdd.php' ;
    $categories=getCategories();
?>
    <body>
    <div class="conteneur">
    <header>
        <h1> La Fleur</h1>
        <h3>Fleurs d'ornements pour jardins</h3>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        </ul>
        <hr>
        <p> Nos produits</p>
        <ul>
        <?php
            foreach ($categories as $categorie) {
                $lib = $categorie['cat_libelle'];
                $lien = "lesproduits.php?cat=".$categorie['cat_code']."&lib=".$lib;
        ?>
            <li><a href="<?php echo $lien ; ?>"><?php echo $lib; ?></a></li>
        <?php }  ?>

        </ul>
    </nav>
