<?php
session_start();

// Si l'identifiant du film à supprimer n'existe pas dans $_GET 
if (!isset($_GET['film_id']) || empty($_GET['film_id'])) {
    //On redirige l'utilisateur vers la page d'accueil
    //On arrête l'exécution du script
    return header("Loaction: index.php");
}


//Si l'identifiant du film à modifier n'existe pas dans $_GET
//On redirige l'utilisateur vers la page d'accueil
//On arrête l'exécution du script

//Dans le cas contraire,
//On récupète l'identifiant du film tout en protégeant le systeme contre les failles de types XSS
$film_id = (int)htmlspecialchars(trim($_GET['film_id'])); //1ère méthode de convertion
// $film_id_converted = intval($film_id);//convertis en entier
// var_dump($film_id);
// die();

//Etablir une connexion avec la base de données 
require __DIR__ . "/db/connexion.php";

//Effectuer une requête pour vérifier que l'identifiant appartient à celui d'un film de la table "film"
$req = $db->prepare("SELECT * FROM film WHERE id=:id");
$req->bindValue(":id", $film_id);
$req->execute();

//Compter le nombre d'enregistrement récuperer de la table film
$row = $req->rowCount();



//Si ce n'est pas le cas,
if ($row !=1)
{
    //On redirige l'utilisateur vers la page d'accueil
    //On arrête l'exécution du script
    return header("Location: index.php");
}
//Dans le cas contraire,
//Récupèrons les informations du film à supprimer
$film = $req->fetch();

// Effectuer une nouvelle requête pour la suppression 
$delet_req = $db->prepare("DELETE FROM film WHERE id=:id");
$delet_req->bindValue(":id", $film['id']);
$delet_req->execute();
$delet_req->closeCursor();

// Générer le message flash de suppression
$_SESSION['success'] = "<em>" . stripslashes($film['name']) . "</em> a bien été supprimé.";

// Effectuer une redirection vers la page index.php
// Arrêter l'exécution du script
return header("Location: index.php");