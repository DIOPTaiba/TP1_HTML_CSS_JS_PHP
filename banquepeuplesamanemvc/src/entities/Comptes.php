<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
	/**
	 * @Entity @Table(name="comptes")
	**/
	class Comptes
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="string") **/
		private $numero_compte;
		/** @Column(type="integer") **/
		private $cle_rib;
		/** @Column(type="decimal") **/
		private $solde;
		/** @Column(type="string") **/
		private $date_ouverture;
		/** @Column(type="integer") **/
		private $numero_agence;
		/**
		 * Many comptes have one client. This is the owning side.
		 * @ManyToOne(targetEntity="Clients", inversedBy="id_comptes")
		 * @JoinColumn(name="id_clients", referencedColumnName="id")
		*/
		private $id_clients;
		/**
		 * Many Comptes have Many etats.
		 * @ManyToMany(targetEntity="EtatCompte", inversedBy="id_comptes")
		 * @JoinTable(name="comptes_etats")
		 */
		private $id_etat_compte;


		public function __construct()
		{
			$this->id_etat_compte = new ArrayCollection();
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getNumeroCompte() { return $this->numero_compte; }
		public function getCleRib() { return $this->cle_rib; }
		public function getSolde() { return $this->solde; }
		public function getNumeroAgence() { return $this->numero_agence; }
		public function getDateOuverture() { return $this->date_ouverture; }
		public function getIdClients() { return $this->id_clients; }
		public function getIdEtatCompte() { return $this->id_etat_compte; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setNumero_compte($numero_compte) 
		{ 
			$this->numero_compte = $numero_compte; 
		}

		public function setCleRib($cle_rib) 
		{ 
			$this->cle_rib = $cle_rib; 
		}

		public function setSolde($solde) 
		{ 
			$this->solde = $solde; 
		}

		public function setNumeroAgence($numero_agence) 
		{ 
			$this->numero_agence = $numero_agence; 
		}

		public function setDateOuverture($date_ouverture) 
		{ 
			$this->date_ouverture =  $date_ouverture; 
		}
		
		public function setIdClients($id_clients) 
		{ 
			$this->id_clients = $id_clients; 
		}
		public function setIdEtatCompte(EtatCompte $id_etat_compte) 
		{ 
			$this->id_etat_compte[] = $id_etat_compte;
			return $this;
		}
	

	}