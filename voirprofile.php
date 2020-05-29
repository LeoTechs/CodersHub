<?php 
$erreurs=array();
$nom= "";
$prenom = "";
$pseudo= "";
$email=""; 
$phone="";
$password="";
include "filtres/filtre.php";

$nav=5;//variable Menu 


include("config/database.php");

$req=$bd->prepare('SELECT * FROM membres WHERE id_membre = ?');
$req->execute(array($_SESSION['id']));

$user=$req->fetch();
$titre = "Profile de ".$user['pseudo_membre'];

if(!empty($_FILES)){

	$nom_fichier=$_FILES['image']['name'];
	$nom_temporaire=$_FILES['image']['tmp_name'];
	$extension=strrchr($nom_fichier, ".");
	$destination ="profiles/".$user['pseudo_membre'].$extension;


	if(move_uploaded_file($nom_temporaire, $destination)){

		$requete=$bd->prepare('UPDATE membres SET avatar_membre = ? WHERE id_membre = ?');
		$requete->execute(array($destination, $user['id_membre']));


	}

}
// Mise a jour ou modification des informations dans la base de doneeé 

if(isset($_POST['update'])){

	$nom = htmlentities($_POST['nom']);
 	$prenom = htmlentities($_POST['prenom']);
 	$pseudo = htmlentities($_POST['pseudo']);
 	$email = htmlentities($_POST['Email']);
 	$phone = htmlentities($_POST['phone']);
 	$password = htmlentities($_POST['password']);
 	$pwdconfirm = htmlentities($_POST['pwdconfirm']);
    $phone = htmlentities($_POST['phone']);


 		if(empty($nom) || empty($prenom) || empty($pseudo) || empty($email) ||empty($password) || empty($pwdconfirm)){

 			array_push($erreurs, "Veuillez Remplire tous les champs ");
 		}
 		 else
 		{
            if(strlen($nom)<3){
            	array_push($erreurs, "Votre Nom est trop court");
            }



            if(strlen($prenom)<3){
            	array_push($erreurs, "Votre Prenom est trop court");
            }

            if(strlen($pseudo)<3){
            	array_push($erreurs, "Votre Pseudo est trop court");
            }else{

            	  //Verification des doublons au niveau du pseudo 

            
               


              // Vérification des doublons au niveau de l'Email

              



            // Vérification  du password 

            if(strlen($password)<8){
            	array_push($erreurs, "Votre mot de passe doit avoir minimum 8 caractères ");
            }
             
            if($password!=$pwdconfirm){

            	array_push($erreurs, "Les Mots de Passes ne Correspondent pas");
            }


 		}
     
 		if(empty($erreurs)){

          $id= intval($user['id_membre']);
 			
 			$req2=$bd->prepare("UPDATE membres SET nom_membre =?, prenom_membre =?, pseudo_membre = ?, email_membre = ?, phone_membre = ? WHERE id_membre = ?");

 			

 			$req2->execute(array($nom, $prenom, $pseudo, $email, $phone, $id)); 			
 			

}


}
}

include "includes/header.php";
include("includes/menu.php");
include "view/voir_profile.view.php";




?>

