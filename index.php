<?php
require_once("includes/header.php");
require_once("includes/slidebar.php");
echo ('<div id="mainBody"><div class="container"><div class="row">');
require_once("includes/left_menu.php");
echo ('<div class="span9">');
require_once("includes/feture_produits.php");
require_once("includes/last_produit.php");
echo("</div>");
echo("</div></div></div>");
require_once("includes/footer.php");
?>