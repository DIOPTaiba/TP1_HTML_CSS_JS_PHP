<?php


	//$manager = new Manager($db);

	require_once "../../bootstrap.php";

	extract($_POST);

	$date_inscription = date("yy-m-d h:i:s");
	$date_ouverture = date('yy-m-d h:i:s');
	$date_changement_etat = date('yy-m-d h:i:s');
	echo 'voici id respon = ' .$id_responsable_compte;

	$responsables = $entityManager->getRepository('ResponsableCompte')->findBy(array('id' => 2));
	foreach($responsables as $responsable)
	{
		echo 'ok responsable = '.$responsable->getId();
	}

	// Insertion des infos dans la table clients
	/* $clients = new Clients ($adresse, $telephone, $email, $date_inscription, $type_client, $id_responsable_compte);
	$id_clients = $manager->addClients($clients); */
	$client = new Clients();
	$client->setAdresse($adresse);
	$client->setTelephone($telephone);
	$client->setEmail($email);
	$client->setTypeClient($type_client);
	$client->setDateInscription($date_inscription);
	$client->setIdResponsableCompte($responsable);

	//var_dump($client);
	$entityManager->persist($client);
	$entityManager->flush();


	//insertion des infos dans la table client_non_salarie
	/* $clientNonSalarie = new ClientNonSalarie ($nom, $prenom, $carte_identite, $id_clients);
	$manager->addClientNonSalarie($clientNonSalarie);
 	*/
	$clientNonSalarie = new ClientNonSalarie();
	$clientNonSalarie->setNom($nom);
	$clientNonSalarie->setPrenom($prenom);
	$clientNonSalarie->setCarteIdentite($carte_identite);
	$clientNonSalarie->setIdClients($client);

	$entityManager->persist($clientNonSalarie);
	$entityManager->flush();


	// Insertion infos sur la table compte général
	/* $comptes = new Comptes($numero_compte, $cle_rib, $solde, $date_ouverture, $numero_agence, $id_clients);
	$id_comptes = $manager->addComptes($comptes); */
	$compte = new Comptes();
	$compte->setNumero_compte($numero_compte);
	$compte->setCleRib($cle_rib);
	$compte->setSolde($solde);
	$compte->setDateOuverture($date_ouverture);
	$compte->setNumeroAgence($numero_agence);
	$compte->setIdClients($client);

	$entityManager->persist($compte);
	$entityManager->flush();


	// Insertion état compte lors de leurs créations
	/* $etat_compte = new EtatCompte('actif', $date_changement_etat, $id_comptes);
	$manager->addEtatCompte($etat_compte); */
	/* $etat_compte = new EtatCompte();
	$etat_compte->setEtatCompte("actif");
	$etat_compte->setDateChangementEtat($date_changement_etat);
	$etat_compte->setIdComptes($compte);

	$entityManager->persist($etat_compte);
	$entityManager->flush(); */


	// Insertion de données selon le type de compte choisit
	if($_POST['type_compte'] == 'compte epargne')
	{
		/* $compte_epargne = new CompteEpargne($frais_ouverture, $montant_remuneration, $id_comptes);
		$manager->addCompteEpargne($compte_epargne); */

		$compte_epargne = new CompteEpargne();
		$compte_epargne->setFraisOuverture($frais_ouverture);
		$compte_epargne->setMontantRemuneration($montant_remuneration);
		$compte_epargne->setIdComptes($compte);

		$entityManager->persist($compte_epargne);
		$entityManager->flush();
	}
	else
	{
		/* $compte_bloque = new CompteBloque($frais_ouverture, $montant_remuneration, $duree_blocage, $id_comptes);
		$manager->addCompteBloque($compte_bloque); */

		$compte_bloque = new CompteBloque();
		$compte_bloque->setFraisOuverture($frais_ouverture);
		$compte_bloque->setMontantRemuneration($montant_remuneration);
		$compte_bloque->setDureeBlocage($duree_blocage);
		$compte_bloque->setIdComptes($compte);

		$entityManager->persist($compte_bloque);
		$entityManager->flush();
	}


	echo "Les informations sont bien enregistrées";

	// Redirection du visiteur vers la page d'accueil accueil_responsable
	header('Location: ../View/accueil_responsable.php');


?>
