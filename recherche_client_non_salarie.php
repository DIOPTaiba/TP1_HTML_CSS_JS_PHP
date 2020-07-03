<!DOCTYPE html>
<html>
<head>
	<title>Page d'accueil Employés</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="script_index.css" />
</head>
<body>

	<header>
		<h1>BIENVENUE DANS LA BANQUE DU PEUPLE</h1>
	</header>


	<?php

		// Connexion à la base de données
		include("connexion_bdd_bp.php");


		$identifiant_client = $_POST['identifiant_client'];

		$test = $bdd->prepare('SELECT nom FROM client_non_salarie WHERE carte_identite = ? ');
		$test->execute(array($identifiant_client));

		$reponse = $test->fetch();

		if($reponse)
		{
			$req = $bdd->prepare('SELECT client_non_salarie.nom, client_non_salarie.prenom, client_non_salarie.carte_identite, clients.adresse, clients.telephone, clients.email, clients.date_inscription, clients.type_client FROM client_non_salarie INNER JOIN clients ON client_non_salarie.id_clients = clients.id_clients WHERE carte_identite = ?');

		$req->execute(array($_POST['identifiant_client']));

			 while ($resultat = $req->fetch())
			{
				echo $resultat['nom'] . '<br />';
				echo $resultat['prenom'] . '<br />';
				echo $resultat['carte_identite'] . '<br />';
				echo $resultat['adresse'] . '<br />';
				echo $resultat['telephone'] . '<br />';
				echo $resultat['email'] . '<br />';
				echo $resultat['date_inscription'] . '<br />';
				echo $resultat['type_client'] . '<br />';

	?>

		<form id="form_insert_client_existant_non_salarie" action="insert_client_existant_non_salarie.php" method="post" onsubmit="return verifie_formulaire_non_salarie(this)">

			
			<fieldset>
				<legend>Informations du Client</legend>
				<div>
					<label for="nom">Nom <em>*</em></label>
					<input type="text" id="nom" name="nom" value="<?php echo $resultat['nom'] ?>"  readonly />
				</div>
				<div>
					<label for="prenom">Prénom <em>*</em></label>
					<input type="text" id="prenom" name="prenom" value="<?php echo $resultat['prenom'] ?>" readonly />
				</div>
				<div>
					<label for="adresse">Adresse <em>*</em></label>
					<input type="text" id="adresse" name="adresse" value="<?php echo $resultat['adresse'] ?>" readonly />
				</div>
				<div>
					<label for="telephone">Tel <em>*</em></label>
					<input type="tel" id="telephone" name="telephone" value="<?php echo $resultat['telephone'] ?>" readonly />
				</div>
				<div>
					<label for="email">E-mail </label>
					<input type="text" id="email" name="email" value="<?php echo $resultat['email'] ?>" readonly />
				</div>
				<div>
					<label for="carte_identite">CNI </label>
					<input type="text" id="carte_identite" name="carte_identite" value="<?php echo $identifiant_client ?>" readonly />
				</div>
				<div>
					<label for="type_client">Type client </label>
					<input type="text" id="type_client" name="type_client" value="<?php echo $resultat['type_client'] ?>" readonly />
				</div>
				<!--
				<div>
					<label for="id_responsable_compte">test id responsable compte </label>
					<input type="text" id="id_responsable_compte" name="id_responsable_compte" placeholder="id respon"  />
				</div>
			-->

			</fieldset>

			<h2>VEILLEZ SAISIR LES INFORMATIONS DU COMPTE</h2>
			<p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>

			<fieldset>
				<legend>Informations Compte</legend>
					<label class="selection_type_compte">Sélectionnez le type de compte <em>*</em></label>
					<select id="type_compte" name="type_compte" onchange ="verifie_type_compte(this)">
					<option>Type de compte</option>
					<option value="compte epargne">Compte Epargne</option>
					<option value="compte courant">Compte Courant</option>
					<option id="compte_bloque" value="compte bloque" onselect="verification_duree_blocage(this)">Compte Bloqué</option>
					</select>
					<span id="erreur_selection"></span>
					<br/><br/>
					
					<div>
						<label for="numero_agence">N° de l'agence <em></em></label>
						<input type="text" id="numero_agence" name="numero_agence" placeholder="saisir le N° de l'agence"/>
					</div>
					<div>
						<label for="numero_compte">N° Compte <em></em></label>
						<input type="text" id="numero_compte" name="numero_compte" placeholder="saisir le N° de Compte"/>
					</div>
					<div>
						<label for="cle_rib">Clé RIB <em></em></label>
						<input type="text" id="cle_rib" name="cle_rib" placeholder="saisir la clé RIB"/>
					</div>
					<div >
						<label for="solde">Solde (optionnel)<em></em></label>
						<input type="text" id="solde" name="solde" />
					</div>

					<div id="frais_ouverture_compte">
						<label for="frais_ouverture">Frais ouverture <em></em></label>
						<input type="text" id="frais_ouverture" name="frais_ouverture" value="10000"/>
					</div>
					<div id="montant_remuneration_compte">
						<label for="montant_remuneration">Montant Rémuneration <em></em></label>
						<input type="text" id="montant_remuneration" name="montant_remuneration" />
					</div>
					<div id="agios_compte">
						<label for="agios">Agios <em></em></label>
						<input type="text" id="agios" name="agios" placeholder="saisir l'agios"/>
					</div>
					<div id="duree_blocage_compte">
						<label for="duree_blocage">Durée Blocage <em></em></label>
						<input type="text" name="duree_blocage" id="duree_blocage"  /><span id="mois"> mois </span><span id="erreur_duree"></span>
					</div>
			</fieldset>

				<div class="validation">
					<input type="submit" value="Valider" id="valider" />
					<input type="reset" value="Annuler" />
				</div>

		</form>

	<?php

	}

		$req->closeCursor();
		}
		else{
			echo 'Aucun client trouvé pour cet identifiant : '. $identifiant_client . '<br />';
			echo '<a href="compte_client_non_salarie.php">Réessayer</a>';
		}

		/*echo "<form name='logger' action='la page ou tu es' method='post'>
		<table>
		<tr><td>Pseudo:</td><td><input type='text' name='pseudo' value='$pseudo'/></td>
		<tr><td>Password:</td><td><input type='password' name='password' value='$password'/></td>
		</table>
		<input type='submit' name='valide' value='Valider le logg'/>
		</form>";*/

		/*$req = $bdd->prepare('SELECT client_non_salarie.nom, client_non_salarie.prenom, client_non_salarie.carte_identite, clients.adresse, clients.telephone, clients.email, clients.date_inscription, clients.type_client FROM client_non_salarie INNER JOIN clients ON client_non_salarie.id_clients = clients.id_clients WHERE carte_identite = ?');

		$req->execute(array($_POST['identifiant_client']));
		*/

		//on récupère le résultat
		//$resultat = $req->fetch();

		//on test si le résultation renvoie true (c'est à dire il y'a 1 login et mot de passe qui correspondent)
		/*if (!$resultat) {
			 echo 'Aucun client trouvé pour cet identifiant : '. $identifiant_client . '<br />';
			 echo '<a href="compte_client_non_salarie.php">Réessayer</a>';
		}
		else{

		    while ($resultat = $req->fetch())
			{
				echo $resultat['nom'] . '<br />';
				echo $resultat['prenom'] . '<br />';
				echo $resultat['carte_identite'] . '<br />';
				echo $resultat['adresse'] . '<br />';
				echo $resultat['telephone'] . '<br />';
				echo $resultat['email'] . '<br />';
				echo $resultat['date_inscription'] . '<br />';
				echo $resultat['type_client'] . '<br />';

			}
		    // Redirection de l'utilisateur vers la page accueil_responsable.php
			/*header('Location: accueil_responsable.php');
		    echo 'Vous êtes connecté !';*/
		/*}*/

		/*$req->closeCursor();*/

	?>


	
	
	<script type="text/javascript" src="script_index.js"></script>
</body>
</html>