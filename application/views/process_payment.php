<?php
// This is The code for custmomize with method for payment bank.....
$post_id;
$VAT;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Khmer Job</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <style type="text/css">
    .img{width:150px;height:150px;}
  </style>
</head>
    <body style="background-color:#ddd;">
      <div class="container">
        <div class="panel panel-default" style="margin-top:20px;">
          <div class="panel-heading">
            <h3 class="panel-title">
              <label>*Please Select a method of payment otherwise your process won’t be completed</label>
            </h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/aba.jpg");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/anz.jpg");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/ac.png");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/wing.png");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/truemoney.png");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/lyhour.png");?>" class="img-responsive thumbnail img"></a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url("process_payment_c/payment_success");?>"><img src="<?php echo base_url("assets/process_payment/paygo.png");?>" class="img-responsive thumbnail img"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
