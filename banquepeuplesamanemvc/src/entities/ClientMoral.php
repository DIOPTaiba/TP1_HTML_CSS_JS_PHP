<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
    /**
     * @Entity @Table(name="client_moral")
    **/
	class ClientMoral
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="string") **/
		private $nom_entreprise;
		/** @Column(type="string") **/
		private $identifiant_entreprise;
		/** @Column(type="string") **/
		private $raison_social;
		/**
		 * One client moral has One client.
		 * @OneToOne(targetEntity="Clients")
		 * @JoinColumn(name="id_clients", referencedColumnName="id")
		 */
		private $id_clients;


		public function __construct()
		{
			
		}

		//Définition des gett
		public function getId() { return $this->id; }
		public function getNomEntreprise() { return $this->nom_entreprise; }
		public function getIdentifiantEntreprise() { return $this->identifiant_entreprise; }
		public function getRaisonSocial() { return $this->raison_social; }
		public function getIdClients() { return $this->id_clients; }

		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setNomEntreprise($nom_entreprise) 
		{ 
			$this->nom_entreprise = $nom_entreprise; 
		}

		public function setIdentifiantEntreprise($identifiant_entreprise) 
		{ 
			$this->identifiant_entreprise = $identifiant_entreprise; 
		}

		public function setRaisonSocial($raison_social) 
		{ 
			$this->raison_social = $raison_social; 
		}

		public function setIdClients($id_clients) 
		{ 
			$this->id_clients = $id_clients; 
		}
	

	}