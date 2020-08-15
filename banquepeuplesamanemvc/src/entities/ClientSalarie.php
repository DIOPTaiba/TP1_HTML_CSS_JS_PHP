<?php

use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\ORM\Mapping as ORM;
    /**
     * @Entity @Table(name="client_salarie")
    **/
    class ClientSalarie
    {
        /** @Id @Column(type="integer") @GeneratedValue **/
        private $id;
        /** @Column(type="string") **/
        private $nom;
        /** @Column(type="string") **/
        private $prenom;
        /** @Column(type="string") **/
        private $carte_identite;
        /** @Column(type="string") **/
        private $profession;
        /** @Column(type="decimal") **/
        private $salaire;
        /** @Column(type="string") **/
        private $nom_employeur;
        /** @Column(type="string") **/
        private $adresse_entreprise;
        /** @Column(type="string") **/
        private $raison_social;
        /** @Column(type="string") **/
        private $identifiant_entreprise;
        /**
		 * One client salarie has One client.
		 * @OneToOne(targetEntity="Clients")
		 * @JoinColumn(name="id_clients", referencedColumnName="id")
		 */
        private $id_clients;

        public function __construct()
        {
            
        }

        //Définition des getteurs
        public function getId() { return $this->id; }
        public function getNom() { return $this->nom; }
        public function getPrenom() { return $this->prenom; }
        public function getCarteIdentite() { return $this->carte_identite; }
        public function getProfession() { return $this->profession; }
        public function getSalaire() { return $this->salaire; }
        public function getNomEmployeur() { return $this->nom_employeur; }
        public function getAdresseEntreprise() { return $this->adresse_entreprise; }
        public function getRaisonSocial() { return $this->raison_social; }
        public function getIdentifiantEntreprise() { return $this->identifiant_entreprise; }
        public function getIdClients() { return $this->id_clients; }

        //Définition des setteurs
        public function setId($id) 
        { 
            $this->id = $id; 
        }

        public function setNom($nom) 
        { 
            $this->nom = $nom; 
        }

        public function setPrenom($prenom) 
        { 
            $this->prenom = $prenom; 
        }

        public function setCarteIdentite($carte_identite) 
        { 
            $this->carte_identite = $carte_identite; 
        }

        public function setProfession($profession) 
        { 
            $this->profession = $profession; 
        }
        
        public function setSalaire($salaire) 
        { 
            $this->salaire = $salaire; 
        }
        
        public function setNomEmployeur($nom_employeur) 
        { 
            $this->nom_employeur = $nom_employeur; 
        }
        
        public function setAdresseEntreprise($adresse_entreprise) 
        { 
            $this->adresse_entreprise = $adresse_entreprise; 
        }
        
        public function setRaisonSocial($raison_social) 
        { 
            $this->raison_social = $raison_social; 
        }
        
        public function setIdentifiantEntreprise($identifiant_entreprise) 
        { 
            $this->identifiant_entreprise = $identifiant_entreprise; 
        }
        
        public function setIdClients($id_clients) 
        { 
            $this->id_clients = $id_clients; 
        }
    


    }