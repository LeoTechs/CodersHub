<?php
    $titre ="Forum C-H";
    include("filtres/filtre.php");
    include('config/database.php');
    include("includes/fonctions.php");
?>

<?php
    // Recherche et affichage des informations liées au sujet en cours
    $infoSujet=chercher_sujet_avec_id($_GET['id']);

    if($infoSujet){
            if($infoSujet->status){
                $titre = "FORUM : ".$infoSujet->titre." (RESOLU)";
            }else{
                $titre = "FORUM : ".$infoSujet->titre." (NON-RESOLU)";
            }

            $poseur = chercher_utilisateur_avec_id($infoSujet->auteur_id);
    }else{
        echo "<div class='alert alert-danger'>Cette discussion n'existe pas dans la base de donnée</div>";
        die();
    }
?>

<?php
    $nav=2; //variable Menu 
    include "includes/header.php";
    include("includes/menu.php");
?>

<?php
    // Validation du formulaire (Poster une réponse)
    if(isset($_POST["valider"]) && !empty($_SESSION['id'])){
        if(non_vide(['complet'])){
            global $bd;
            $topic = nl2br(e($_POST['complet']));

            $q=$bd->prepare("INSERT INTO forum_commentaires(commentaire, auteur_id, sujet_id) VALUES(:texte, :posteur, :sujet_id)");
            $q->execute([
                "texte" => $topic,
                "posteur" => $_SESSION['id'],
                "sujet_id" => $_GET['id']
            ]);

        }
    }

?>


<?php require("view/discussions.view.php"); ?>