<body>
	
<div class="profile">
	<div class="picture">

		<div class="container">
             <div class="form-div">
              <form action="voirprofile.php" method="post" enctype="multipart/form-data">

               <div class="form-group text-center">
                <input type="hidden" name="file" value="MAX_FILE_SIZE">
            </br>
                <img src="<?= !empty($user['avatar_membre'])?$user['avatar_membre']:'./profiles/default.jpg' ?>" id="add_code_default" onclick="triggerClick()">
                
                <input type="file" id="code_import"name="image" class="form-control" style="display: none" onchange="displayProfileImage(this)" accept=".jpg,.png,.gif,.bmp,.tiff"> 
              </div>
            <div class="form-group">
            	<Br>
            </Br>
        </div>
             <button type="submit" name="publish" class="btn btn-primary btn-block">Modifier Profile</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>
<script type="text/javascript" src="script2.js"></script>

	</div>
	<div class="infos">

		<H1>Informations Personelles</H1>
		<hr>
		 <p>
		 	
		 	<?php echo "<b> NOM :".$user['nom_membre']."</b>";?></br>

		 	<?php echo "<b> PRENOM :".$user['prenom_membre']."</b>";?></br>
		 	<?php echo "<b> PSEUDO : ".$user['pseudo_membre']."</b>";?></br>
		 	<?php echo "<b> ADRESSE EMAIL :".$user['email_membre']."</b>";?></br>
		 	<?php echo "<b> TELEPHONE :".$user['phone_membre']."</b>";?></br>
		 	<?php if($user['type_membre']=="admin"){echo "<b> FONCTION :"."Administrateur</b>";}?></br>



		 </p>
		 <h1>Statistiques</h1>
		 <hr>
		  <p>
		  	<ul type="circle">
		  			<li><?php  echo "Inscrit depuis le <b>".$user['derniere_visite_membre']."</b>";?></li>
		  			<li><?php  echo "Messages sur le forum: <b>".$user['post_membre']."</b>";?></li></li>
		  			<li><?php  echo "Commentaires sur le forum: <b>"."0 </b>";?></li></li>
		  	</ul>
		  </p>
		 <br>
		 <br>
          <div class="main">
          	<ul>
               <li><a href="#modal3" OnClick="show();">MODIFIER MES INFOS </a>|</li>
		       <li><a href="#">PARAMETRES </a>|</li>
		       <li><a href="#">NOTIFICATIONS </a>|</li>
		       <li><a href="#">SUPPRIMER MON COMPTE </a>|</li>
		       <li><a href="deconnexion.php">DECONNEXION</a></li>

            </ul>

          </div>

	</div>
</div>



            <div class="modal3" id="modal3">
                <a href="voirprofile.php?id=<?php echo $user['id_membre'];?>" class="close" OnClick="fermer();">X</a>
                <span class="modal_heading">
                   <i class="fas fa-user-tie"></i> Vos	 informations
                </span>
                <form action="voirprofile.php" method="POST">
                  <input type="text" placeholder="Nom" name="nom" OnClick="close();"value="<?php echo $user['nom_membre'];?>"><br>
                  <input type="text" placeholder="Prenom"  name="prenom" value="<?php echo $user['prenom_membre'];?>"><br>
                    <input type="text" placeholder="Email" name="Email" value="<?php echo $user['email_membre'];?>"><br>
                    <input type="text" placeholder="Pseudo"name="pseudo" value="<?php echo $user['pseudo_membre'];?>"><br>
                    <input type="password" placeholder="Nouveau password" name="password"><br>

                    <input type="password"  name="pwdconfirm"placeholder="Confirmation du nouveau password"><br>
                    <input type="text" placeholder="Telephone" name="phone" value="<?php echo $user['phone_membre'];?>"><br>
                    <input type="submit" class="btnRegister" name="update" value="METTRE A JOUR">

                    <?php 

                    if(!empty($_POST['update'])){

                      foreach ($erreurs as $key => $error) {

                      	echo "<input type='hidden' id='err' style='color:yellow;font-size:15px;' value='$error'>";

                      echo "<script language='javascript'>

                           var error=document.getElementById('err').value;
                           alert(error);

                      </script>";

                      }
                  }
                    ?>
                </form>

                <script type="text/javascript">


		var even = document.getElementById("modal3"); 


		function show(){
     even.style.display = "block";
     }
 
	function close(){
		 even.style.display = "none";
	}	 

	</script>

</body>
</html>

