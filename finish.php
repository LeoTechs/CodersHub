<?php
session_start();
$pseudo="";
$titre ="Inscription Terminée";
include("config/database.php");
include("debut.php");

$email = $_SESSION['email'];


?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titre; ?></title>
	<link rel="stylesheet" type="text/css" href="assets/styles/finish.css">
	<link rel="icon" type="text/css" href="favicon.png">
</head>
<body>
	<P>
	<?php  echo "<center><center><h1><center><center>Bravoo ".$_SESSION['pseudo']."...vous avez terminé votre Inscription ! </h1></center>";?>

</P>

	<div class="textbox">

       <h1>Inscription Termineé</h1>
       <hr>
       <p>

        	Vous venez de terminer votre Inscription à la plateforme coder's Hub, Vous allez découvrir pleins de Merveilles avec les différentes plateformes de développement  ...
        </p>

        <p> 
        </br>
        </br>
        	 <a href="index.php#modal2">Cliquer Ici</a> pour vous Connecter 

	</div>

</body>
</html>