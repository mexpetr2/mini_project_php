<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=boutique_konexio;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>