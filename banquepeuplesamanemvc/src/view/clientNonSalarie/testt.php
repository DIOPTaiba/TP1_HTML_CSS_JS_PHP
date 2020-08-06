<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ouverture Compte Bancaire</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="{$url_base}public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="{$url_base}public/css/script_index.css" />
</head>

<body>
    <header>
        <h1>BIENVENUE DANS LA BANQUE DU PEUPLE</h1>
    </header>

    <form id="form_insert_client_existant_non_salarie" action="{$url_base}RechercheClientNonSalarie/insertClientExistant" method="post" onsubmit="return verifie_formulaire_non_salarie(this)">


        <!-- <fieldset>
            <legend>Informations du Client</legend>
            <div>
                <label for="nom">Nom <em>*</em></label>
                <input type="text" id="nom" name="nom" value="{$nom}" readonly />
            </div>
            <div>
                <label for="prenom">Prénom <em>*</em></label>
                <input type="text" id="prenom" name="prenom" value="{$prenom}" readonly />
            </div>
            <div>
                <label for="adresse">Adresse <em>*</em></label>
                <input type="text" id="adresse" name="adresse" value="{$adresse}" readonly />
            </div>
            <div>
                <label for="telephone">Tel <em>*</em></label>
                <input type="tel" id="telephone" name="telephone" value="{$telephone}" readonly />
            </div>
            <div>
                <label for="email">E-mail </label>
                <input type="text" id="email" name="email" value="{$email}" readonly />
            </div>
            <div>
                <label for="carte_identite">CNI </label>
                <input type="text" id="carte_identite" name="carte_identite" value="{$carte_identite}" readonly />
            </div>
            <div>
                <label for="type_client">Type client </label>
                <input type="text" id="type_client" name="type_client" value="{$type_client}" readonly />
            </div>
            <div>
                <label for="date_inscription">Date Inscription </label>
                <input type="text" id="date_inscription" name="date_inscription" value="{$date_inscription}" readonly />
            </div>
            <div>
                <input type="hidden" id="id_clients" name="id_clients" value="{$id_clients}" readonly />
            </div>

        </fieldset> -->

        <h2>VEILLEZ SAISIR LES INFORMATIONS DU COMPTE</h2>
        <p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>

        <fieldset>
            <legend>Informations Compte</legend>
            <label class="selection_type_compte">Sélectionnez le type de compte <em>*</em></label>
            <select id="type_compte" name="type_compte" onchange="verifie_type_compte(this)">
                <option>Type de compte</option>
                <option value="compte epargne">Compte Epargne</option>
                <option id="compte_bloque" value="compte bloque" onselect="verification_duree_blocage(this)">Compte Bloqué</option>
                </select>
            <span id="erreur_selection"></span>
            <br/><br/>

            <div>
                <label for="numero_agence">N° de l'agence <em></em></label>
                <input type="text" id="numero_agence" name="numero_agence" placeholder="saisir le N° de l'agence" />
            </div>
            <div>
                <label for="numero_compte">N° Compte <em></em></label>
                <input type="text" id="numero_compte" name="numero_compte" placeholder="saisir le N° de Compte" />
            </div>
            <div>
                <label for="cle_rib">Clé RIB <em></em></label>
                <input type="text" id="cle_rib" name="cle_rib" placeholder="saisir la clé RIB" />
            </div>
            <div>
                <label for="solde">Solde (optionnel)<em></em></label>
                <input type="text" id="solde" name="solde" />
            </div>

            <div id="frais_ouverture_compte">
                <label for="frais_ouverture">Frais ouverture <em></em></label>
                <input type="text" id="frais_ouverture" name="frais_ouverture" value="10000" readonly/>
            </div>
            <div id="montant_remuneration_compte">
                <label for="montant_remuneration">Montant Rémuneration <em></em></label>
                <input type="text" id="montant_remuneration" name="montant_remuneration" value="5000" readonly />
            </div>
            <div id="agios_compte">
                <label for="agios">Agios <em></em></label>
                <input type="text" id="agios" name="agios" placeholder="saisir l'agios" />
            </div>
            <div id="duree_blocage_compte">
                <label for="duree_blocage">Durée Blocage <em></em></label>
                <input type="text" name="duree_blocage" id="duree_blocage" /><span id="mois"> mois </span><span id="erreur_duree"></span>
            </div>
        </fieldset>

        <div class="validation">
            <input type="submit" value="Valider" id="valider" />
            <input type="reset" value="Annuler" />
        </div>

    </form>

    <script type="text/javascript" src="{$url_base}public/js/script_index.js"></script>
</body>

</html>