<?php require_once("access.php"); ?>
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
		<form class="form-horizontal" >
		<h4>Your personal information</h4>
		<div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="days">
			<option value="">-</option>
			<option value="1">Mr.</option>
			<option value="2">Mrs</option>
			<option value="3">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder="First Name">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLnam" placeholder="Last Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
			<input type="text" id="input_email" placeholder="Email">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" placeholder="Password">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Date of Birth <sup>*</sup></label>
		<div class="controls">
		  <select class="span1" name="days">
				<option value="">-</option>
				<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
			<select class="span1" name="days">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
			<select class="span1" name="days">
				<option value="">-</option>
					<option value="1">1&nbsp;&nbsp;</option>
					<option value="2">2&nbsp;&nbsp;</option>
					<option value="3">3&nbsp;&nbsp;</option>
					<option value="4">4&nbsp;&nbsp;</option>
					<option value="5">5&nbsp;&nbsp;</option>
					<option value="6">6&nbsp;&nbsp;</option>
					<option value="7">7&nbsp;&nbsp;</option>
			</select>
		</div>
			<div class="control-group">
			<div class="controls"><br/>
				<input class="btn btn-large btn-success" type="submit" value="Register"/>
				<span  id="errer"></span>
			</div>
		</div>
	</div>
	</form>
</div>


<script type="text/javascript">

$('#inputFname1').blur(function(){

	var nom=$('#inputFname1').val();
	if(nom.length>0)
	{
		$.post('includes/enregistre.php',{nom:nom},function(data){
			var status=data;
			if(status["code"]=="faild")
			{	$('#inputFname1').val('');
				$('#inputFname1').css('border-color','red');
				$('#inputFname1').attr('placeholder','ce nom existe deja');
			}
			else{
				$('#inputFname1').css('border-color','green');
				}
		},'json');
	}
});

$('#input_email').blur(function(){

	var email=$('#input_email').val();
	if(email.length>0)
	{
		$.post('includes/enregistre.php',{email:email},function(data){

			var status=data;
			if(status["code"]=="faild")
			{
				$('#input_email').val('');
				$('#input_email').css('border-color','red');
				$('#input_email').attr('placeholder','ce email existe deja');
			}
			else
			{
				$('#input_email').css('border-color','green');
			}
		},'json');
	}
});
$('input[type="submit"]').click(function(event){
 event.preventDefault();
 var nom=$('#inputFname1').val();
 var prenom=$('#inputLnam').val();
 var email=$('#input_email').val();
 var pass=$('#inputPassword1').val();
 if((nom.length>0)&&(prenom.length>0)&&(email.length>0)&&(pass.length>0))
 {

 	$.post('includes/enregistre.php',{submit:'ok',nom1:nom,prenom:prenom,email1:email,pass:pass},function(data){
 		var status=data;
 		console.log(status);
 		if(status["code"]=="faild")
 		{
 			$('#errer').css('color','red');
 		    $('#errer').text('il y a une erreur');
 		}
 		else
 		{
 			$.post('includes/login.php',function(data){
 				$("div.span9").replaceWith(
  	            '<div class="span9">'+data+'</div>');
 			});
 		}
 	},'json');
 }
});
</script>