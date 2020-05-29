<?php
include("filtres/filtre.php");
session_destroy();
// $titre="Déconnexion";
// include("../debut.php");
// echo '<h3>Vous êtes à présent déconnecté <br />
// Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a>
// pour revenir à la page précédente.<br />
// Cliquez <a href="index.php">ici</a> pour revenir à la page principale</h3>';
// echo '</div></body></html>';

header("location: index.php");
?>