<?php require_once("includes/access.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap style -->
<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
  <body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> User</strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="#"><span class="">Fr</span></a>
		<a href="#"><span class="">Es</span></a>
		<a href="#" id="panieruser">
			<span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> 
			[ <span id="items1">
			<?php
			session_start();
			$panier=0;
			if(isset($_SESSION['user']))
			{	$panier=count($_SESSION['panier']);
				echo($panier);
			}
			else{
				echo("0");
			}
			?>
			</span> ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="#"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="#" >
		<input id="srchFld" class="srchTxt" type="text"/>
		  <select class="srchTxt">
		  <option>All</option>
<?php 
require_once("includes/connect.php");
$select=$db->query("SELECT nom FROM type");
while($donnee=$select->fetch())
{
	echo('<option>'.$donnee["nom"].' </option>');
}
?>
	</select>
	<button type="button" id="cherche" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="#">Specials Offer</a></li>
	 <li class=""><a href="#">Delivery</a></li>
	 <li class=""><a href="#" id="contact">Contact</a></li>
	 <li class="">
	<a id="Login" href="#login" role="button" data-toggle="modal" style="padding-right:0">
	<span class="btn btn-large btn-success">Login</span></a>
<!-- login End====================================================================== -->
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End==================================================================== -->