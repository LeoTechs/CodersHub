<body>
	<h1>BIENVENU SUR LE FORUM</h1>
	<br>
	<br>
	<?php if(!empty($erreurs)):?>
		<p><?= $erreurs[0]?></p>
	<?php endif;?>
	<form method="post">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Créer un sujet :</h3>
                <label for="titre">Titre : </label>
                <input data-parsley-minlength="6" required="required" class="form-control" type="text" name="titre"
                    id="titre"/>
                <label for="editor">Question : </label>
                <textarea id="editor" class="form-control" name="question"></textarea>

                <label for="categorie">CATEGORIE : </label>
                <select required="required" class="form-control" name="categorie" id="categorie" onchange="change_genre()">
                    <option value=1>PROGRAMMATION WEB</option>
                    <option value=2>PROGRAMMATION LOGICIELS</option>
                    <option value=3>HACKING ET CYBER-SECURITE</option>
                    <option value=4>INFOGRAPHIE</option>
                </select>

                <input type="submit" name="poser" class="btn btn-info" value="Créer" id="poser"/>
            </div>
            <div class="col-md-2"></div>
        </div>
	</form>
	
	<!-- <table>
		<thead>
			<tr>
				<td>id</td>
				<td>Titre</td>
				<td>Status</td>
				<td>Nombre commentaires</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($sujets as $sujet): ?>
			<tr>
				<td><?= $sujet->id;?></td>
				<td><?= $sujet->titre;?></td>
				<td><?= ($sujet->status == '1')?"Résolu":"Ouvert";?></td>
				<td><?= 0?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table> -->

	<table class="table">
		<tbody class="tbody">
			<tr class="tete">
				<th class="th text-center">Auteur</th>
				<th class="th">Sujet de discussion</th>
				<th class="th text-center th-categorie">Catégorie</th>
				<th style="max-width: 50px;" class="th">Rép</th>
				<th class="th hidden-sm">Date</th>
				<th class="th">Status</th>
			</tr>
			<?php if(count($sujets) == 0):?>
				<td colspan="5" class="text-center text-danger">
					<span class="fa fa-info-circle"></span>
					Aucun sujet disponible pour cette catégorie...
				</td>
			<?php else:?>
				<?php foreach($sujets as $sujet):?>
					<tr class="text-center">
						<td><div class="cercle" title="<?= chercher_utilisateur_avec_id($sujet->auteur_id)->pseudo_membre ?>"><?= strtoupper(chercher_utilisateur_avec_id($sujet->auteur_id)->pseudo_membre[0]) ?></div></td>
						<td><a href="<?= "discussion.php?id=".$sujet->id ?>"><span class="fa fa-question-circle"></span> <?=$sujet->titre;?></a></td>
						<td style="font-size: 0.8em"><a href="forum.php?categorie_id=<?=$sujet->categorie_id ?>"><?= explode(" ", chercher_categorie_avec_id($sujet->categorie_id))[1] ?></a></td>
						<td><?=compter_reponses_sujet($sujet->id) ?></td>
						<td class="hidden-sm"><?= formater_date($sujet->date_post, "court")?></td>
						<td><?= ($sujet->status==1)?'<div class="text-success "><span class="hidden-sm">Résolu</span><span class="fa fa-check"></span></div>':'<div class="text-info"><span class="hidden-sm">Ouvert...</span><span class="fa fa-question-circle"></span></div>'?></td>
						
					</tr>
				<?php endforeach;?>
			<?php endif;?>
		</tbody>
	</table>
	
</body>
</html>