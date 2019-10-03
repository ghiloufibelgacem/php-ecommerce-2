<?php require_once("access.php");?>
<?php
session_start();
header("Content-type: application/json; charset=utf-8");
if($_SESSION['user'])
{
	if(isset($_POST['id']))
	{
	$id=strip_tags($_POST['id']);
	$number=$_SESSION['panier'][$id];
	$array=array("code"=>"succes","number"=>$number);
	echo(json_encode($array));
	}
}
?>