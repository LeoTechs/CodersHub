

<nav >
   
        <div class="logo"><a href="accueil.php"><img src=assets/img/logo.png ></a></div>
    <div class="menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>

    </div>
    <ul class="nav-links">
        
    <li <?= $nav==1?"id='act'":"";?>><a href="accueil.php" ><i class="fas fa-home"></i>Acceuil</a></li>
    <li <?= $nav==2?"id='act'":"";?>><a href="forum.php" ><i class="fas fa-users"></i>Forum</a></li>
    <li <?= $nav==3?"id='act'":"";?>><a href="code_zone.php"><i class="fas fa-laptop-code"></i>Project</a></li>
    <li <?= $nav==4?"id='act'":"";?>><a href="chat.php" ><i class="fas fa-sms"></i>Chat</a></li>
    <li <?= $nav==5?"id='act'":"";?>><a href="voirprofile.php" ><i class="fas fa-user-cog"></i>Dashboard</a></li>
    </ul>

      <!-- Style qui va activer le Menu -->

    <?php 

    echo"<style>
       #act{
    background-color: #DC143C;
    border-bottom:solid 3px #ffc045;}
    </style>";?>
</nav>
<script type="text/javascript" src="assets/javascript/script.js"></script>