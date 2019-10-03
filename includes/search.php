<?php require_once("access.php");?>
<?php
if(isset($_POST['mot'])&&isset($_POST['cat']))
{	require_once('connect.php');
	if($_POST['cat']=='All')
	{
		$select=$db->prepare("SELECT * FROM product WHERE nom LIKE ?");
		$mot="%".$_POST['mot']."%";
		$select->execute(array($mot));
		$nombre=$select->rowCount();
		if($nombre>0)
		{
		echo('
     <div class="tab-content">
		<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">');
		while($donnee=$select->fetch())
		{
		echo('
			<li class="span3">
			  <div class="thumbnail">
				<a href="#"><img src="images/products/'.$donnee["code"].'.jpg" alt=""/></a>
				<div class="caption">
				  <h5>'.$donnee["nom"].'</h5>
				  <p> 
					'.$donnee["description"].'
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="">
				   	<i class="icon-zoom-in"></i></a><a class="btn panier" href="'.$donnee["code"].'">Add to
				   	<i class="icon-shopping-cart"></i></a>
				   	<a id="'.$donnee["code"].'"class="btn btn-primary p" href="'.$donnee["prix"].'">&euro;'.$donnee["prix"].'</a></h4>
				</div>
			  </div>
			</li>');
		}
	echo ("</ul></div></div>");
	$nombre=intval($nombre/6);
	if($nombre>0){

		echo('<div class="pagination">
			<ul><li><a href="#">&lsaquo;</a></li>');
		for($i=0;$i<$nombre;$i++)
		{
			echo('<li><a href="#">'.($i+1).'</a></li>');
		}
		echo('<li><a href="#">&rsaquo;</a></li></ul></div>');
		}

	}else{
		echo('<center><img src="images/404.jpg"></center>');
		}
	}else{
		$select=$db->prepare("SELECT idt FROM type WHERE nom=?");
		$select->execute(array($_POST['cat']));
		$select=$select->fetch();
		$id=$select['idt'];
		$select=$db->prepare("SELECT * FROM product WHERE category=? AND nom LIKE ?");
		$mot="%".$_POST['mot']."%";
		$select->execute(array($id,$mot));
		$nombre=$select->rowCount();
		if($nombre)
		{
		echo('
     <div class="tab-content">
		<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">');
		while($donnee=$select->fetch())
		{
		echo('
			<li class="span3">
			  <div class="thumbnail">
				<a href="#"><img src="images/products/'.$donnee["code"].'.jpg" alt=""/></a>
				<div class="caption">
				  <h5>'.$donnee["nom"].'</h5>
				  <p> 
					'.$donnee["description"].'
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="">
				   	<i class="icon-zoom-in"></i></a><a class="btn panier" href="'.$donnee["code"].'">Add to
				   	<i class="icon-shopping-cart"></i></a>
				   	<a id="'.$donnee["code"].'"class="btn btn-primary p" href="'.$donnee["prix"].'">&euro;'.$donnee["prix"].'</a></h4>
				</div>
			  </div>
			</li>');
		}
	echo ("</ul></div></div>");
	$nombre=intval($nombre/6);
	if($nombre>0){
		echo('<div class="pagination">
			<ul><li><a href="#">&lsaquo;</a></li>');
		for($i=0;$i<$nombre;$i++)
		{
			echo('<li><a href="#">'.($i+1).'</a></li>');
		}
		echo('<li><a href="#">&rsaquo;</a></li></ul></div>');
		}
		}else{
		echo('<center><img src="images/404.jpg"></center>');
		}
}
}
?>