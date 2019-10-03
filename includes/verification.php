<?php require_once("access.php");?>
<?php
session_start();
header("Content-type: application/json; charset=utf-8");
	if(isset($_POST['user'])&&isset($_POST['modepasse']))
	{
		$user=strip_tags($_POST['user']);
		$pass=strip_tags($_POST['modepasse']);
		require_once("connect.php");
		$nom=$db->prepare("SELECT nom FROM user WHERE nom=? AND pass=?");
        $nom->execute(array($user,$pass));
        $nombre=$nom->rowCount();
        if($nombre == 1){
        	$user=$nom->fetch();
        	$_SESSION['user']=$user;
        	$_SESSION['panier'] =array();
        	$array=array("code"=>"succes");
        	echo(json_encode($array));
        }
        else{
		$array=array("code"=>"faild");
		echo(json_encode($array));
	    }
	}
	else{
		$array=array("code"=>"faild");
		echo(json_encode($array));
	    }
?>