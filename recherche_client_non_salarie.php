<?php

// Connexion à la base de données
include("connexion_bdd_bp.php");


$id_client = $_POST['id_client'];




$req = $bdd->prepare('SELECT nom, prenom, carte_identite FROM responsable_compte WHERE login = :login AND mot_de_passe = :mot_de_passe');

$req->execute(array(
	'login' => $login_responsable,
	'mot_de_passe' => $mot_passe_responsable
	));

//on récupère le résultat
$resultat = $req->fetch();
/*while ($donnees = $req->fetch())
{
	echo $donnees['login'] . '<br />';
	echo $donnees['mot_de_passe'] . '<br />';
}
*/

//on test si le résultation renvoie true (c'est à dire il y'a 1 login et mot de passe qui correspondent)
if (!$resultat) {
	 echo 'login ou mot de passe incorrecte! <br />';
	 echo '<a href="index.html">Réessayer</a>';
}
else{
	session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    // Redirection de l'utilisateur vers la page d'accueil accueil_responsable.php
	header('Location: accueil_responsable.php');
    echo 'Vous êtes connecté !';

}
$req->closeCursor();


?>