<?php
$nav=6;
include("filtres/filtre.php");
include("filtres/filtre_admin.php");
include("includes/menu.php");
include("config/database.php");
include "includes/header.php";


if(isset($_GET['supprimer']) AND !empty($_GET['supprimer'])){
	$supp =(int)$_GET['supprimer'];
	$req =$bd->prepare('DELETE FROM membres WHERE id_membre = ?');
	$req->execute(array($supp));
}
$membres = $bd->query('SELECT * FROM membres ORDER BY id_membre DESC LIMIT 0,10');

   

   include "view/admin.view.php";


?>