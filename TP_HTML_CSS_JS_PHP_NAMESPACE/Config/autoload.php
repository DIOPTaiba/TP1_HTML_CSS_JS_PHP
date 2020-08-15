<?php

    class Autoloader
    {
        static function register()
        {
            spl_autoload_register(array(__CLASS__,"autoload"));
        }
        static function autoload($class)
        {
            //str_replace(search, replace, subject) remplace search par replace dans subject
            $fichier = str_replace("\\", "/",$class.".php");
            //echo __DIR__.$fichier;
            $cheminAbsolu = str_replace("Config", "", __DIR__.$fichier);
            
             if (file_exists($cheminAbsolu))
            {
                require_once $cheminAbsolu;
            }

             
            // if(file_exists("../Model/".$class.".php"))
            // {
            //     require_once "../Model/".$class.".php";
            // }
            // else if(file_exists("../Controller/".$class.".php"))
            // {
            //     require_once "../Controller/".$class.".php";
            // }
            
            //namespace
            // if (file_exists(str_replace("\\", "/",$class.".php")))
            // {
            //     require_once str_replace("\\", "/",$class.".php");
            // }
        }
    }
    Autoloader::register();

?>