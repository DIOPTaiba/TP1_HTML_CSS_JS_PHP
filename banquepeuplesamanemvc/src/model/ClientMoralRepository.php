<?php

namespace src\model; 

use libs\system\Model; 
	
class ClientMoralRepository extends Model{
	
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
    public function addClientMoral($clientMoral)
    {
        $this->db->persist($clientMoral);
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
    public function addCompteCourant($compte_courant)
    {
        $this->db->persist($compte_courant);
	    $this->db->flush();
    }
    public function addCompteBloque($compte_bloque)
    {
        $this->db->persist($compte_bloque);
	    $this->db->flush();
    }
    
    
    

}