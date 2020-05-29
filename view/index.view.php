<body>
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
                    <input type="number" placeholder="Telephone" name="phone"><br>
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
                    <input type="text" placeholder="Pseudo" name="login"><br>
                    <input type="password" placeholder="Password" name="password" ><br>
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