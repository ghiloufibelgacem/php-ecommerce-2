$(document).ready(function(){

  $("a.produit").click(function(event){
  	event.preventDefault();
  	var nom=$(this).attr('id');

  	$.post('includes/produit.php',{produit:nom},function(data){
  	$("div.span9").replaceWith(
  	'<div class="span9">'+data+'</div>');
  	});

  });

  $('#Login').click(function(event){
    $.post('includes/login.php',function(data){
    $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
    $('html,body').animate({scrollTop:500}, 'slow');
    }); 
  });

  $('#panieruser').click(function(event){
    event.preventDefault();
    $.post('includes/panier.php',function(data){
      $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
      $('html,body').animate({scrollTop:500}, 'slow');
    });
  });

  $('#myCart').click(function(event){
    event.preventDefault();
    $.post('includes/panier.php',function(data){
      $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
    });
  });

  $('button[id="cherche"]').click(function(event){
    event.preventDefault();
    var mot=$('#srchFld').val();
    var cat=$('select[class="srchTxt"]').val();
    mot.trim();
    if(mot.length!=0) 
    {
      $.post('includes/search.php',{mot:mot,cat:cat},function(data){
        $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
        $('html,body').animate({scrollTop:500}, 'slow');
      });
    }

  });

$('a[class="btn panier"]').click(function(event){
    event.preventDefault();
    var lien=$(this).attr("href");
    $.post('includes/ajouter_panier.php',{produit:lien},
      function(data){
      $("div.span9").replaceWith(
            '<div class="span9">'+data+'</div>');
        $.post('includes/session.php',function(data){
          var status=data;
          if(status['code']=='succes')
          {
          var i=$('#items').text();
          var j=$('#items1').text();
      i=parseInt(i);
      j=parseInt(j);
      $('#items').text(i+1);
      $('#items1').text(j+1);
          }
        },'json');

        });
  });

$('a[id="contact"]').click(function(event){
event.preventDefault();
$.post('includes/contact.php',function(data){
  $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
  $('html,body').animate({scrollTop:500}, 'slow');
});

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

});