<?php
 session_start();

 if(!isset($_SESSION['id'])){
echo "<h1 style='color:red;'>Veuillez vous connecter</h1>";

 	header("location:index.php");

 	exit();

 }





?>