
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Previw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/js/angular.min.js"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js')?>" charset="utf-8"></script>
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
              <button type="button" name="btnBack" id="btnBack" class="btn btn-default btn-xs pull-right" style="margin-top: 10px;">Back</button>
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
                             <img width="100px" height="40px" src="<?php echo base_url('assets/uploads/khmer-job-logo.jpg');?>" style="margin-left:10px; margin-top:-40px;border: 1px solid;">
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
                          <div class="col-sm-6">
                           Date:<?php echo $date=date("d-m-Y");?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <table class="table tb">
                      <tr class="th">
                        <th class="th">BP ID</th>
                        <th class="th">Price</th>
                        <th class="th">Package Duration</th>
                        <th class="th">Purchased Date</th>
                        <th class="th">Expired Date</th>
                      </tr>
                      <?php $sum_price=0;if($bp_info==TRUE)
                      {
                        foreach($bp_info as $index => $b_info)
                        {
                      ?>
                      <tr class="th">
                        <td class="th"><?php echo $b_info->bp_code;?></td>
                        <td class="th"><?php echo $b_info->key_data.' $';?></td>
                        <td class="th"><?php echo $b_info->key_code.' days';?></td>
                        <td class="th"><?php echo $b_info->date_from;?></td>
                        <td class="th"><?php echo $b_info->date_expire?></td>
                        <?php $sum_price+=$b_info->key_data;?>
                      </tr>
                      <?php
                        }
                      }?>
                      <tr class="th">
                        <td class="th" colspan="3" rowspan="5">
                          <img id="img" style="width:182px;margin-left:77px;" src="http://localhost:8888/khmerjob/assets/img/nonofficial.png" alt="">
                        </td>
                        <th class="th" style="text-align: right;">Sub Total :</th>
                        <th class="th"><?php echo $sum_price." $";?></th>
                      </tr>
                      <tr class="th">
                        <th class="th" style="text-align: right;">VAT :</th>
                        <th class="th"><?php echo $VAT; ?>%</th>
                      </tr>
                      <tr class="th">
                        <th class="th" style="text-align: right;">Grand Total :</th>
                        <th class="th"><?php  echo $sum_price+($sum_price*$VAT)/(100)."$";?></th>
                      </tr>
                      <input type="hidden" name="txtGrand_total" id="txtGrand_total" value="<?php echo $sum_price+($sum_price*10)/(100);?>">
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
$("#btnBack").click(function(){
  window.history.back();
});
</script>
