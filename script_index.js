function controle_champ(champ, erreur)
{

   if(erreur)
   {
   		champ.style.backgroundColor = "#fba";
   		champ.placeholder = "Veillez remplir ce champ correctement"
   }

   else
      champ.style.backgroundColor = "";
}

var client_existant = document.getElementById('client_existant');
var nouveau_client = document.getElementById('nouveau_client');
var saisie_id_client = document.getElementById('saisie_id_client');


function affiche_client_existant()
{
	saisie_id_client.style.display = "block";
}
function affiche_nouveau_client()
{
	saisie_id_client.style.display = "none";
}



function verifie_nom(champ)
{
   if(champ.value.trim() == "" || !isNaN(champ.value))
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_prenom(champ)
{
   if(champ.value.trim() == "" || !isNaN(champ.value))
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_adresse(champ)
{
   if(champ.value.trim() == "" )
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_telephone(champ)
{
   if(champ.value.length != 9 || isNaN(champ.value) )
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_email(champ)
{
	/* regex doit contenir des lettres majuscules minuscule, des chiffres suivi de @ suivi minimum de 2 caractères minuscules ou 
	de chiffres, de (. - _)  suivi de . suivi de 2 minuscules minimum et 4 maximum*/
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

   if (champ.value != "" && !regex.test(champ.value))
   {
   		controle_champ(champ, true);
      	return false;
   }
   
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_profession(champ)
{
 	if(champ.value != "" && champ.value.length < 3 || !isNaN(champ.value))
	{
	    controle_champ(champ, true);
	    return false;
	}

   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_salaire(champ)
{
   /*var salaire = parseInt(champ.value);*/
   if(isNaN(champ.value) || champ.value == "")
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}


function verifie_nom_entreprise(champ)
{
   if(champ.value.length < 3 )
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}


function verifie_adresse_entreprise(champ)
{
   if(champ.value.length < 3 )
   {
      controle_champ(champ, true);
      return false;
   }
   else
   {
      controle_champ(champ, false);
      return true;
   }
}

function verifie_nom_employeur(champ)
{
	if(champ.value != "" && champ.value.length < 3 )
	{
	    controle_champ(champ, true);
	    return false;
	}

   else
   {
      controle_champ(champ, false);
      return true;
   }
}

/*var numero_agence = document.getElementById('numero_agence');
numero_agence.disabled = "true";
var numero_compte = document.getElementById('numero_compte');
numero_compte.disabled = "true";
var cle_rib = document.getElementById('cle_rib');
cle_rib.disabled = "true";
var date_ouverture = document.getElementById('date_ouverture');
date_ouverture.disabled = "true";
*/
var erreur_selection = document.getElementById('erreur_selection');

var frais_ouverture_compte = document.getElementById('frais_ouverture_compte');
var montant_remuneration_compte = document.getElementById('montant_remuneration_compte');
var agios_compte = document.getElementById('agios_compte');
var duree_blocage = document.getElementById('duree_blocage');

duree_blocage.style.display ="none";
frais_ouverture_compte.style.display ="none";
montant_remuneration_compte.style.display ="none";
agios_compte.style.display ="none";

function verifie_type_compte(champ)
{
   if(champ.selectedIndex == 0)
   {
      	erreur_selection.innerText = "Sélectionnez un type de compte";
      	erreur_selection.style.color = 'red';
      	champ.style.border = 'solid #fba';

      return false;
   }
   else
   {
   			erreur_selection.innerText = "";
		      champ.style.border = "";
   	if (champ.selectedIndex == 1)
	   {
	   		frais_ouverture_compte.style.display ="block";
            montant_remuneration_compte.style.display ="block";
	   		agios_compte.style.display ="none";
	   		duree_blocage.style.display ="none";
	   		
		    return true;
	   }
	   else if (champ.selectedIndex == 2)
	   {
	   		frais_ouverture_compte.style.display ="none";
            montant_remuneration_compte.style.display ="none";
	   		duree_blocage.style.display ="none";
	   		agios_compte.style.display ="block";
	   		
		    return true;
	   }
		else
		{	
			agios_compte.style.display ="none";
			duree_blocage.style.display ="block";
			frais_ouverture_compte.style.display = "block";
         montant_remuneration_compte.style.display ="block";
			
		    return true;
		}
   }

   	
}

var type_compte = document.getElementById('type_compte');
var temps_blocage = document.getElementById('temps_blocage');
var erreur_duree = document.getElementById('erreur_duree');


function verification_duree_blocage()
{
	/* si le type de compte sélectionné est bloqué on affiche le champs durée sinon il reste caché*/
	if(type_compte.selectedIndex == 3)
   	{
    	
    	
		if(isNaN(temps_blocage.value) || temps_blocage.value == "" || (parseInt(temps_blocage.value) < 12) )
		{
			/*alert('la durée de blocage doit faire minimum 12 mois');*/
		    controle_champ(temps_blocage, true);
		    /*erreur_duree.style.backgroundColor = "#fba";
   			erreur_duree.contentText = "Donner la durée de blocage";
   			erreur_duree.style.color = 'red';*/
		    return false;
		}
	   else
	   {
	      controle_champ(temps_blocage, false);
	      return true;
	   }
		
   	}
   	else
   	{
   		return true;
   	}
   	/*avec visiblité = hidden l'espace occupé par l'élément est conservé mais supprimé avec display = (none ou block)*/
} 


function verifie_formulaire_salarie(form)
{
   var nomOk = verifie_nom(form.nom);
   var prenomOk = verifie_prenom(form.prenom);
   var adresseOk = verifie_adresse(form.adresse);
   var telephoneOk = verifie_telephone(form.telephone);
   var mailOk = verifie_email(form.email);
   var professionOk = verifie_profession(form.profession);
   var salaireOk = verifie_salaire(form.salaire);
   var nom_entrepriseOk = verifie_nom_entreprise(form.nom_entreprise);
   var adresse_entrepriseOk = verifie_adresse_entreprise(form.adresse_entreprise);
   var nom_employeurOK = verifie_nom_employeur(form.nom_employeur);
   var type_compteOk = verifie_type_compte(form.type_compte);
   var dureeOk = verification_duree_blocage();

   if(nomOk && prenomOk && adresseOk  &&  telephoneOk && mailOk && professionOk && salaireOk && nom_entrepriseOk 
   	&& adresse_entrepriseOk && nom_employeurOK && type_compteOk && dureeOk)
   {
   		//alert("Informations enregistrées");
      	return true;
   }
   else
   {
      	alert("Veuillez remplir correctement tous les champs");
      	return false;
   }
}


/*verification formulaire non salarié*/
function verifie_formulaire_non_salarie(form)
{
   
   var nomOk = verifie_nom(form.nom);
   var prenomOk = verifie_prenom(form.prenom);
   var adresseOk = verifie_adresse(form.adresse);
   var telephoneOk = verifie_telephone(form.telephone);
   var mailOk = verifie_email(form.email);
   var type_compteOk = verifie_type_compte(form.type_compte);
   var dureeOk = verification_duree_blocage();

   if(nomOk && prenomOk && adresseOk  &&  telephoneOk && mailOk && type_compteOk && dureeOk)
   {
      	//alert("Informations enregistrées");
      	return true;
   }
   else
   {
      	alert("Veuillez remplir correctement tous les champs");
      	return false;
   }
}


/*verification formulaire entreprise*/
function verifie_formulaire_entreprise(form)
{
   
   var nom_entrepriseOk = verifie_nom_entreprise(form.nom_entreprise);
   var adresse_entrepriseOk = verifie_adresse_entreprise(form.adresse_entreprise);
   var telephoneOk = verifie_telephone(form.telephone);
   var mailOk = verifie_email(form.email);
   /*var identifiant_entrepriseOK = verifie_identifiant_entreprise(form.identifiant_entreprise);*/
   var type_compteOk = verifie_type_compte(form.type_compte);
   var dureeOk = verification_duree_blocage();

   if(nom_entrepriseOk && adresse_entrepriseOk && telephoneOk && mailOk && /*identifiant_entrepriseOK &&*/ type_compteOk && dureeOk)
   {
      	//alert("Informations enregistrées");
      	return true;
   }
   else
   {
      	alert("Veuillez remplir correctement tous les champs");
      	return false;
   }
}