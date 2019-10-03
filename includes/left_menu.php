<?php require_once("access.php");?>
<?php
require_once("connect.php");
$select=$db->query("SELECT * FROM type ORDER BY idt ASC");
echo('<div id="sidebar" class="span3">
		<div class="well well-small">
		<a id="myCart" href="#">
		<img src="themes/images/ico-cart.png" alt="cart"> 
		<span id="items">'.$panier.'</span> Items in your cart</a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
	');
while($donnee=$select->fetch())
{ 
 $id=$donnee["idt"];
 $noms=$db->query("SELECT * FROM category WHERE type=$id");
 echo('<li class="subMenu open"><a>'.$donnee["nom"].'</a><ul style="display:none">');
 while($nom=$noms->fetch())
 {
 	echo('<li>
 		<a href="#" id="'.$nom["idcat"].'" class="produit">
 		<i class="icon-chevron-right"></i>'.$nom["nom"].'</a></li>');
 }
 echo('</ul>');
}
echo('</ul><br/>');
?>
		<!-- BEGIN3 ================================================== -->
			<br/>
			<div class="thumbnail">
				<img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	    <!-- END3 ================================================== -->
</div>
<script type="text/javascript">
	


</script>