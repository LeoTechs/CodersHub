<?php
session_start();
$login="";
$titre="Inscription";
include("config/database.php");
$erreurs = array();
$nom= "";
$prenom = "";
$pseudo= "";
$email=""; 
$phone="";
$post = 0;
$temps=date("d/"."m/"."Y");
$pseudolibre;
$emaillibre; 




 if(isset($_POST['submit']))
 {
  
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

            $requete=$bd->prepare('SELECT COUNT(*) AS nbr FROM membres WHERE pseudo_membre =:pseudo'); 

            $requete->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
            $requete->execute();

               if(($requete->fetchColumn())>1){
               array_push($erreurs, "Votre pseudo existe deja");

                }
              }


              // Vérification des doublons au niveau de l'Email

               $req2=$bd->prepare('SELECT COUNT(*) AS nbr FROM membres WHERE email_membre =:email'); 

            $req2->bindValue(':email',$email, PDO::PARAM_STR);
            $req2->execute();

               if(($req2->fetchColumn())>1){
               array_push($erreurs, "Cette Adresse Email est deja utlilisé ");

                }



            // Vérification  du password 

            if(strlen($password)<8){
            	array_push($erreurs, "Votre mot de passe doit avoir minimum 8 caractères ");
            }
             
            if($password!=$pwdconfirm){

            	array_push($erreurs, "Les Mots de Passes ne Correspondent pas");
            }


 		}
     //c72a5e550132907b5caee14b66cf393d
       //Vérification des erreurs et préparation des requêtes
 		if(empty($erreurs)){

 			echo "TOUT EST OK ";

 			$req = $bd->prepare('INSERT INTO membres (nom_membre, prenom_membre, pseudo_membre, email_membre, mdp_membre, phone_membre, derniere_visite_membre, post_membre ) VALUES (:nom, :prenom, :pseudo, :email, :password, :phone, :temps, :post)');
if ($req==true) {
  
}
 			//passage des valeurs aux différents champs 
 			$req->bindValue(':nom', $nom, PDO::PARAM_STR); 
 			$req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
 			$req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR); 
 			$req->bindValue(':email', $email, PDO::PARAM_STR);  
 			$req->bindValue(':password', md5($password), PDO::PARAM_STR);
      $req->bindValue(':phone', $phone, PDO::PARAM_STR); 
 			$req->bindValue(':temps', $temps, PDO::PARAM_STR); 
 			$req->bindValue(':post', $post, PDO::PARAM_INT); 
             
             $_SESSION['pseudo']=$pseudo;
             $_SESSION['email']=$email;
             $_SESSION['temps']=$temps;
             $_SESSION['nom']=$nom; 
             $_SESSION['prenom']=$prenom; 
             $_SESSION['post']=$post;

 			// Execution de la requete  et redirection à la page de connexion 

 			$req->execute();
          header("location:finish.php");

 		} else {
 			
 	         foreach ($erreurs as $key => $error)
       {
        echo "<span class ='alert alert-error'>$error</div></br>";
           }
 		}

 	

 		 
 		}
    if(isset($_POST['connect'])){

  $login = $_POST['login'];
  
   if(empty($_POST['login']) || empty($_POST['password'])){

    echo "Veuillez entrer tous les champs";
   }
   else
   {
           $req = $bd->prepare('SELECT * FROM membres WHERE pseudo_membre = :pseudo');

          $req->bindValue(':pseudo',$_POST['login'], PDO::PARAM_STR);
          $req->execute();
          $data=$req->fetch();

          if($data['mdp_membre']== md5($_POST['password']))
            {

             
              $_SESSION['id']=$data['id_membre'];
             
              $_SESSION['type']=$data['type_membre'];

              if($_SESSION['type']=="admin"){

                header("location:admin.php");
              }else{

                header('location:accueil.php?id='.$data['id_membre']);
              }

              


             } 
               else{
                         echo "Utilisateur Inconnu";
                   }






   }
}


?>


<!DOCTYPE html>
<html>
</style>
<meta charset="utf-8">
<head>
  <link rel="stylesheet" href="assets/fontawesom/css/all.css">
  <link rel="stylesheet" href="assets/fontawesom/css/all.min.css">
  <link rel="icon" type="text/css" href="favicon.png">
  <link rel="stylesheet" href="assets/styles/style.css"> 
  <title>|Bienvenue Sur Coder's Hub</title>

</head>
<body>
  <style type="text/css">
    body{
      background-image:url("lo.jpg");  
    }
  </style>
 <div class="heading">
            <span class="title1">Coder's Hub</span>
            <span class="title2">Seulement pour les geeks! #Coder's Hub</span>
            <div id="log-box">
            <button class="register">
                <a href="#modal" class="registerLink"><i class="fas fa-id-badge"></i>S'incrire</a>
            </button>
             <button class="register">
                <a href="#modal2" class="registerLink"><i class="fas fa-door-open"></i>Se Connecter</a>
            </button>
            </div>
        </div>
        
        <div class="modal_container" id="modal">
            <div class="modal">
                <a href="#" class="close">X</a>
                <span class="modal_heading">
                   <i class="fas fa-user-tie"></i> Entrez vos informations
                </span>
                <form action="index.php" method="post">
                  <input type="text" placeholder="Nom" name="nom" value="<?php echo $nom;?>"><br>
                  <input type="text" placeholder="Prenom" name="prenom" value="<?php echo $prenom;?>"><br>
                    <input type="text" placeholder="Email" name="Email" value="<?php echo $email;?>"><br>
                    <input type="text" placeholder="Pseudo"name="pseudo" ><br>
                    <input type="password" placeholder="Password" name="password"><br>
                    <input type="password"  name="pwdconfirm"placeholder="Repetez le mot de passe"><br>
                    <input type="text" placeholder="Telephone" name="phone"><br>
                    <input type="submit" class="btnRegister" name="submit" value="S'incrire">
                </form>
                <a href="#modal2" class="signin">
                <i class="fas fa-door-open"></i> Deja inscrit? Connectez vous !
                </a>
            </div>
        </div>
        <div class="modal_container" id="modal2">
            <div class="modal1">
                <a href="#" class="close">X</a>
                <span class="modal_heading">
                    Entrez vos informations
                </span>
                <form action="index.php" method="post">
                    <input type="text" placeholder="Votre pseudo ou Adresse Email" name="login" value="<?php echo $login;?>"><br>
                    <input type="password" placeholder="Votre mot de passe" name="password" ><br>
                    <input type="submit" name="connect" class="btnRegister" value="SE CONNECTER">
                </form>
                <a href="#modal" class="signin">
                 <i class="fas fa-id-badge"></i> S'inscrire
                </a>
                <a href="#forgotPassword" class="forgotPassword">
                   <i class="fas fa-key"></i> Mot de passe oublié?
                </a>
              
            </div>
        </div>
         <div class="modal_container" id="forgotPassword">
            <div class="modal1">
                <a href="#" class="close">X</a>
                <span class="modal_heading">
                Remplissez les Champs!
                </span>
                <form action="#">
                    <input type="text" placeholder="Email" ><br>
                    <input type="text" placeholder="Username"><br>
                    <input type="number" placeholder="Numero"><br>
                    <input type="submit" class="btnRegister" value="RECUPERER">
                </form>
                <a href="#" class="signin" target="blank">
                    Toujours rien!?
                </a>
            </div>
        </div>
    </body>
    
</html>
