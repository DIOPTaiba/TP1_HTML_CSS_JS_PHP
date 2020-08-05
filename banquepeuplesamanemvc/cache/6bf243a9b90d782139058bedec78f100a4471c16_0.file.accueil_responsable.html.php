<?php
/* Smarty version 3.1.30, created on 2020-08-05 08:21:29
  from "/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/responsable/accueil_responsable.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f2a4fe9df7ce2_40380343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf243a9b90d782139058bedec78f100a4471c16' => 
    array (
      0 => '/opt/lampp/htdocs/mesprojets/banquepeuplesamanemvc/src/view/responsable/accueil_responsable.html',
      1 => 1596608411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2a4fe9df7ce2_40380343 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

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
    <?php if (isset($_smarty_tpl->tpl_vars['insertionOk']->value)) {?>
    <div class="alert alert-danger" style="width: 30%; margin: auto; text-align: center;">
        <?php echo $_smarty_tpl->tpl_vars['insertionOk']->value;?>

    </div>
    <?php }?>
    <h2>VEILLEZ CHOISIR LE TYPE DE CLIENT A ENREGISTRER</h2>

    <div class="accueil_responsable">

        <a href="#">Gestion Compte</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
ClientNonSalarie/compteClientNonSalarie">Compte Client non Salarié</a>

        <a href="compte_client_salarie.php">Compte Client Salarié</a>

        <a href="compte_client_moral.php">Compte Client Moral</a>

    </div>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/script_index.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
