<?php 
    // var_dump($_SERVER);
    // die();

    // Si les données arrivent au serveur via la méthode "POST",
    if ($_SERVER['REQUEST_METHOD'] === "POST") 
    {

        //Un peu de cyber sécurité
        //Protection contre les failles de types XSS pour éviter les injections de scripts malveillants 
        // $name = $_POST['name'];
        // $name = htmlspecialchars($name);
        // $name = htmlentities($name);
        // $name = strip_tags($name);
        // echo $name;
        // die();

        $post_clean = [];

        foreach ($_POST as $key => $value) 
        {
            $post_clean[$key] = htmlspecialchars(trim(addslashes($value)));
        }
        echo $post_clean['name'];
        //Protection contre les failles de types CSRF
        
        //Protection contre les spams
        
        //Validation des données 
        
        // S'il y a des erreurs, 
        //Sauvegarder les anciennes données envoyées en session,
        //Sauvegarder les messages d'erreurs en session, 
        // Redirection vers la page sur laquelle proviennent le informations,
        // Arrêt de l'exécution du script
        
        //Dans le cas contraire,
        //Etablir une connexion avec la base de donées 
        //Effectuer une requête d'insertion des données dans la table "film"
        //Effectuer une redirection vers la page d'acceuil
        //Arrêter l'exécution du script
    }
        
        ?>

<!-- Chargement de l'entête ainsi que la balise ouvrante du body -->
<?php require __DIR__ . "/components/head.php"; ?>

<!-- Chargement de la barre de navigation -->
<?php require __DIR__ . "/components/nav.php"; ?>

<!-- Chargement du contenu spécific à la page -->
<main class="container">
    <h1 class="text-center display-5 my-3">Nouveau film</h1>


    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto shadow bg-white p-4">
                <form method="post">
                    <div  class="mb-3">
                        <label for="name">Nom du  film <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" autofocus>
                    </div>
                    <div  class="mb-3">
                        <label for="actors">Nom du/des acteur(s)<span class="text-danger">*</span></label>
                        <input type="text" name="actors" id="actors" class="form-control">
                    </div>
                    <div  class="mb-3">
                        <label for="review">La note / 5</label>
                        <input type="text" name="review" id="review" class="form-control">
                    </div>
                    <div  class="mb-3">
                        <label for="comment">Un commentaire</label>
                        <textarea name="comment" id="comment ?" class="form-control"
                         rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary shadow">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require __DIR__ . "/components/footer.php"; ?>
<?php require __DIR__ . "/components/foot.php"; ?>