<?php

use libs\system\Controller;
use src\model\ClientNonSalarieRepository;

class InsertClientExistantController extends Controller
{
    public function __construct()
    {
        parent::__construct();        
    }
public function insertClientNonSalarieExistant()
    {
        extract($_POST);
        $date_ouverture = date('yy-m-d h:i:s');
        $date_changement_etat = date('yy-m-d h:i:s');

        $clientdb = new ClientNonSalarieRepository();
        $client = $clientdb->getClient($id_clients);

        $compte = new Comptes();
        $compte->setNumero_compte($numero_compte);
        $compte->setCleRib($cle_rib);
        $compte->setSolde($solde);
        $compte->setDateOuverture($date_ouverture);
        $compte->setNumeroAgence($numero_agence);
        $compte->setIdClients($client);

        $clientdb->addCompte($compte);


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