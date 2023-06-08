<?php 
    //Définition du titre spécifique à la page
    $title = "Page d'accueil";
?>
<?php 
 //Chargement de l'entête ainsi que la balise ouvrante du body
require __DIR__ . "/components/head.php";
?>

<!-- Chargement de la barre de navigation -->
<?php require __DIR__ . "/components/nav.php"; ?>
<main class="container">
    <h1 class="text-center display-5 my-3">Liste des films</h1>
    <div class="d-flex justify-content-end align-items-center">
        <a href="create.php" class="btn btn-primary my-3 display-5">Nouveau film</a>
    </div>

</main>


<!-- Chargement du pied de page -->
<?php require __DIR__ . "/components/footer.php";?>

<!-- Chargement de la fermeture du document HTML -->
<?php require __DIR__ . "/components/foot.php";?>