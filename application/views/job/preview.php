
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
      <div class="container">
        <div style=" width:210mm;margin:auto; padding:0px">
          <button type="button" class="btn btn-default btn-xs pull-right" onclick="printContent('div1')" style="margin:10px 23px -19px 0px">Print</button>
          <a class="btn btn-default btn-xs pull-right" onclick="back()" style="margin-top:10px;margin-right:5px;">Back</a>
        </div>
      </div>
      <div class="container" id="div1">
        <div class="" style=" width:210mm;     margin: 0 auto; padding:20px">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row" style="margin-top:5px">
              <table class="table">
                <tr>
                  <td><img width="100px" height="40px" src="<?php echo base_url('assets/khmer-job-logo.jpg');?>" style="margin-left:10px;border:1px solid; margin-top:-1px"><br>
                    <div class="panel panel-default" style="width:100px;padding-left:7px;margin-left:10px;margin-top:5px;">
                          <label for=""><?php echo $job_id?></label>
                    </div>
                  </td>

                  <td style="padding-right:40%"></td>
                  <td>
                   <!--  <div class="pull-right"> -->

                    <div>
                        <img width="100px" src="<?php if(isset($acc_info->acc_photo)){echo base_url('assets/uploads/').'/'.$acc_info->acc_photo;}?>" style="border:1px;" >
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
                    <div class=" text_style" style="height:25px;  line-height: 2;"><b>Job Information</b></div>
                  </div>
                  <table style="margin-left:15px">
                    <tr class="text_style">
                      <td>End Date:</td>
                      <td><?php echo $txtEndDate;?></td>
                    </tr>
                     <tr class="text_style">
                      <td>Contract:</td>
                      <td>
                        <?php
                          switch ($ddlContract) {
                              case "full_time":echo "Full Time";break;
                              case "part_time":echo "Part Time";break;
                              case "<3":echo "Less Than 3 months";break;
                              case "3,6":echo "From 3 to 6 months";break;
                              case "6,12":echo "From 6 to 12 months";break;
                              case ">1":echo "More Than 1 year";break;
                              case "intership":echo "Intership";break;
                              default:echo "Negotiable";}
                        ?>
                      </td>
                    </tr>
                    <tr class="text_style">
                      <td>Contacnt name:</td>
                      <td><?php echo $txtContactName;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Age:</td>
                      <td>
                        <?php
                          switch ($ddlAge) {
                            case "18,25":echo "18 - 25";break;
                            case "25,32":echo "25 - 32";break;
                            case "32,37":echo "32 - 37";break;
                            case "37,45":echo "37 - 45$";break;
                            case ">=45":echo "Over 45";break;
                            default:echo "unspecified";
                          }
                        ?>
                      </td>
                    </tr>
                    <tr class="text_style">
                      <td>Salary Range:</td>
                      <td>
                        <?php
                          switch ($ddlSalaryRange) {
                              case "<150":echo "Less than 150$";break;
                              case "150,300":echo "150$ - 300$";break;
                              case "300,500":echo "300$ - 500$";break;
                              case "500,750":echo "500$ - 750$";break;
                              case ">=1000":echo "Over 1000$";break;
                              default:echo "Negotaible";
                          }
                        ?>
                      </td>
                    </tr>
                    <tr class="text_style">
                      <td>Year Experience:</td>
                      <td>
                        <?php
                          switch ($ddlYearExp) {
                              case "0,1":echo "0 - 1 year";break;
                              case "1,3":echo "1 - 3 years";break;
                              case "3,5":echo "3 - 5 years";break;
                              case "5,7":echo "5 - 7 years";break;
                              case "7,10":echo "7 - 10 years";break;
                              case ">=10":echo "Over 10 years";break;
                              case "unlimited":echo "Unlimited";break;
                              default:echo "unspecified";
                          }
                        ?>
                      </td>
                    </tr>
                    <tr class="text_style">
                      <td>Education:</td>
                      <td><?php echo $ddlEducation;?></td>
                    </tr>
                    <tr class="text_style">
                      <td>Gender:</td>
                      <td><?php echo $ddlGender='m'?'Male':($ddlGender='f'?'Female':'unspecified');?></td>
                    </tr>
                    <tr class="text_style">
                        <td>Languages</td>
                        <td>
                          <?php echo $ddlLang1;?>
                          <?php echo $ddlLang2;?>
                          <?php echo $ddlLang3;?>
                          <?php echo $ddlLang4;?>
                        </td>
                    </tr>
                    <tr class="text_style">
                      <td>Hiring Quantities</td>
                      <td><?php echo $txtHiringQty;?></td>
                    </tr>
                     <tr class="text_style">
                      <td>Category</td>
                      <td><?php if(isset($cat_name->cat_name)){echo $cat_name->cat_name;}?></td>
                    </tr>
                     <tr class="text_style">
                      <td>Location</td>
                      <td><?php if(isset($loc_name->loc_name)){echo $loc_name->loc_name;}?></td>
                    </tr>
                  </table>
               </div>
            </div><!-- end Job Information -->
            <div class="row">
                <div class="col-md-12 text_style" style="margin-bottom:10px">
                  <div class="panel panel-default">
                    <div style="height:25px;  line-height: 2;"><b>Contact Information</b></div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <table style="margin-left:15px">
                        <tr class="text_style">
                          <td>Contact Name:</td>
                          <td><?php echo $txtContactName;?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Phone</td>
                          <td><?php echo $txtPhone; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Phone2</td>
                          <td><?php echo $txtPhone2; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Email:</td>
                          <td><?php echo $txtEmail; ?></td>
                        </tr>
                        <tr class="text_style">
                          <td>Address:</td>
                          <td><?php echo $txtAddr;?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>About Company</b></div>
                        </div>
                          <p class="text">
                            <?php echo $acc_info->acc_desc; ?>
                          </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>Job Description</b></div>
                        </div>
                          <p class="text">
                            <?php echo $txtJobDes;?>
                          </p>
                     </div>
                  </div>
                   <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>Job Requirement</b></div>
                        </div>
                          <p class="text">
                            <?php echo $txtJobRequirement;?>
                          </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class=" text_style" style="height:25px;  line-height: 2;"><b>Other Benefits</b></div>
                        </div>
                        <p class="text"><?php echo $txtOtherBenefit;?></p>
                     </div>
                  </div>
                </div>
              </div><!-- end ccaontact info -->
            </div>
          </div>
        </div>
      </div><!-- end contant  -->
    </div>

    <script type="text/javascript">
      function back()
      {
          window.history.back();
      }
    </script>
  </body>
</html>
