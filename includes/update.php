<?php require_once("access.php");?>
<?php
session_start();
if($_POST['id'])
{
	$id=strip_tags($_POST['id']);
	if(isset($_SESSION['user']))
	{
		unset($_SESSION['panier'][$id]);
		require_once('panier1.php');
	}
}
?>