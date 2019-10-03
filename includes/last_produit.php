<?php require_once("access.php");?>
<h4>Latest Products </h4>
<ul class="thumbnails">
<?php 
require_once("connect.php");
$select=$db->query("SELECT * FROM product ORDER BY idp DESC LIMIT 6");
for($i=0;$i<6;$i++)
{
	$donne=$select->fetch();
	echo('
		<li class="span3">
				  <div class="thumbnail">
					<img src="images/products/'.$donne["code"].'.jpg" style="height:130px"/>
					<div class="caption">
					  <h5>'.$donne["nom"].'</h5>
					  <h4 style="text-align:center"><a class="btn view" href="#">
					  <i class="icon-zoom-in" id="'.$donne["code"].'"></i></a>
					 <a class="btn panier" href="'.$donne["code"].'">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">'.$donne["prix"].'$</a></h4>
					</div>
				  </div>
				  </li>
		');
}
echo('</ul>');
?>
<!--
<script type="text/javascript">
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
</script>
-->