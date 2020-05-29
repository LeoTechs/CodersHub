<?php
// Fonction pour vérifier si toutes les données du formulaire ont été bien remplies
    if (!function_exists("non_vide")) {
        function non_vide($champs = [])
        {
            if (count($champs) != 0) {
                foreach ($champs as $champ) {
                    if (empty($_POST[$champ]) || trim($_POST[$champ]) == "") {
                        return false;
                    }
                }

                return true;
            }
            return false;
        }
    }

    /********************************************************\
**********************************************************
**                                                      **
**  LISTE DES FONCTIONS RELATIVES A LA GESTION DU FORUM **
**                                                      **       
**********************************************************
\********************************************************/

/*
Ensemble de fonctions relatif à la gestion rapide des infos pour le Forum
    - Paramètres de Dates
    - Les getteurs de sujets ou réponses en fonction de la question et vice-versa
*/

if(!function_exists("formater_date")){
    function formater_date($date_brute, $type="long"){

        $separe = str_getcsv($date_brute, " ");

        $date = str_getcsv($separe[0], "-");
        $temps = str_getcsv($separe[1], ':')[0].":".str_getcsv($separe[1], ':')[1];
        $annee = $date[0];
        $mois_liste = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        $mois = $mois_liste[$date[1]-1];
        $jour = $date[2];

        if($type == "long"){
            return "Le ".$jour." ".$mois." ".$annee." à ".$temps;
        }
        if($type == "court"){
            return $jour." ".$mois." ".$annee;
        }
        if($type == "temps"){
            return $temps;
        }
    }
}

// Fonction quui permettra de recupérer les informations relatives à un sujet en fonction de son ID
if(!function_exists("chercher_sujet_avec_id")){
    function chercher_sujet_avec_id($id){
        global $bd;
        $r = "SELECT * FROM forum_sujets WHERE id=".$id;
        $q = $bd->query($r);

        return $q->fetch(PDO::FETCH_OBJ);
    }
}

// Fonction qui permettra de vérifier si un sujet est déjà résolu
if(!function_exists("sujet_resolu")){
    function sujet_resolu($sujet_id){
        $infos = chercher_sujet_avec_id($sujet_id);
        
        return $infos->status;
    }
}


// Fonction qui permettra de de recuperer les catégories en fonction de leurs ID
if(!function_exists('chercher_categorie_avec_id')){
    function chercher_categorie_avec_id($id){
        global $bd;

        $q = $bd->prepare("SELECT * FROM forum_categories WHERE id=:id");
        $q->execute([
            "id" => $id
        ]);

        $p = $q->fetch(PDO::FETCH_OBJ);

        if($q->rowCount() == 1){
            return $p->titre;
        }else{
            return null;
        }
    }
}

// Fonction qui retourne toutes les réponses d'un sujet en fonction de son ID
if(!function_exists("chercher_reponses_sujet")){
    function chercher_reponses_sujet($sujet_id){
        global $bd;
        $q = $bd->prepare("SELECT * FROM forum_commentaires WHERE sujet_id = :sujet_id AND approuve='1' ORDER BY date_post ASC");
        $q->execute([
            "sujet_id" => $sujet_id
        ]);

        $result = $q->fetchAll(pdo::FETCH_OBJ);

        return $result;
    }
}

// Fonction pour compter le nombre de réponses à un sujet dans le forum
if(!function_exists("compter_reponses_sujet")){
    function compter_reponses_sujet($sujet_id){
        return count(chercher_reponses_sujet($sujet_id));
    }
}


// Fonction avec un nom simple pour ne pas avoir à taper "htmlspecialchars" chaque temps chaque temps
    if(!function_exists('e')) {
        function e($chaine) {
            return htmlspecialchars($chaine);
        }
    }    

/***********************************************************
 * **                                                    ***
 *   DEBUT DES FONCTIONS POUR LA GESTION DES UTILISATEURS **
 * ***                                                    **
 ***********************************************************/

// Chercher un utilisateur en fonction de son ID
    if (!function_exists('chercher_utilisateur_avec_id')) {
        function chercher_utilisateur_avec_id($id) {
            global $bd;

            $q = $bd->prepare("SELECT * FROM membres WHERE id_membre = ?");
            $q->execute(array($id));

            return $q->fetch(PDO::FETCH_OBJ);
        }
    }