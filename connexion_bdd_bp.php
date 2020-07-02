<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=banque_peuple', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>