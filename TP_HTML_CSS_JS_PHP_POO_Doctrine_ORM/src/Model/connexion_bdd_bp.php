<?php
    //Connexion à la base de donnée avec l'objet PDO
    // class ConnexionDB
    // {
        try
        {
        	$dsn = 'mysql:host=localhost;dbname=banque_peuple';
        	$username = 'root';
        	$password = '';
        	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            $db = new PDO($dsn, $username, $password, $options);
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    //}
?>