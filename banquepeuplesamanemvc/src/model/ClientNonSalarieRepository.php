<?php

namespace src\model; 

use libs\system\Model; 
	
class ClientNonSalarieRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
    }
    
    public function getResponsableCompte($id)
    {
        return $this->db->find('ResponsableCompte',$id);
    }
    public function addClients($clients)
    {
        $this->db->persist($clients);
	    $this->db->flush();
    }
    public function addClientNonSalarie($clientNonSalarie)
    {
        $this->db->persist($clientNonSalarie);
	    $this->db->flush();
    }
    public function addCompte($compte)
    {
        $this->db->persist($compte);
	    $this->db->flush();
    }
    public function addEtatCompte($etat_compte)
    {
        $this->db->persist($etat_compte);
	    $this->db->flush();
    }
    public function addCompteEpargne($compte_epargne)
    {
        $this->db->persist($compte_epargne);
	    $this->db->flush();
    }
    public function addCompteBloque($compte_bloque)
    {
        $this->db->persist($compte_bloque);
	    $this->db->flush();
    }

    public function verifieClientExiste($identifiant_client)
    {
        return $this->db->getRepository('ClientNonSalarie')->findBy(
			array('carte_identite' => $identifiant_client));
    }

    public function getClient($id_clients)
    {
        return $this->db->find('Clients', $id_clients);
    }
    
    

}