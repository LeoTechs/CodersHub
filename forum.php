<?php
   $titre ="Forum";
   include("filtres/filtre.php");
   $nav=2;//variable Menu 
   include "includes/header.php";
   include("includes/menu.php");
   include("includes/fonctions.php");
   include('config/database.php');

   // Chargement de la liste des sujets de la base de données
   $q = $bd->query("SELECT * FROM forum_sujets");
   $sujets = $q->fetchAll(PDO::FETCH_OBJ);

   $erreurs = [];

   // Pour poster un sujet
   if(isset($_POST["poser"])){
      // var_dump($_POST);
      if(non_vide(['titre', 'question'])){
         $q=$bd->prepare("INSERT INTO forum_sujets(titre, question, auteur_id, categorie_id, status) VALUES(:titre, :question, :poseur, :categorie_id, '0')");
         $q->execute([
               "titre" => e($_POST['titre']),
               "question" => $_POST['question'],
               "poseur" => $_SESSION['id'],
               "categorie_id" => $_POST['categorie']
         ]);
      } else {
         $erreurs[] = "Veuillez remplir tous les champs !";
      }
   }
   include "view/forum.view.php";
?>