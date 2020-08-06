<?php
/* Smarty version 3.1.30, created on 2020-08-06 16:17:32
  from "/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/welcome/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f2c10fc760104_45092902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '914ce252a7ae7ad3119fa129c55b58a21d7fdedf' => 
    array (
      0 => '/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/welcome/index.html',
      1 => 1596639928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2c10fc760104_45092902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page d'accueil Employés</title>
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

    <h2>VEILLEZ SELECTIONNER VOTRE PROFIL</h2>

    <div class="choix_profil">

        <button id="page_authentification_admin" onclick="affiche_authentification_admin()">Administrateur</button>

        <button id="page_authentification_responsable" onclick="affiche_authentification_responsable()">Responsable Compte</button>

        <button id="page_authentification_caissere" onclick="affiche_authentification_caissiere()">Caissière</button>

    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="alert alert-danger" style="width: 20%; margin: auto;">
        Login ou mot de passe incorrecte
    </div>
    <?php }?>

    <div id="page_authentification">


        <form id="formulaire_admin" action="src/Controller/authentification_admin.php" method="POST" onsubmit="return controle_champs_admin()">
            <fieldset>
                <legend>
                    <h3>Authentification Administrateur</h3>
                </legend>
                <label for="login_admin">Login<em>*</em></label>
                <input type="text" id="login_admin" name="login_admin" placeholder="Login" />
                <label for="mot_passe_admin">Mot de passe<em>*</em></label>
                <input type="password" id="mot_passe_admin" name="mot_passe_admin" placeholder="Mot de passe" />

                <div class="validation">
                    <input type="submit" value="Valider" id="valider_admin" />
                    <input type="reset" value="Annuler" />
                </div>
            </fieldset>


        </form>

        <form id="formulaire_responsable" action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
AuthentificationResponsable/verifieResponsable" method="POST" onsubmit="return controle_champs_responsable()">
            <fieldset>
                <legend>
                    <h3>Authentification Responsable</h3>
                </legend>
                <label for="login_responsable">Login<em>*</em></label>
                <input type="text" id="login_responsable" name="login_responsable" placeholder="Login" />
                <label for="mot_passe_responsable">Mot de passe<em>*</em></label>
                <input type="password" id="mot_passe_responsable" name="mot_passe_responsable" placeholder="Mot de passe" />

                <div class="validation">
                    <input type="submit" value="Valider" id="valider_responsable" />
                    <input type="reset" value="Annuler" />
                </div>
            </fieldset>

        </form>

        <form id="formulaire_caissiere" action="src/Controller/authentification_caissiere.php" method="POST" onsubmit="return controle_champs_caissiere()">
            <fieldset>
                <legend>
                    <h3>Authentification Caissière</h3>
                </legend>
                <label for="login_caissiere">Login<em>*</em></label>
                <input type="text" id="login_caissiere" name="login_caissiere" placeholder="Login" />
                <label for="mot_passe_caissiere">Mot de passe<em>*</em></label>
                <input type="password" id="mot_passe_caissiere" name="mot_passe_caissiere" placeholder="Mot de passe" />

                <div class="validation">
                    <input type="submit" value="Valider" id="valider_caissiere" />
                    <input type="reset" value="Annuler" />
                </div>
            </fieldset>

        </form>

    </div>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/script_index.js"><?php echo '</script'; ?>
>


</body>

</html><?php }
}
