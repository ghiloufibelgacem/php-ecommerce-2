<?php require_once("access.php");?>
<?php
session_start();
header("Content-type: application/json; charset=utf-8");
if(isset($_SESSION['user']))
{
	echo(json_encode(array('code'=>'succes')));
}
else{
		echo(json_encode(array('code'=>'faild')));
}
?>