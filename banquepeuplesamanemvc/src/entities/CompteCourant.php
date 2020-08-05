<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
	/**
	 * @Entity @Table(name="compte_courant")
	**/
	class CompteCourant
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="decimal") **/
		private $agios;
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
		public function getAgios() { return $this->agios; }
		public function getIdComptes() { return $this->id_comptes; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }

		public function setAgios($agios) 
		{ 
			$this->agios = $agios; 
		}
		
		public function setIdComptes($id_comptes) 
		{ 
			$this->id_comptes = $id_comptes; 
		}
	
	}