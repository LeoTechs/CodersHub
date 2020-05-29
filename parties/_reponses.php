<?php

//Recherche des réponses relatives au sujet en cours
$reponses = chercher_reponses_sujet($_GET['id']);

foreach($reponses as $reponse):?>
    <div id="rep_<?= $reponse->id; ?>" class="row">
        <!-- <div class="col-xs-1"></div> -->
        <div class="col-sm-3 col-xs-11 infosPersonne">
            <div class="conteneur_image_profil">
                <img class="image_profil" src="<?= (!empty(chercher_utilisateur_avec_id($reponse->auteur_id)->avatar_membre))?chercher_utilisateur_avec_id($reponse->auteur_id)->avatar_membre:"photos/alternative.png"?>" alt="" />
            </div>
            <br />
            <span style="color: #F9A600; font-weight: bold; font-size:1.4vw"><?= chercher_utilisateur_avec_id($reponse->auteur_id)->pseudo_membre?></span><br>
            <span>Membre</span>
        </div>

        <div class="col-sm-8 col-xs-11 contenu_commentaire">
            <div class="row tete_commentaire" style="color:white"><div id="com_pseudo" style="text-align:center; font-weight:bold;">ADMINISTRATEUR</div> <?= formater_date($reponse->date_post)?></div>
            <p><?= $reponse->commentaire?></p>
            
            <div class="text-right">
                <?php if($infoSujet->reponse_id == $reponse->id):?>
                    <span class="text-success text-uppercase">
                        <span class="fa fa-check"></span>MEILLEURE réponse
                    </span>&nbsp;
                <?php endif;?>                
                <?php if(isset($_SESSION['user_id']) AND ($_SESSION['user_id'] == $infoSujet->auteur_id) AND empty($infoSujet->reponse_id)):?>
                    <?php if(!sujet_resolu($_GET['id'])): ?>
                        <a style="font-size: 12px" href="marquer_solution.php?sujet_id=<?=$_GET['id']?>&reponse_id=<?= $reponse->id?>&user_id=<?=$poseur->id?>&token=<?= $_SESSION['token']?>" class="btn btn-success">
                            <span class="fa fa-check"></span> Marquer comme meilleure solution
                        </a>
                    <?php else:?>
                        <a style="font-size: 12px" href="marquer_solution.php?id_sujet=<?=$_GET['id']?>&reponse_id=<?= $reponse->id?>&user_id=<?=$poseur->id?>&token=<?= $_SESSION['token']?>" class="btn btn-success">
                            <span class="fa fa-check"></span> Marquer comme meilleure solution
                        </a>
                    <?php endif;?>
                <?php endif;?>

                <br />
                    
            </div>
        </div>

        <!-- <div class="col-xs-1"></div> -->
    </div>
    <!-- <br> -->
<?php endforeach;?>
<br>