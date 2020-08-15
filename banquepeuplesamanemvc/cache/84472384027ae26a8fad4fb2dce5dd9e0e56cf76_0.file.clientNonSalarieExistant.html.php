<?php
/* Smarty version 3.1.30, created on 2020-08-06 18:22:43
  from "/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/clientNonSalarie/clientNonSalarieExistant.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f2c2e53724824_99906631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84472384027ae26a8fad4fb2dce5dd9e0e56cf76' => 
    array (
      0 => '/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/clientNonSalarie/clientNonSalarieExistant.html',
      1 => 1596730932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2c2e53724824_99906631 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ouverture Compte Bancaire</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/script_index.css" />
</head>

<body>
    <header>
        <h1>BIENVENUE DANS LA BANQUE DU PEUPLE</h1>
    </header>

    <!-- <div class="choix_client">

        <p>Cliquez sur Nouveau client pour enregistrer un compte pour un nouveau client</p>
        <p>Cliquez sur Client existant pour enregistrer un compte pour un client qui existe déjà</p>
        <div id="select_client">
            <button id="nouveau_client" name="nouveau_client" onclick="affiche_nouveau_client()">Nouveau Client</button>

            <button id="client_existant" name="client_existant" onclick="affiche_client_existant()">Client Existant</button>

        </div>
        <form id="saisie_id_client" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
RechercheClientNonSalarie/rechercheClient" method="POST">
            <input type="search" id="identifiant_client" name="identifiant_client" placeholder="identifiant client" />
            <input type="submit" name="search" id="search" value="Search" />
        </form>
    </div> -->


    <form id="form_insert_client_existant_non_salarie" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
InsertClientExistant/insertClientNonSalarieExistant" method="post" onsubmit="return verifie_formulaire_non_salarie(this)">

        <h2>VEILLEZ SAISIR LES INFORMATIONS DU CLIENT</h2>
        <p><i>Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>

        <fieldset>
            <legend>Informations du Client</legend>
            <div>
                <label for="nom">Nom <em>*</em></label>
                <input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['nom']->value;?>
" readonly />
            </div>
            <div>
                <label for="prenom">Prénom <em>*</em></label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['prenom']->value;?>
" readonly />
            </div>
            <div>
                <label for="adresse">Adresse <em>*</em></label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $_smarty_tpl->tpl_vars['adresse']->value;?>
" readonly />
            </div>
            <div>
                <label for="telephone">Tel <em>*</em></label>
                <input type="tel" id="telephone" name="telephone" value="<?php echo $_smarty_tpl->tpl_vars['telephone']->value;?>
" readonly />
            </div>
            <div>
                <label for="email">E-mail </label>
                <input type="text" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" readonly />
            </div>
            <div>
                <label for="carte_identite">CNI </label>
                <input type="text" id="carte_identite" name="carte_identite" value="<?php echo $_smarty_tpl->tpl_vars['carte_identite']->value;?>
" readonly />
            </div>
            <div>
                <label for="type_client">Type client </label>
                <input type="text" id="type_client" name="type_client" value="<?php echo $_smarty_tpl->tpl_vars['type_client']->value;?>
" readonly />
            </div>
            <div>
                <label for="date_inscription">Date Inscription </label>
                <input type="text" id="date_inscription" name="date_inscription" value="<?php echo $_smarty_tpl->tpl_vars['date_inscription']->value;?>
" readonly />
            </div>
            <div>
                <input type="hidden" id="id_clients" name="id_clients" value="<?php echo $_smarty_tpl->tpl_vars['id_clients']->value;?>
" readonly />
            </div>

        </fieldset>

        <fieldset>
            <legend>Informations Compte</legend>
            <label class="selection_type_compte">Sélectionnez le type de compte <em>*</em></label>
            <select id="type_compte" name="type_compte">
					<option value="non selection">Type de compte</option>
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
                <input type="text" id="frais_ouverture" name="frais_ouverture" value="10000" />
            </div>
            <div id="montant_remuneration_compte">
                <label for="montant_remuneration">Montant Rémuneration <em></em></label>
                <input type="text" id="montant_remuneration" name="montant_remuneration" />
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

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/script_index.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
