<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
	/**
	 * @Entity @Table(name="compte_bloque")
	**/
	class CompteBloque
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="decimal") **/
		private $frais_ouverture;
		/** @Column(type="decimal") **/
		private $montant_remuneration;
		/** @Column(type="integer") **/
		private $duree_blocage;
		/**
		 * One compte bloque has One compte.
		 * @OneToOne(targetEntity="Comptes")
		 * @JoinColumn(name="id_comptes", referencedColumnName="id")
		 */
		private $id_comptes;


		public function __construct()
		{
			
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getFraisOuverture() { return $this->frais_ouverture; }
		public function getMontantRemuneration() { return $this->montant_remuneration; }
		public function getDureeBlocage() { return $this->duree_blocage; }
		public function getIdComptes() { return $this->id_comptes; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setFraisOuverture($frais_ouverture) 
		{ 
			$this->frais_ouverture = $frais_ouverture; 
		}

		public function setMontantRemuneration($montant_remuneration) 
		{ 
			$this->montant_remuneration = $montant_remuneration; 
		}
		
		public function setDureeBlocage($duree_blocage) 
		{ 
			$this->duree_blocage = $duree_blocage; 
		}
		
		public function setIdComptes($id_comptes) 
		{ 
			$this->id_comptes = $id_comptes; 
		}
	

	}