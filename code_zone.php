  <?php
  include "config/database.php";
  $titre ="Code Zone";
  include("filtres/filtre.php");

  $nav=3; //variable Menu

  include "includes/header.php";
  include('includes/menu.php');

  include 'view/code_zone.view.php';
  ?>