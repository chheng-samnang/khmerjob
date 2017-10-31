
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
      <div class="col-md-10">
        
      </div>
    </div>
    <div class="row">
      <div class="container">
        <div style=" width:210mm;margin:auto; padding:0px">
          <a class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" href="" style="margin:10px 23px -19px 0px">Print</a>      
        </div>
      </div>
      <div class="container" id="div1">
        <div class="" style=" width:210mm;margin: 0 auto; padding:20px">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row" style="margin-top:5px"> 
              <table class="table">
                <tr>
                  <td><img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px;border:1px solid; margin-top:-1px"></td>
                  <td style="padding-right:40%"></td>
                  <td>
                   <!--  <div class="pull-right"> -->
                   
                    <div>
                        <img width="100px" src="<?php echo base_url('assets/uploads/'.$acc_info->acc_photo);?>" style="border:1px;" > 
                    </div>
                  <!--   </div> -->
                      <b ><?php if(isset($acc_info->acc_name)) echo $acc_info->acc_name; ?>
                  
                  </td>
                </tr>
              </table>
            </div>
            <div class="row" style="margin-top:15px">
               <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class=" text_style" style="height:25px;  line-height: 2;"><b>Skill Information</b></div>
                  </div>
                  <table style="margin-left:15px">                    
                    <tr class="text_style">
                      <td>Skill ID:</td>
                      <td><?php echo $ID;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Priority:</td>
                      <td><?php if(isset($ddlPriority->rate_det_type)){echo $ddlPriority->rate_det_type.' ';echo $ddlPriority->duration!=0?$ddlPriority->duration." days":"Unlimited";}?></td>
                    </tr>
                    <tr class="text_style">
                      <td>location:</td>
                      <td><?php echo $loc_name->loc_name;?></td>
                    </tr>
                  
                    <tr class="text_style">
                      <td>Category:</td>
                      <td><?php echo $cat_name->cat_name;?></td>
                    </tr>
                     <tr class="text_style">
                      <td>I am / We are:</td>                                           
                    </tr> 
                    <tr>
                      <td></td>
                      <td><?php echo array_search("e",$check)!==false?"Employer":NULL;?></td>                      
                    </tr>
                     <tr>
                    <td></td>
                      <td><?php  echo array_search("s",$check)!==false?"Service Provider":NULL;?></td>
                    </tr>                   
                    <tr class="text_style">
                      <td>Name</td>
                      <td><?php echo $txtName;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Website</td>
                      <td><?php echo $txtWebsite; ?></td>
                    </tr>
                     <tr class="text_style">
                      <td>Tel:</td>
                      <td><?php echo $txtTel;?></td>
                    </tr>
                     <tr class="text_style">
                      <td>Email</td>
                      <td><?php echo $txtEmail;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Address:</td>
                      <td><?php echo $txtAddress;?></td>
                    </tr>
                    <tr class="text_style">
                        <td>Line</td>
                        <td>
                          <?php  echo $txtLine; ?>,
                        </td>
                    </tr>                  
                     
                     <tr class="text_style">
                      <td>WhatsApp</td>
                      <td><?php echo $txtWhatsapp;?></td>
                    </tr>                    
                     <tr class="text_style">
                      <td>About Me</td>
                      <td><?php echo $txtAboutMe;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Google Map</td>
                      <td><?php echo $txtGoogle;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Skill/Service</td>
                    </tr>
                    
                     
                      <?php                       
                      if(isset($skill)){foreach ($skill as $key => $value)
                      {
                      ?>                      
                      <tr><td></td><td><?php echo $value;?></td></tr>

                        
                      <?php
                        }}                      
                      ?>                          
                        
                    </tr>                     
                  </table>
               </div>
            </div><!-- end Job Information -->
           
            </div>
          </div>
        </div>
      </div><!-- end contant  -->
    </div>
  </body>
</html>
