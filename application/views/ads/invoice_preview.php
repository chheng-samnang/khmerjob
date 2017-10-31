
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Previw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/js/angular.min.js"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <style type="text/css">
    .text{text-indent: 30px;}
    .text_style{
      text-indent: 10px;
    }
    .tb th td{
    border: 1px solid black;
    border-collapse: collapse;
    }
    .tr{
    border: 1px solid black;
    border-collapse: collapse;}
    .th{
    border: 1px solid black;
    border-collapse: collapse;}
    .td{
    padding: 5px;
    text-align: left;
    }
  </style>
  <script type="text/javascript">
    function printContent(el)
    {      
      var restorepage = document.body.innerHTML;
      var restorepage = document.body.getElementByid(el).innerHTML;
      document.body.innerHTML=printcontent
      window.print();
      document.body.innerHTML=restorepage;
    }
  </script>
</head>
<!DOCTYPE html>
<html>
<head>
</script>
</head> 
</html>
    <body style="background-color:#ddd;" style="width:auto;">
      <div class="row">
          <div class="container">
            <div style=" width:210mm;margin:auto; padding:0px">
              <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="" style="margin:10px 23px -8px 0px">Print</a>      
            </div>
          </div>
          <div class="container">
        <div id="div1" style="padding:10px">
          <div style="width:280mm;">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="row">
                      <table>
                        <tr>
                          <td>
                             <img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px; margin-top:-79px;border: 1px solid;">
                          </td>
                          <td>
                            <img width="100px" src="<?php if(isset($acc_info->acc_photo)){echo base_url('assets/uploads/').'/'.$acc_info->acc_photo;}?>" style="margin-left:622px;border: 1px solid;"> 
                            <div style="margin-left:622px;">
                              <b><?php echo $acc_info->acc_name;?></b><br>
                            </div>
                          </td>
                        </tr>
                      </table>
                      <div class="col-sm-4">
                        <div class="row"> 
                          <div class="col-sm-5">
                           Date:<?php echo $date=date("Y/m/d");?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <table style="width:100%" class="table tb" style=" border: 1px solid black">
                      <tr class="tr">            
                        <th class="th">KJAD ID</th>
                        <th class="th">Price</th>            
                        <th class="th">Discount</th>
                        <th class="th">Duration</th>
                        <th class="th">Ads Location</th>                       
                      </tr>
                      <?php $i=1;$sum_price=0;$sum_discount=0;if($billing_info==TRUE)
                      {
                        foreach($billing_info as $index => $b_info)
                        {
                      ?>
                      <tr>            
                        <td class="th"><?php echo $b_info->ads_code;?></td>
                        <td class="th"><?php echo $b_info->price.'$';?></td>
                        <td class="th"><?php echo $b_info->rate_det_type=="Top"?($top->top>=2?$b_info->ads_discount:0)."%":($side->side>=2?$b_info->ads_discount:0)."%";?>                                   
                        <td class="th"><?php echo $b_info->duration.' days';?></td>
                        <td class="th"><?php echo $b_info->rate_det_type;?></td>
                        <?php $sum_price+=$b_info->price;?>
                        <?php $sum_discount+=$b_info->rate_det_type=="Top"?($top->top>=2?$b_info->ads_discount:0):($side->side>=2?$b_info->ads_discount:0);?>                                   
                      </tr>
                      <?php 
                        } 
                      }?>         
                      <tr class="tr"> 
                        <td class="th" colspan="3" rowspan="5"></td>                 
                        <td class="th" style="text-align: right;">Sub Total :</td>
                        <td class="th"><?php echo $sum_price."$";?></td>
                      </tr>               
                      <tr>            
                        <td class="th" style="text-align: right;">Discount :</td>
                        <td class="th"><?php echo $sum_discount."%";?></td>
                      </tr>
                      <tr class="tr">            
                        <td class="th" style="text-align: right;">Total :</td>           
                        <td class="th"><?php echo $total=$sum_price-(($sum_price*$sum_discount)/100)."$";?></th>
                      </tr>
                      <tr class="tr">            
                        <td class="th" style="text-align: right;">VAT :</td>
                        <td class="th"><?php echo $VAT; ?>%</th>
                      </tr>
                      <tr class="tr">          
                        <td class="th" style="text-align: right;">Grand Total :</th>                                             
                        <td class="th"><?php echo $total+($total*$VAT)/(100)."$";?></th>
                        <input type="hidden" name="txtGrand_total" id="txtGrand_total" value="<?php echo $total+($total*4)/(100);?>">                                     
                      </tr>                               
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </body>
</html>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>