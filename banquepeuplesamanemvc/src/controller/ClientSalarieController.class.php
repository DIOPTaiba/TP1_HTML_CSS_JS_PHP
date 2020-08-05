<?php

use libs\system\Controller;
use src\model\ClientSalarieRepository;

class ClientSalarieController extends Controller
{
    public function __construct()
    {
        parent::__construct();        
    }
    
    public function compteClientSalarie(){  
        return $this->view->load("clientSalarie/compteClientSalarie");   
    }
    public function insertClientSalarie(){ 

        extract($_POST);

        $date_inscription = date("yy-m-d h:i:s");
        $date_ouverture = date('yy-m-d h:i:s');
        $date_changement_etat = date('yy-m-d h:i:s');

        
        $clientdb = new ClientSalarieRepository();
        $resultat = $clientdb->getResponsableCompte($id_responsable_compte);
        
        /* foreach($resultat as $responsable)
        {
            echo 'ok responsable = '.$responsable->getId();
        } */
        /* var_dump($responsable);
        die(); */
        $client = new Clients();
        $client->setAdresse($adresse);
        $client->setTelephone($telephone);
        $client->setEmail($email);
        $client->setTypeClient($type_client);
        $client->setDateInscription($date_inscription);
        $client->setIdResponsableCompte($resultat);

        $clientdb->addClients($client);
    

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

        $clientdb->addClientSalarie($clientSalarie);


        $compte = new Comptes();
        $compte->setNumero_compte($numero_compte);
        $compte->setCleRib($cle_rib);
        $compte->setSolde($solde);
        $compte->setDateOuverture($date_ouverture);
        $compte->setNumeroAgence($numero_agence);
        $compte->setIdClients($client);

        $clientdb->addCompte($compte);


        // Insertion état comptes lors de leurs créations
        /* $etat_compte = new EtatCompte('actif', $date_changement_etat, $id_comptes);
        $manager->addEtatCompte($etat_compte); */
        $etat_compte = new EtatCompte();
        $etat_compte->setEtatCompte("actif");
        $etat_compte->setDateChangementEtat($date_changement_etat);
        $etat_compte->setIdComptes($compte);

        $clientdb->addEtatCompte($etat_compte);


        // Insertion de données selon le type de compte choisit
        if($type_compte == 'compte epargne')
        {
            /* $compte_epargne = new CompteEpargne($frais_ouverture, $montant_remuneration, $id_comptes);
            $manager->addCompteEpargne($compte_epargne); */
            $compte_epargne = new CompteEpargne();
            $compte_epargne->setFraisOuverture($frais_ouverture);
            $compte_epargne->setMontantRemuneration($montant_remuneration);
            $compte_epargne->setIdComptes($compte);

            $clientdb->addCompteEpargne($compte_epargne);
            
        }
        else if ($type_compte == 'compte courant')
        {
            /* $compte_courant = new CompteCourant($agios, $id_comptes);
            $manager->addCompteCourant($compte_courant); */
            $compte_courant = new CompteCourant();
            $compte_courant->setAgios($agios);
            $compte_courant->setIdComptes($compte);

            $clientdb->addCompteCourant($compte_courant);

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

            $clientdb->addCompteBloque($compte_bloque);
        }


        $data["insertionOk"] = "Les informations sont bien enregistrées";

        return $this->view->load("responsable/accueil_responsable", $data);   
    } 
    

}


?>