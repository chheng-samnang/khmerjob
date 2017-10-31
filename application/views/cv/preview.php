
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
      text-align: left;
    }
    .text_style2{
      padding-left: 20px !important;
    }
    .paddingLeft{
      padding-left:17px !important;
    }
    .table>tbody>tr>td{
      border-top: none;
      line-height: 0.3;
    }
  </style>
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>
  <body style="background-color:#ddd;">
    <div class="row">
      <div class="col-md-10">

      </div>
    </div>
    <div class="row">
      <div class="container">
        <div style=" width:210mm;margin:auto; padding:0px">
          <form action="<?php echo base_url("cv_c/post_cv_edit/".$cv_id); ?>" method="POST">
            <input type="hidden" value="<?php echo $modify; ?>" name="modify" id="modify" >
          <a class="btn btn-warning btn-sm pull-right" onclick="printContent('div1')" href="#" style="margin:10px 23px -19px 0px">Print</a>
          <button class="btn btn-success btn-sm pull-right" name="btnBack" style="margin-top:10px; margin-right:5px" id="btnBack">Back</button>
        </form>
        </div>
      </div>
      <div class="container" id="div1">
        <div class="" style=" width:210mm;margin: 0 auto; padding:20px">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-lg-12" style="margin-top:5px; padding: 0px; border: #dddddd solid 1px;">
              <table class="table">
               <tr class="text_style">
                  <td rowspan="9">
                    <a href="#">
                    <div>
                      <img width="110px;" src="<?php echo base_url('assets/uploads/'.$txtImgName);?>" style="border:1px;     padding-bottom: 10px;" >
                    </div><!--   </div> -->
                      <b ><?php /*if(isset($acc_info->acc_name)) echo $acc_info->acc_name;*/ ?>
                  </a>
                  </td>
                   <td>Name:</td>
                  <td><?php echo $txtName;?></td><br />
                  <td rowspan="9">
                     <div class="" style="float: right;">
                        <img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px; margin-top:-1px"><br>
                        <div class="panel panel-default" style="width:100%;height: 22px;padding: 8px;">
                              <div class="text-center">
                                <?php echo $cv_id?>
                              </div>

                        </div>
                     </div>
                  </td>
                </tr>
                <tr class="text_style">
                  <td>Current Address:</td>
                  <td><?php echo $txtAddr;?></td>
                </tr>
                <tr class="text_style">
                  <td>Tel 1:</td>
                    <td>
                      <?php  echo $txtPhone; ?>,
                    </td>
                </tr>
                <tr class="text_style">
                  <td>Tel 2:</td>
                    <td>
                      <?php  echo $txtTel2; ?>,
                    </td>
                </tr>
                <tr class="text-style">
                  <td class="text_style2">Email:</td>
                  <td class="paddingLeft"><?php echo $txtEmail;?></td>
                </tr>
                <tr class="text-style">
                  <td class="text_style2">Facebook:</td>
                  <td class="paddingLeft"><?php echo $txtFacebook; ?></td>
                </tr>
                <tr class="text-style">
                  <td class="text_style2">Twitter:</td>
                  <td class="paddingLeft"><?php echo $txtTwitter;?></td>
                </tr>
                 <tr class="text-style">
                  <td class="text_style2">G+:</td>
                  <td class="paddingLeft"><?php echo $txtG;?></td>
                </tr>
                <tr class="text-style">
                 
                  <td class="text_style2">LinkedIn:</td>
                  <td class="paddingLeft"><?php echo $txtLinkedIn;?></td>
                </tr>
                <tr class="text_style">
                    <td></td>
                    <td>Salary Range:</td>
                    <td>
                      <?php
                        switch ($ddlExpSalary) {
                            case "150,300":echo "150$ - 300$";break;
                            case "300,500":echo "300$ - 500$";break;
                            case "500,750":echo "500$ - 750$";break;
                            case "750,1000":echo "750$ - 1000$";break;
                            case ">=1000":echo "Over 1000$";break;
                            default:echo "Negotaible";
                        }
                      ?>
                    </td>
                </tr>
                <tr class="text_style">
                  <td></td>
                  <td>Category:</td>
                  <td><?php if(isset($cat_name->cat_name)){echo $cat_name->cat_name;} ?></td>
                </tr>
                <tr class="text_style">
                  <td></td>
                  <td>Position:</td>
                  <td><?php echo $txtPosition;?></td>
                </tr>
              </table>


            <div class="">
                <div class="col-md-12 text_style" style="margin-bottom:10px">
                  <div class="panel panel-default">
                    <div style="height:25px;  line-height: 2;"><b>PROFILE</b></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table style="margin-left:15px">
                         <tr class="text_style">
                          <td>Date of Birth:</td>
                          <td><?php echo $txtDOB; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Place of Birth:</td>
                          <td><?php echo $txtPOB; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Marital Status:</td>
                          <td><?php echo $ddlMaritalSta; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Nationality:</td>
                          <td><?php echo $txtNationality; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Gender:</td>
                          <td><?php echo $ddlGender='m'?'Male':($ddlGender='f'?'Female':'unspecified');?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>WORK EXPERIENCE</b></div>
                        </div>
                          <p class="text">
                            <?php echo $txtExperience; ?>
                          </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>EDUCATION</b></div>
                        </div>
                          <p class="text">
                            <?php echo $txtEducation;?>
                          </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>LANGUAGE</b></div>
                        </div>
                        <p class="text"><?php echo $txtLanguage;?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>COMPUTER</b></div>
                        </div>
                        <p class="text"><?php echo $txtComputer;?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>OTHER SKILLS</b></div>
                        </div>
                        <p class="text"><?php echo $txtOtherSkill;?></p>
                     </div>
                  </div>
                   <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>SHORT COURSE TRAINING</b></div>
                        </div>
                        <p class="text"><?php echo $txtShortCouseTr;?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>REFERENCE</b></div>
                        </div>
                        <p class="text"><?php echo $txtReference;?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>HOBBY</b></div>
                        </div>
                        <p class="text"><?php echo $txtHobby;?></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>ABOUT ME</b></div>
                        </div>
                        <p class="text"><?php echo $txtAboutMe;?></p>
                     </div>
                  </div>
                </div>
            </div><!-- end ccaontact info -->
            </div>
            </div>
          </div>
        </div>
      </div><!-- end contant  -->
    </div>

    <script type="text/javascript">
    function printContent(el){
      var restorepage = document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
      $("#btnBack").click(function(){
        var action = "<?php echo $this->uri->segment(4)?>";
        if(action!="post_cv")
        { 
          window.location.assign("<?php echo base_url()?>cv_c/post_cv_edit/<?php echo $cv_id?>");
        }else {
          window.history.back();
        }
      });

    </script>
  </body>
</html>
