
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Previw</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>">
  <style type="text/css">
    .text{text-indent: 30px;}
    .text_style{
      text-indent: 10px;
    }
  </style>
  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script>
    function printContent(el)
    {
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
</script>
</head>
  <body style="background-color:#ddd;">
    <div class="row">
      <div class="container">
        <div style=" width:210mm;margin:auto; padding:0px">

          <!-- <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="#" style="margin:10px 23px -19px 0px">Print</a> -->
          <button class="btn btn-default btn-xs pull-right" style="margin:10px 2px 19px 0px" id="btnBack">Back</button>
        </div>
      </div>
      <div class="container" id="div1">
        <div class="" style=" width:210mm;margin: 0 auto; padding:20px">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row" style="margin-top:5px">
              <table class="table">
                <tr>
                  <td>
                    <img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px;border:1px solid; margin-top:-1px"> <br>
                    <label for="" style="margin-left:10px;"><?php echo $cps_code ?></label>
                  </td>
                  <td style="padding-right:40%"></td>
                  <td>
                   <!--  <div class="pull-right"> -->
                   <a href="#">
                    <div>
                        <img width="100px" src="<?php if(isset($acc_info->acc_photo)){echo base_url('assets/uploads/').'/'.$acc_info->acc_photo;}?>" style="border:1px;" >
                    </div>
                  <!--   </div> -->
                      <?php if(isset($acc_info->acc_name)){ echo $acc_info->acc_name; }?></b>
                  </a>
                  </td>
                </tr>
              </table>
            </div>
            <div class="row" style="margin-top:15px">
             <div class="col-md-12">
                <div class="panel panel-default">
                  <div class=" text_style" style="height:25px;  line-height: 2;"><b>CV Paid Search Purchasing</b></div>
                </div>
                <table style="margin-left:15px">
                  <tr class="text_style">
                    <td>Duration:</td>
                    <td><?php
                      if($cv_pu_Duration!="1"){
                          echo $cv_pu_Duration." hours";
                      }else {
                        echo $cv_pu_Duration." hour";
                      }
                    ?></td>
                  </tr>
                  <tr class="text_style">
                    <td>Price:</td>
                    <td>$<?php echo $price;?></td>
                  </tr>

                  <tr class="text_style">
                    <td>Purchasing Date:</td>
                    <td><?php echo date("d-M-Y");?></td>
                  </tr>
                </table>
             </div>
            </div><!-- end Job Information -->
            <div class="row">
                <div class="col-md-12 text_style" style="margin-bottom:10px">
                  <div class="panel panel-default">
                    <div style="height:25px;  line-height: 2;"><b>Customer Information</b></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table style="margin-left:15px">
                        <tr class="text_style">
                          <td>Customer Name:</td>
                          <td><?php if(isset($cus_name)){echo $cus_name;}?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Phone:</td>
                          <td><?php if(isset($cus_phone)){echo $cus_phone;}?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Email:</td>
                          <td><?php if(isset($cus_email)){echo $cus_email;} ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Address:</td>
                          <td><?php if(isset($cus_addr)){echo $cus_addr;}?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>About Customer</b></div>
                        </div>
                          <p class="text">
                            <?php if(isset($acc_info->acc_phone)){ echo $acc_info->acc_desc;}?>
                          </p>
                     </div>
                  </div> -->
                </div>
              </div><!-- end ccaontact info -->
            </div>
          </div>
        </div>
      </div><!-- end contant  -->
    </div>
  </body>
  <script type="text/javascript">
    $("#btnBack").click(function(){
      window.history.back();
    });
  </script>
</html>
