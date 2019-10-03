<?php require_once("access.php");?>
<div class="well well-small">
			<h4>Featured Products <small class="pull-right"></small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			  <div class="item active">
			  <ul class="thumbnails">
<?php 
	require_once("connect.php");
	$select=$db->query("SELECT * FROM featured ORDER BY id DESC LIMIT 8");
	for($i=0;$i<4;$i++)
	{
		$donne=$select->fetch();
			echo('<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
				  <img src="images/future/'.$donne["id"].'.jpg" alt="">
					<div class="caption">
					  <h5>'.$donne["name"].' </h5>
					  <h4><a class="btn view" href="#">VIEW</a>
					  <span class="pull-right">'.$donne["prix"].'$</span></h4>
					</div>
				  </div>
				</li>
			');
	}
echo('</ul></div>');
echo('<div class="item"><ul class="thumbnails">');
	for($i=0;$i<4;$i++)
	{
		$donne=$select->fetch();
			echo('<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
				  <a href="#"><img src="images/future/'.$donne["id"].'.jpg" alt=""></a>
					<div class="caption">
					  <h5>'.$donne["name"].' </h5>
					   <h4><a class="btn" href="#">VIEW</a>
					  <span class="pull-right">'.$donne["prix"].'$</span></h4>
					</div>
				  </div>
				</li>
			');
	}
echo('</ul></div></div><a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
<a class="right carousel-control" href="#featured" data-slide="next">›</a></div></div></div>');
 ?>
			  