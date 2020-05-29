<?php

  try
    {
    	$bd = new PDO('mysql:host=localhost;dbname=coders_hub', 'root', '$*Root@%OK1234');
    }

    catch(Exception $e)
     {
     	die('Erreur'.$e->getMessage());
     }