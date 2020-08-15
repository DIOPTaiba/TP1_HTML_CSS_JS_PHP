<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
	/**
	 * @Entity @Table(name="etat_compte")
	**/
	class EtatCompte
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="string") **/
		private $etat_compte;
		/** @Column(type="string") **/
		private $date_changement_etat;
		/**
     	* Many etats have Many comptes.
     	* @ManyToMany(targetEntity="Comptes", mappedBy="id_etat_compte")
     	*/
		private $id_comptes;


		public function __construct()
		{
			//$this->id_comptes = new ArrayCollection();
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getEtatCompte() { return $this->etat_compte; }
		public function getDateChangementEtat() { return $this->date_changement_etat; }
		public function getIdComptes() { return $this->id_comptes; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setEtatCompte($etat_compte) 
		{ 
			$this->etat_compte = $etat_compte; 
		}

		public function setDateChangementEtat($date_changement_etat) 
		{ 
			$this->date_changement_etat =  $date_changement_etat; 
		}
		
		public function setIdComptes(Comptes $id_comptes) 
		{ 
			$this->id_comptes [] = $id_comptes;
			//return $this;
		}
	

	}