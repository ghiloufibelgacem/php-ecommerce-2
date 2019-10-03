<?php
require_once("access.php");
header("Content-type: application/json; charset=utf-8");
require_once("connect.php");
if(isset($_POST['nom']))
		{
			
			//$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
            //$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$select=$db->prepare("SELECT nom FROM user WHERE nom=?");
			$select->execute(array(strip_tags($_POST['nom'])));
			$nombre=$select->rowCount();
			if($nombre>0)
			{ 
				$array=array('code'=>'faild');
				echo(json_encode($array));
			}
			else{
				$array=array('code'=>'succes');
				echo(json_encode($array));
			}
		}
if(isset($_POST["email"]))
		{
			$select=$db->prepare("SELECT email FROM user WHERE email=?");
			$select->execute(array(strip_tags($_POST["email"])));
			$nombre=$select->rowCount();
			if($nombre>0)
			{ 
				$array=array('code'=>'faild');
				echo(json_encode($array));
			}
			else{
				$array=array('code'=>'succes');
				echo(json_encode($array));
			}

		}
if(isset($_POST["submit"]))
{
	$user=array(strip_tags($_POST["nom1"]),strip_tags($_POST["prenom"]),strip_tags($_POST["email1"])
		,strip_tags($_POST["pass"]));

	$insert=$db->prepare(" INSERT INTO  user(nom,prenom,email,pass) VALUES (?,?,?,?)");
	$insert->execute($user);
	$nombre=$insert->rowCount();
	if($nombre==1)
			{ 
				$array=array('code'=>'succes');
				echo(json_encode($array));
			}
    else{
	     $array=array('code'=>'faild');
		 echo(json_encode($array));
		}
}
?>

