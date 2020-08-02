<?php

	// Connexion à la base de données
	/* require_once ("../Model/connexion_bdd_bp.php");
	require_once "../Config/autoload.php"; */
	
	require_once "../../bootstrap.php";

	//$manager = new Manager($db);

	extract($_POST);

	//$verifieResponsable = new ResponsableCompte();
	
	$responsable_compte = $entityManager->getRepository('ResponsableCompte')->findBy(
		array('login' => $login_responsable, 'mot_de_passe'  => $mot_passe_responsable));
	if($responsable_compte)
	{
		echo 'Vous êtes connecté !';
		// Redirection de l'utilisateur vers la page d'accueil accueil_responsable.php
		header('Location: ../View/accueil_responsable.php');

	}
	else
	{
		echo 'login ou mot de passe incorrecte! <br />';
		echo '<a href="../../index.php">Réessayer</a>';
	}

	//id_responsable à récupérer dans la table employés
	//$id_employes = 1;
	//Appel de la classe ResponsableCompte avec le constructeur vide et attribution de valeurs avec les méthode set
	//$responsable_compte = new ResponsableCompte (/*$id_employes, $login_responsable, $mot_passe_responsable*/);
	/* $responsable_compte->setIdEmployes($id_employes);
	$responsable_compte->setLogin($login_responsable);
	$responsable_compte->setMotDePasse($mot_passe_responsable);
 */
	/* if ($manager->verifieUserExiste($responsable_compte)) 
	{
		echo 'Vous êtes connecté !';
		// Redirection de l'utilisateur vers la page d'accueil accueil_responsable.php
		header('Location: ../View/accueil_responsable.php');
		
	}
	else
	{
		echo 'login ou mot de passe incorrecte! <br />';
		echo '<a href="../index.php">Réessayer</a>';
	} */

