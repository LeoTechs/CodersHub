<body>
	<br>
</br>
   <div class="admin">
	<h1>LISTES DES MEMBRES</h1>
	 <table border="1px"  cellspacing="0" cellpadding="5">
	 	<tr>
	 		<td><b>ID</b></td>
	 		<td><b>NOM</b></td>
	 		<td><b>PRENOM</b></td>
	 		<td><b>PSEUDO</b></td>
	 		<td><b>EMAIL</b></td>
	 		<td><b>MOT DE PASSE</b></td>
	 		<td><b>DATE D'INSCRIPTION</b></td>
	 		<td><b>NOMBRE POST</b></td>
	 		<td><b>ACTIONS </b></td>
 		</tr>
         <?php while ($m = $membres->fetch()) { ?>
         	<tr>
         		<td><?= $m['id_membre']?></td>
         		<td><?= $m['nom_membre']?></td>
         		<td><?= $m['prenom_membre']?></td>
         		<td><?= $m['pseudo_membre']?></td>
         		<td><?= $m['email_membre']?></td>
         		<td><?= $m['mdp_membre']?></td>
         		<td><?= $m['derniere_visite_membre']?></td>
         		<td><?= $m['post_membre']?></td>
         		<td><a href="admin.php?confirmer=<?= $m['id_membre']?>">Confirmer</a> | <a href="admin.php?supprimer=<?= $m['id_membre']?>">Suppimer</a></td>
         	</tr>
         <?php }?>
	 		 </table>

   </div>
</body>
</html>


