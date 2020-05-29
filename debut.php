<!DOCTYPE html>
<html>
<head>
	<?php
    if(!empty($titre)){
   
   echo "<title>".$titre."</title>";
        }else
            {
            	echo "<title>Coder's Hub </title>";
            }
	?>
 
</head>

<?php

// Declaration des variables de session 

$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';






// Inclusion des deux fichiers 
include("fonctions.php");
include("includes/constantes.php.php");



?>

