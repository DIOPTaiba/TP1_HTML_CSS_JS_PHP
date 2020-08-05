<?php

    use Doctrine\ORM\Annotation as ORM;
	use Doctrine\Common\Collections\ArrayCollection;
	//use Doctrine\ORM\Mapping as ORM;
	/**
	 * @Entity @Table(name="responsable_compte")
	**/
	class ResponsableCompte
	{
		/** @Id @Column(type="integer") @GeneratedValue **/
		private $id;
		/** @Column(type="string") **/
		private $login;
		/** @Column(type="string") **/
		private $mot_de_passe;
		/**
		 * One Responsable has many clients. This is the inverse side.
		 * @OneToMany(targetEntity="Clients", mappedBy="id_responsable_compte")
		*/
		private $id_clients;

		/** @Column(type="integer") **/
		private $id_employes;


		public function __Construct ()
		{
			$this->id_clients = new ArrayCollection();
		}

		//Définition des getteurs
		public function getId() { return $this->id; }
		public function getIdEmployes() { return $this->id_employes; }
		public function getLogin() { return $this->login; }
		public function getMotDePasse() { return $this->mot_de_passe; }

		//Définition des Setteurs
		// public function setId($id) 
		// { 
		// 	$this->id = $id; 
		// }
		
		public function setIdEmployes($id_employes) 
		{ 
			$this->id_employes = $id_employes; 
		}

		public function setLogin($login) 
		{ 
			$this->login = $login; 
		}
		
		public function setMotDePasse($mot_de_passe) 
		{ 
			$this->mot_de_passe = $mot_de_passe; 
		}
	

	}