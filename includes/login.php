<?php require_once("access.php");?>
<ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">LOGIN</li>
    </ul>
	<h3>LOGIN</h3>	
	<hr class="soft"/>
<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn Sign">Sign in</button> OR <a href="" class="btn register">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="#b" class="forget" style="text-decoration:underline">Forgot password ?</a>
					  <span  id="errer"></span>
					</div>
				</div>
			</form>
			</td>
		  </tr>
</table>
<script type="text/javascript">
	
		$('a[class="btn register"]').click(function(event){
			event.preventDefault();
			$.post('includes/inscription.php',{},function(data){
				$("div.span9").replaceWith(
  	            '<div class="span9">'+data+'</div>');
			});
		});

		$('a[class="forget"]').click(function(event){
			event.preventDefault();
			$.post('includes/forget.php',{},function(data){
				
				$("div.span9").replaceWith(
  	            '<div class="span9">'+data+'</div>');
			});
		});
		$('button[class="btn Sign"]').click(function(event){
			event.preventDefault();
			var user=$('#inputUsername').val();
			var pass=$('#inputPassword1').val();
			$.post('includes/verification.php',{user:user,modepasse:pass},function(data){
				var status=data;
				if(status["code"]=='faild')
				{
					$('#errer').css('color','red');
					$('#errer').text('il y a une erreur verifier votre donnees');
				}
				else{
						$.post('includes/last_produit.php',function(data){
							$("div.span9").replaceWith(
  	                        '<div class="span9"><ul class="breadcrumb"><li><a href="index.html">Home</a><span class="divider">/</span></li><li class="active">LastProduct</li></ul>'+data+'</div>');
						});
					}
			},'json');
		});

</script>