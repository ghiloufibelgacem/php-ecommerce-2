<?php require_once("access.php");?>
<?php header( 'content-type: text/html; charset=utf-8' );?>
<ul class="breadcrumb">
<li><a href="index.html">Home</a> <span class="divider">/</span></li>
</ul>
<?php
if(isset($_POST['produit']))
{
	$id=strip_tags($_POST['produit']);
	require_once("connect.php");
	$nom=$db->prepare("SELECT nom FROM category WHERE idcat=?");
    $nom->execute(array($id));
    $nom=$nom->fetch();
	$nom=$nom["nom"];
	echo('<h3>'.$nom.'</h3><hr class="soft"/>');

	$select=$db->query("SELECT * FROM product WHERE category=$id");
	$nombre=$select->rowCount();
	echo('
     <div class="tab-content">
		<div class="tab-pane  active" id="blockView">
			<ul class="thumbnails">');
	while($donnee=$select->fetch())
	{
		echo('
			<li class="span3">
			  <div class="thumbnail">
				<img src="images/products/'.$donnee["code"].'.jpg" style="height:130px" alt=""/>
				<div class="caption">
				  <h5>'.$donnee["nom"].'</h5>
				  <p> 
					'.$donnee["description"].'
				  </p>
				   <h4 style="text-align:center"><a class="btn view" href="#">
				   	<i class="icon-zoom-in" id="'.$donnee["code"].'"></i></a>
				   	<a class="btn panier" href="'.$donnee["code"].'">Add to<i class="icon-shopping-cart"></i></a>
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
}
?>
<script type="text/javascript">
    var i=0;
	$('a[class="btn panier"]').each(function(){
		$(this).click(function(event){
			event.preventDefault();
			var lien=$(this).attr('href');
$.post('includes/ajouter_panier.php',{produit:lien},
			function(data){
			$("div.span9").replaceWith(
  	        '<div class="span9">'+data+'</div>');
  	        //session;
  	    $.post('includes/session.php',function(data){
  	    	var status=data;
  	    	//console.log(status);
  	    	if(status['code']=='succes')
  	    	{
  	    	var i=$('#items').text();
  	        var j=$('#items1').text();
  	        //lien="#"+lien;
  	        //var p1=$(lien).attr("href");
			i=parseInt(i);
			j=parseInt(j);
			//p1=parseInt(p1);
			$('#items').text(i+1);
			$('#items1').text(j+1);
  	    	}
  	    },'json');
		});

		});

	});
	
//$('a[class="btn panier"]').click(function(event){
           
		//event.preventDefault();
		//var lien=$(this).attr("href");
		//console.log(line);
		/*$.post('includes/ajouter_panier.php',{produit:lien},
			function(data){
			$("div.span9").replaceWith(
  	        '<div class="span9">'+data+'</div>');
  	        //session;
  	    $.post('includes/session.php',function(data){
  	    	var status=data;
  	    	//console.log(status);
  	    	if(status['code']=='succes')
  	    	{
  	    	var i=$('#items').text();
  	        var j=$('#items1').text();
  	        //lien="#"+lien;
  	        //var p1=$(lien).attr("href");
			i=parseInt(i);
			j=parseInt(j);
			//p1=parseInt(p1);
			$('#items').text(i+1);
			$('#items1').text(j+1);
  	    	}
  	    },'json');
		});
	//});*/

$('a[class="btn btn-primary p"]').click(function(event){
	event.preventDefault();
});

$('a[class="btn view"]').click(function(event){
    event.preventDefault();
  });

$('i[class="icon-zoom-in"]').each(function(){
	$(this).click(function(event){
	event.preventDefault();
	var id =$(this).attr('id');
	$.post('includes/view.php',{produit:id},function(data){
		$("div.span9").replaceWith('<div class="span9">'+data+'</div>');
	});
});

});
</script>