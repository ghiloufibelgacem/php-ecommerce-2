<?php require_once("access.php"); ?>
<?php
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['subject'])&&isset($_POST['message']))
  {
  	require_once("connect.php");
  	$select=$db->prepare("INSERT INTO feedbeck (name,email,subject,message) VALUES(?,?,?,?)");
  	$nom=strip_tags($_POST['name']);
  	$email=strip_tags($_POST['email']);
  	$subject=strip_tags($_POST['subject']);
  	$message=strip_tags($_POST['message']);
  	$select->execute(array($nom,$email,$subject,$message));
  }
?>