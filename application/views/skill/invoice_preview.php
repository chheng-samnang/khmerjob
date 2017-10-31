
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
    .tl th td {
      border: 1px solid black;
      border-collapse: collapse;
        }
        .tr {
            border: 1px solid black;
            border-collapse: collapse;}
        .th {
            border: 1px solid black;
            border-collapse: collapse;
         td {
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
            <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="" style="margin:10px 0px 0px 0px;">Print</a>      
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
                    <table   style="width:100%" class="table tb">
                      <tr class="tr">
                        
                        <th class="th">Skill ID</th>
                        <th class="th">Price</th>            
                        <th class="th">Duration</th>           
                        <th class="th">Priority</th>           
                      </tr>
                      <?php $i=1;$sum_price=0;if($billing_info==TRUE)
                      {
                        foreach($billing_info as $index => $value)
                        {
                      ?>
                      <tr class="tr">                        
                        <td class="th"><?php echo $value->skill_code;?></td>
                        <td class="th"><?php echo $value->price.' $';?></td>
                        <td class="th"><?php echo $value->duration.' Days';?></td>                        
                        <td class="th"><?php echo $value->rate_det_type;?></td>
                        <?php $sum_price+=$value->price;?>                        
                      </tr>
                      <?php 
                        } 
                      }?>         
                      <tr class="tr"> 
                        <th class="th" colspan="2" rowspan="5"></td>                 
                        <th class="th" style="text-align: right;">Sub Total :</th>
                        <th class="th" ><?php echo $sum_price.".00$";?></th>
                      </tr>                                                          
                      <tr class="tr">            
                        <th class="th" style="text-align: right;">VAT :</th>
                        <th class="th" ><?php echo $VAT."%";?></th>
                      </tr>
                      <tr class="tr">
                      <input type="text" ng-init="grand='<?php echo $sum_price;?>'" name="grand" ng-model="grand" id="grand" style="visibility: hidden;">                         
                        <th class="th" style="text-align: right;">Grand Total :</th>                                             
                        <th class="th" ><?php echo $sum_price+($sum_price*$VAT)/(100)."$";?></th>
                      </tr>                               
                    </table>
                </div>
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