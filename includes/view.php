<?php require_once("access.php");?>
<?php
	if(isset($_POST['produit']))
	{ 	require_once('connect.php');
		$id=strip_tags($_POST['produit']);
		$select=$db->prepare("SELECT * FROM product WHERE code=?");
		$select->execute(array($id));
		$donne=$select->fetch();
		echo ('<ul class="breadcrumb">
    		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		    <li><a href="#">Products</a> <span class="divider">/</span></li>
		    <li class="active">product Details</li>
		    </ul>	
			<div class="row">	  
			<div id="gallery" class="span3">
			<img src="images/products/'.$id.'.jpg" style="width:100%"/></div>');
		echo('<div class="span6">');
		echo('<h3>'.$donne["nom"].'</h3>');
		echo('<hr class="soft"/>
			<form class="form-horizontal qtyFrm">
			<div class="control-group">
			<label class="control-label"><span>'.$donne["prix"].'  $</span></label>');
		echo('<div class="controls">
					<input type="number" class="span1" placeholder="Qty."/>
					<button type="submit" id="'.$id.'" class="btn btn-large btn-primary pull-right"> Add to cart 
					<i class="icon-shopping-cart"></i></button>
				</div>
				</div>
				</form>
				<hr class="soft"/>
				<h4><span class="quantite">'.$donne["quantite"].' </span> items in stock</h4>
			</div>
</div>');
}?>

<script type="text/javascript">
	$('button[class="btn btn-large btn-primary pull-right"]').click(function(event){
		event.preventDefault();
		var lien=$('button[class="btn btn-large btn-primary pull-right"]').attr('id');
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
	$('input[class="span1"]').change(function(){
		var nb=$('input[class="span1"]').val();
		var qt=$('span[class="quantite"]').text();
		nb=parseInt(nb);qt=parseInt(qt);
		if(nb>qt)
		{
			$('input[class="span1"]').val(qt);
		}
		if(nb<0)
		{
			$('input[class="span1"]').val(0);
		}
	});
</script>