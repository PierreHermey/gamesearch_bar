<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=moteur_de_recherche;charset=utf8', 'root', 'stagiaire');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>