
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
              <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="" style="margin:10px 2px -8px 0px">Print</a>
              <form action="<?php echo base_url()?>cv_c/billing_info" method="Post">
                <input type="hidden" value="<?php if(isset($chech_value)){ echo $chech_value;}; ?>" name="txtVAT">
                <button name="btnBack" class="btn btn-default btn-xs pull-right" style="margin:10px 2px -8px 0px" id="btnBack">Back</button>
              </form>
            </div>
          </div>
      <div class="container">
        <div id="div1" style="padding:10px">
          <div style="padding:25;">
            <div class="col-sm-10 col-sm-offset-1">
              <div class="panel panel-default">
                <div class="panel panel-body">
                    <div class="row" style="padding:20px;">
                      <table>
                        <tr>
                          <td>
                             <img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px; margin-top:-17px;border: 1px solid;">
                          </td>
                          <td>
                            <!-- <img width="100px" src="<?php if(isset($acc_info->acc_photo)){echo base_url('assets/uploads').'/'.$acc_info->acc_photo;}?>" style="margin-left:622px;border: 1px solid;"> -->
                            <div  style="margin-left:622px; text-align:center;">
                              <b><?php if(isset($acc_info->acc_name)){echo $acc_info->acc_name;}?></b><br>
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
                    <table class="table tb">
                      <tr class="th">
                        <th class="th">No.</th>
                        <th class="th">CV ID</th>
                        <th class="th">Price/CV</th>
                        <th class="th">Start Date</th>
                        <th class="th">Ende Date</th>
                        <th class="th">Duration</th>
                        <th class="th">Priority</th>
                      </tr>
                      <?php $i=1; if($billing_info==TRUE)
                      {
                        foreach($billing_info as $index => $cv_info1)
                        {
                      ?>
                      <tr class="th">
                        <td class="th"><?php echo $i;$i++;?></td>
                        <td class="th"><?php echo $cv_info1->cv_code;?></td>
                        <td class="th"><?php echo $cv_info1->price.'$';?></td>
                        <td class="th"><?php echo $date_f ?></td>
                        <td class="th"><?php echo $date_t ?></td>
                        <td class="th"><?php echo $cv_info1->duration.' days';?></td>
                        <td class="th"><?php echo $cv_info1->rate_det_type;?></td>
                      </tr>
                      <?php
                        }
                      }?>
                      <tr class="th">
                        <td class="th" colspan="5" rowspan="100">
                          <img id="img" src="<?php echo base_url()?>assets/img/nonofficial.png" alt="">
                        </td>
                       <!--  <th class="th" style="text-align: right;">Sub Total :</th>
                        <th class="th"><?php echo $cv_info1->price."$";?></th> -->
                      </tr>
                      <!-- <tr class="th">
                        <th class="th" style="text-align: right;">Duration :</th>
                        <th class="th"><?php echo $cv_info1->duration." days";?></th>
                      </tr> -->
                      <tr class="th">
                        <th class="th" style="text-align: right;">Total :</th>
                        <th class="th"><?php echo $cv_info1->price."$";?></th>
                      </tr>
                      <tr class="th">
                        <th class="th" style="text-align: right;">VAT :</th>
                        <th class="th"><?php echo $VAT;?>%</th>
                      </tr>
                      <tr class="th">
                        <th class="th" style="text-align: right;">Grand Total :</th>
                        <th class="th"><?php echo $cv_info1->price+($cv_info1->price*$VAT)/(100)."$";?></th>
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
  window.location.assign("<?php echo base_url()?>cv_c/billing_info"); 
 /* window.history.back();*/
});
</script>
