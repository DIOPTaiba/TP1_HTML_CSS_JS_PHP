<?php

use libs\system\Controller;
use src\model\ClientNonSalarieRepository;

class RechercheClientNonSalarieController extends Controller
{
    public function __construct()
    {
        parent::__construct();        
    }
    
    public function rechercheClient(){  

        extract($_POST);

        $clientExistant = new ClientNonSalarieRepository();
        $resultat = $clientExistant->verifieClientExiste($identifiant_client);
        /* echo "identifiant = ".$identifiant_client;
        var_dump($resultat);
        die; */
        if($resultat != null)
		{
			foreach($resultat as $clientNonSalarie)
			{
				//$id_clientNonSalarie = $clientNonSalarie->getId();
				$nom = $clientNonSalarie->getNom();
				$prenom = $clientNonSalarie->getPrenom();
                $id_clients = $clientNonSalarie->getIdClients()->getId();
                $adresse = $clientNonSalarie->getIdClients()->getAdresse();
                $telephone = $clientNonSalarie->getIdClients()->getTelephone();
                $email = $clientNonSalarie->getIdClients()->getEmail();
                $type_client = $clientNonSalarie->getIdClients()->getTypeClient();
                $date_inscription = $clientNonSalarie->getIdClients()->getDateInscription();
                
				
            }
            //echo "identifiant = ".$identifiant_client;
       
			/* $clients = $entityManager->getRepository('Clients')->findBy(
				array('id' => $id_clients));
			foreach($clients as $client)
			{
				$adresse = $client->getAdresse();
				$telephone = $client->getTelephone();
				$email = $client->getEmail();
				$type_client = $client->getTypeClient();
            } */

            $data["nom"] = $nom;
            $data["prenom"] = $prenom;
            $data["adresse"] = $adresse;
            $data["telephone"] = $telephone;
            $data["email"] = $email;
            $data["carte_identite"] = $identifiant_client;
            $data["nom"] = $nom;
            $data["type_client"] = $type_client;
            $data["date_inscription"] = $date_inscription;
            $data["id_clients"] = $id_clients;
       
            //return $this->view->load("welcome/index", $data);
            return $this->view->load("clientNonSalarie/clientNonSalarieExistant", $data);
            /* var_dump($data);
            die; */
        }
		else
		{
			$data['clientIntrouvable'] = "Ce client n'existe pas encore, veillez reessayer";
            return $this->view->load("clientNonSalarie/compteClientNonSalarie", $data);
		}

   
    }


}