
<?php
    require("includes/header.php");
?>

<link rel="stylesheet" href="assets/styles/forum.css" />
<br/>
<div class="row">
    <div class="col-xs-1"></div>
    <div class="col-xs-10" style="border-right : 1px solid black;">
        <h1>
            <div class="text-success text-right text-uppercase">
                <?php if(!empty($_SESSION['user_id'])):?>
                    <?php if(!sujet_resolu($infoSujet->id) AND $infoSujet->auteur_id == $_SESSION['user_id']): ?>
                        <a href="marquer_solution.php?sujet_id=<?=$_GET['id']?>&user_id=<?=$poseur->id?>&token=<?= $_SESSION['token']?>" class="btn btn-success">
                            <span class="fa fa-check"></span> Marquer comme résolu
                        </a>
                    <?php endif;?>
                <?php endif;?>

                <?php if(sujet_resolu($infoSujet->id)):?>
                    <span class="fa fa-check"></span> Résolu
                <?php endif;?>

                <?php if(!empty($infoSujet->reponse_id)):?>
                    <a id="aller_solution" class="btn btn-primary" style="color: #fff">
                        <span class="fa fa-arrow-down"></span> Aller à la solution
                    </a>
                    <script>
                        document.getElementById('aller_solution').addEventListener('click', function(event){
            
                            event.preventDefault();

                            $('html, body').animate({
                                scrollTop: $('#rep_<?=$infoSujet->reponse_id?>').offset().top
                            }, 1000, 'easeInOutExpo');
                            
                            return false;
                        });
                    </script>
                <?php endif;?>
            </div>
            Sujet : <?= $infoSujet->titre ?>
        </h1>
        <p><i><b>Question : </b><?= $infoSujet->question ?>. Posée par <b><?= $poseur->pseudo_membre ?></b></i></p>

        <br/>
        <?php include("Parties/_reponses.php"); ?>

        <?php if(!empty($_SESSION['id'])):?>
            <form method="POST" style="padding: 20px">
                <textarea name="complet" class="form-control"></textarea><br>
                <input type="submit" id="commenter" name="valider" class="btn btn-info" value="Commenter" />
            </form>
        <?php else:?>
            <div class="alert alert-danger">Vous devez vous connecter pour commenter !</div>
        <?php endif;?>        
    

        <script>
            function voir(){
                document.getElementById("codehtml").innerText = document.getElementById('leBBcode').innerHTML;
                document.getElementById("complet").value = document.getElementById('leBBcode').innerHTML;
            }

            document.getElementById("commenter").addEventListener("click", function(){
                voir();
            });
        </script>

        </body>

        <script>
            setInterval(function(){
                var nbr = document.getElementsByClassName('infosPersonne').length;
                for(i=0; i<nbr; i++){
                    var valeur = document.getElementsByClassName('contenu_commentaire')[i].clientHeight;
                    // alert(valeur);
                    document.getElementsByClassName('infosPersonne')[i].style.height = valeur+"px";

                    if(valeur<160){
                        document.getElementsByClassName('conteneur_image_profil')[i].style.display = "none";
                    }else{
                        document.getElementsByClassName('conteneur_image_profil')[i].style.display = "";
                    }
                }
            }, 3);
            
        </script>

    </div>
    
</div>

<br>

<?php require("includes/footer.php") ?>