<?php

use libs\system\Controller;
use src\model\ClientNonSalarieRepository;
use src\model\ResponsableRepository;

class ClientNonSalarieController extends Controller
{
    public function __construct()
    {
        parent::__construct();        
    }
    
    public function compteClientNonSalarie(){  
        return $this->view->load("clientNonSalarie/compteClientNonSalarie");   
    }
    public function insertClientNonSalarie(){ 

        extract($_POST);

        $date_inscription = date("yy-m-d h:i:s");
        $date_ouverture = date('yy-m-d h:i:s');
        $date_changement_etat = date('yy-m-d h:i:s');
        echo 'voici id respon = ' .$id_responsable_compte;

        
        $responsables = new ClientNonSalarieRepository();
        $resultat = $responsables->getResponsableCompte(1);
        
        foreach($resultat as $responsable)
        {
            echo 'ok responsable = '.$responsable->getId();
        }
        /* var_dump($responsable);
        die(); */
        $client = new Clients();
        $client->setAdresse($adresse);
        $client->setTelephone($telephone);
        $client->setEmail($email);
        $client->setTypeClient($type_client);
        $client->setDateInscription($date_inscription);
        //$client->setIdResponsableCompte($responsable);

        $clientdb = new ClientNonSalarieRepository();
        $clientdb->addClients($client);
    

        $clientNonSalarie = new ClientNonSalarie();
        $clientNonSalarie->setNom($nom);
        $clientNonSalarie->setPrenom($prenom);
        $clientNonSalarie->setCarteIdentite($carte_identite);
        //$clientNonSalarie->setIdClients($client);

        $clientNonSalariedb = new ClientNonSalarieRepository();
        $clientNonSalariedb->addClientNonSalarie($clientNonSalarie);


        $compte = new Comptes();
        $compte->setNumero_compte($numero_compte);
        $compte->setCleRib($cle_rib);
        $compte->setSolde($solde);
        $compte->setDateOuverture($date_ouverture);
        $compte->setNumeroAgence($numero_agence);
        //$compte->setIdClients($client);

        $comptedb = new ClientNonSalarieRepository();
        $comptedb->addCompte($compte);


        // Insertion état comptes lors de leurs créations
        /* $etat_compte = new EtatCompte('actif', $date_changement_etat, $id_comptes);
        $manager->addEtatCompte($etat_compte); */
        $etat_compte = new EtatCompte();
        $etat_compte->setEtatCompte("actif");
        $etat_compte->setDateChangementEtat($date_changement_etat);
        //$etat_compte->setIdComptes($compte);

        $etat_comptedb = new ClientNonSalarieRepository();
        $etat_comptedb->addEtatCompte($etat_compte);


        // Insertion de données selon le type de compte choisit
        if($type_compte == 'compte epargne')
        {
            /* $compte_epargne = new CompteEpargne($frais_ouverture, $montant_remuneration, $id_comptes);
            $manager->addCompteEpargne($compte_epargne); */
            $compte_epargne = new CompteEpargne();
            $compte_epargne->setFraisOuverture($frais_ouverture);
            $compte_epargne->setMontantRemuneration($montant_remuneration);
            //$compte_epargne->setIdComptes($compte);

            $compte_epargnedb = new ClientNonSalarieRepository();
            $compte_epargnedb->addCompteEpargne($compte_epargne);
            
        }
        else if ($type_compte == 'compte courant')
        {
            /* $compte_courant = new CompteCourant($agios, $id_comptes);
            $manager->addCompteCourant($compte_courant); */
            $compte_courant = new CompteCourant();
            $compte_courant->setAgios($agios);
            //$compte_courant->setIdComptes($compte);

            $compte_courantdb = new ClientNonSalarieRepository();
            $compte_courantdb->addCompteCourant($compte_courant);

        }
        else
        {
            /* $compte_bloque = new CompteBloque($frais_ouverture, $montant_remuneration, $duree_blocage, $id_comptes);
            $manager->addCompteBloque($compte_bloque); */
            $compte_bloque = new CompteBloque();
            $compte_bloque->setFraisOuverture($frais_ouverture);
            $compte_bloque->setMontantRemuneration($montant_remuneration);
            $compte_bloque->setDureeBlocage($duree_blocage);
            //$compte_bloque->setIdComptes($compte);

            $compte_bloquedb = new ClientNonSalarieRepository();
            $compte_bloquedb->addCompteBloque($compte_bloque);
        }


        //$data["insertionOk"] = "Les informations sont bien enregistrées";

        return $this->view->load("responsable/accueil_responsable"/* , $data */);   
    } 
    

}


?>