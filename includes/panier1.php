<?php require_once("access.php");?>
<?php echo('
  <ul class="breadcrumb">
    <li><a href="index.html">Home</a><span class="divider">/</span></li>
    <li class="active">PANIER</li>
    </ul>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product</th>
        <th>Description</th>
        <th>Quantity/Update</th>
        <th>Price</th>
        <th>Total</th>
        </tr>
    </thead>
    <tbody>
  ');
 require_once('connect.php');
      $panier=$_SESSION['panier'];
      foreach($panier as $key => $value)
      {
        $select=$db->prepare("SELECT nom,description,prix FROM product WHERE code=?");
        $select->execute(array($key));
        $select=$select->fetch();
        echo('<tr>
        <td><img width="60" src="images/products/'.$key.'.jpg" alt=""/></td>
        <td>'.$select["nom"].'<br/>'.$select["description"].'</td>
        <td>
    <div class="input-append" id="'.$key.'"">
    <input class="span1"style="max-width:34px"placeholder="'.$value.'" id="quantity'.$key.'"size="16" type="text">
            <button class="btn '.$key.'moins" type="button"><i class="icon-minus"></i></button>
            <button class="btn '.$key.'plus" type="button"><i class="icon-plus"></i></button>
            <button id="'.$key.'" class="btn btn-danger '.$key.'" type="button">
            <i class="icon-remove icon-white"></i></button></div>
          </td>
          <td><span id="span1">'.$select["prix"].'</span>&euro;</td>
          <td><span id="span2">'.$select["prix"]*$value.'</span>&euro;</td>
          </tr>
          ');
      }
?>
<tr>
        <td colspan="6" style="text-align:right">Total Price: </td>
        <td id="Total"></td>
    </tr>
    <tr>
      <td colspan="6" style="text-align:right">Total Discount:  </td>
      <td>$00.00</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align:right">Total Tax: </td>
        <td>$00.00</td>
    </tr>
    <tr>
        <td colspan="6" style="text-align:right"><strong>TOTAL  =</strong></td>
        <td class="label label-important" style="display:block"> <strong id="Total"></strong></td>
    </tr>
</tbody>
</table>
<button type="submit" class="btn Sign">Commande</button>
<script type="text/javascript">
  var Total=0;
  $('span[id="span2"]').each(function(){
    var price=$(this).text();
    price=parseInt(price);
    Total+=price;
  });
  $('strong[id="Total"]').text(Total);
  $('td[id="Total"]').text(Total);
  $('div[class="input-append"]').each(function(){

    var id=$(this).attr('id');
    var btnplus='button[class="btn '+id+'plus"]';
    var btnmois='button[class="btn '+id+'moins"]';
    var input='input[id="quantity'+id+'"]';
    var btndel='button[class="btn btn-danger '+id+'"]';

    $(btnplus).click(function(event){
      var i=$(input).attr('placeholder');
      i=parseInt(i);
      i++;
      $(input).attr('placeholder',i);

      //changer panier
      var span1='span[class='+id+'1]'
      var span2='span[class='+id+'2]'
      var price=$(span1).text();
      var totale=$(span2).text();
      var fin=$('td[id="Total"]').text();
      fin=parseInt(fin);
      price=parseInt(price);
      totale=parseInt(totale);
      totale+=price;
      fin+=price;
      $(span2).text(totale);
      $('td[id="Total"]').text(fin);
      $('strong[id="Total"]').text(fin);

    });

    $(btnmois).click(function(event){
      var i=$(input).attr('placeholder');
      i=parseInt(i);
      i--;
      if(i<=0) i=0;
      $(input).attr('placeholder',i);


      //changer panier
      var span1='span[class='+id+'1]'
      var span2='span[class='+id+'2]'
      var price=$(span1).text();
      var totale=$(span2).text();
      var fin=$('td[id="Total"]').text();
      fin=parseInt(fin);
      price=parseInt(price);
      totale=parseInt(totale);
      if(totale>0)
      {
      totale-=price;
      fin-=price;
      $(span2).text(totale);
      $('td[id="Total"]').text(fin);
      $('strong[id="Total"]').text(fin);
      }
      //fin

    });
    $(btndel).click(function(event){
      var id=$(this).attr('id');
       $.post('includes/nombre.php',{id:id},function(data){
        var status=data;
        if(status['code']==='succes')
        {
            var n=parseInt(status['number']);
            var i=$('#items').text();
            var j=$('#items1').text();
            i=parseInt(i);
            j=parseInt(j);
            i-=n;j-=n;
            $('#items').text(i);
            $('#items1').text(j);
        }
      },'json');
      $.post('includes/update.php',{id:id},function(data){
          $("div.span9").replaceWith('<div class="span9">'+data+'</div>');
      });

    });
  });
</script>