<?php
if ($_SERVER['REQUEST_METHOD'] =='GET')
{
	if($_SERVER['REQUEST_URI']!='/boutique1/index.php')
	{
		header('Location:/boutique1/index.php'); 
	}
}
?>