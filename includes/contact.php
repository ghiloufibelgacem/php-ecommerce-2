	<hr class="soften">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row">
		<div class="span4">
		<h4>Contact Details</h4>
		<p>	18 Fresno,<br/> CA 93727, USA
			<br/><br/>
			info@bootsshop.com<br/>
			﻿Tel 123-456-6780<br/>
			Fax 123-456-5679<br/>
			web:bootsshop.com
		</p>		
		</div>
		<div class="span4">
		<h4>Email Us</h4>
		<form class="form-horizontal">
        <fieldset>
          <div class="control-group">
              <input type="text" placeholder="name" class="input-xlarge" id="name"/>
          </div>
		   <div class="control-group">
              <input type="email" placeholder="email" class="input-xlarge" id="email"/>
          </div>
		   <div class="control-group">
              <input type="text" placeholder="subject" class="input-xlarge" id="subject"/>
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
          </div>
            <button class="btn btn-large">Send Messages</button>
        </fieldset>
      </form>
		</div>
</div>
<script type="text/javascript">
	//validation email
	function validateEmail(email) 
	{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
	}
	//fin
	$('button[class="btn btn-large"]').click(function(event){
		event.preventDefault();
		var name=$('input[id="name"]').val();
		var email=$('input[id="email"]').val();
		var subject=$('input[id="subject"]').val();
		var message=$('textarea[id="textarea"]').val();
		var bool= validateEmail(email);
		if(bool)
		{		
				$('input[id="email"]').css('border-color','green');
				if((name.length!=0)&&(subject.length!=0)&&(message.length!=0))
				{	
					$.post('includes/feedback.php',{name:name,email:email,subject:subject,message:message});
					$.post('includes/last_produit.php',function(data){
						$("div.span9").replaceWith('<div class="span9">'+data+'</div>');
					});
				}
		}
		else{
			$('input[id="email"]').css('border-color','red');
			}
	});
</script>
