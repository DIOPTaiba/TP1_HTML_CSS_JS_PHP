<?php

	// Connexion à la base de données
	/* require_once "../Config/autoload.php";
	require_once ("../Model/connexion_bdd_bp.php"); */

	//$manager = new Manager($db);
	require_once "../../bootstrap.php";

	extract($_POST);

	$date_inscription = date('yy-m-d h:i:s');
	$date_ouverture = date('yy-m-d h:i:s');
	$date_changement_etat = date('yy-m-d h:i:s');

	$responsables = $entityManager->getRepository('ResponsableCompte')->findBy(array('id' => 1));
	foreach($responsables as $responsable)
	{
		echo 'ok responsable = '.$responsable->getId();
	}

	// Insertion des infos dans la table clients
	/* $clients = new Clients ($adresse, $telephone, $email, $date_inscription, $type_client, $id_responsable_compte);
	$id_clients = $manager->addClients($clients);*/
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


	//insertion des infos dans la table client_salarie
	/* $clientSalarie = new ClientSalarie ($nom, $prenom, $carte_identite, $profession, $salaire, 
	$nom_employeur, $adresse_entreprise, $raison_social, $identifiant_entreprise, $id_clients);
	$manager->addClientSalarie($clientSalarie); */
	$clientSalarie = new ClientSalarie();
	$clientSalarie->setNom($nom);
	$clientSalarie->setPrenom($prenom);
	$clientSalarie->setCarteIdentite($carte_identite);
	$clientSalarie->setProfession($profession);
	$clientSalarie->setSalaire($salaire);
	$clientSalarie->setNomEmployeur($nom_employeur);
	$clientSalarie->setAdresseEntreprise($adresse_entreprise);
	$clientSalarie->setRaisonSocial($raison_social);
	$clientSalarie->setIdentifiantEntreprise($identifiant_entreprise);
	$clientSalarie->setIdClients($client);
//var_dump($clientSalarie);
	$entityManager->persist($clientSalarie);
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


	// Insertion état comptes lors de leurs créations
	/* $etat_compte = new EtatCompte('actif', $date_changement_etat, $id_comptes);
	$manager->addEtatCompte($etat_compte); */
	$etat_compte = new EtatCompte();
	$etat_compte->setEtatCompte("actif");
	$etat_compte->setDateChangementEtat($date_changement_etat);
	//$etat_compte->setIdComptes($compte);

	$entityManager->persist($etat_compte);
	$entityManager->flush();


	// Insertion de données selon le type de compte choisit
	if($type_compte == 'compte epargne')
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
	else if ($type_compte == 'compte courant')
	{
		/* $compte_courant = new CompteCourant($agios, $id_comptes);
		$manager->addCompteCourant($compte_courant); */
		$compte_courant = new CompteCourant();
		$compte_courant->setAgios($agios);
		$compte_courant->setIdComptes($compte);

		$entityManager->persist($compte_courant);
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
