
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Previw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/js/angular.min.js"); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
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
              <form method="post" action="<?php echo base_url("Cv_paid_search_c/billing_info"); ?>">
                <input type="hidden" value="<?php if(isset($check_value)){ echo $check_value; } ?>" name="check_value">
                <a class="btn btn-default btn-xs pull-right"  onclick="printContent('div1')" href="" style="margin:10px 23px -8px 0px">Print</a>
                <button class="btn btn-default btn-xs pull-right" name="btnBack" id="btnBack" style="margin:10px 2px -8px 0px">Back</button>
                </form>
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
                             <img width="100px" height="40px" src="<?php echo base_url('assets/uploads/khmer-job-logo.jpg');?>" style="margin-left:10px; margin-top:-36px;border: 1px solid;">
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
                        <th class="th">CPS ID</th>
                        <th class="th">Price</th>
                        <th class="th">Duration</th>
                      </tr>
                     <?php $sum_price=0;if($cp_info==TRUE){
                        foreach($cp_info as $cp_info){
                      ?>
                      <tr class="tr">
                        <td class="th"><?php echo $cp_info->cps_code;?></td>
                        <td class="th"><?php echo $cp_info->key_data.' $';?></td>
                        <td class="th"><?php echo $cp_info->hour.' hours';?></td>
                        <?php $sum_price+=$cp_info->key_data;?>
                      </tr>
                      <?php }} ?>
                    <tr class="tr">
                      <td class="th" colspan="1" rowspan="3">
                        <img id="img" src="<?php echo base_url()?>assets/img/nonofficial.png" alt="" style="width:220px;">
                      </td>
                      <th class="th" style="text-align: right;">Sub Total :</th>
                      <th class="th"><?php echo $sum_price.".00$";?></th>
                    </tr>
                    <tr class="tr">
                      <th class="th" style="text-align: right;">VAT :</th>
                      <th class="th"><?php echo $VAT;?>%</th>
                    </tr>
                    <tr class="tr">
                      <th class="th" style="text-align: right;">Grand Total :</th>
                      <th class="th"><?php echo $sum_price+($sum_price*$VAT)/(100)."$";?></th>
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
  // $("#img").attr("style","display:none");
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
$("#btnBack").click(function(){
  //window.history.back();
});
</script>
