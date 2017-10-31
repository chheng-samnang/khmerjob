
  <div class="col-md-2"></div>

  <?php include("cv_countdown.php");?>

            <style>
              .td{padding:8px;}
              .margin{margin-left:19px;}
              ul {
              	margin:24px;
              }
              ol
              {
              	margin-left:-43px !important;
              }

            </style>
            <script>
              function printContent(el){
                console.log(el);
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
              }
            </script>
          <div class="row">
            <div class="col-md-6">
              <a class="btn ntb-xs btn-warning" onclick="printContent('div1')" href="" style="margin:0px 68px 19px 0px">Print</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10" id="div1">
              <div class="panel panel-default">
                <div class="panel-body">
                    <div style="width:13%;float:right;">
                      <img src="<?php echo base_url("assets/khmer-job-logo.jpg")?>" style="margin-bottom:8px;width:120px;"/>
                      <div class="panel panel-default" style="width:100%; height:25%">
                        <div class="text-center"><?php if(isset($cv_det->cv_code)){echo $cv_det->cv_code;}?></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div>
                          <table>
                            <tr>
                              <td style="padding-right:20px">
                                <div class="panel panel-default" style="height:130px;width:100px">
                                    <img width="97px"; height="120px" src="<?php if(isset($cv_det->photo)){echo base_url('assets/uploads/').'/'.$cv_det->photo;}?>" style="border:1px;" >
                                </div>
                              </td>
                              <td>
                                <table>
                                  <tr>
                                    <td  style="padding-right:121px">Name:</td>
                                    <td><?php if(isset($cv_det->name)){echo $cv_det->name;}?></td>
                                  </tr>
                                   <tr>
                                    <td>Current Address:</td>
                                    <td><?php if(isset($cv_det->addr)){echo $cv_det->addr;}?></td>
                                  </tr>
                                  <tr>
                                    <td>Tel 1:</td>
                                    <td><?php if(isset($cv_det->phone)){echo $cv_det->phone;}?></td>
                                  </tr>
                                  <tr>
                                    <td>Tel 2:</td>
                                    <td><?php if(isset($cv_det->tel2)){echo $cv_det->tel2;}?></td>
                                  </tr>
                                  <tr>
                                    <td>Email:</td>
                                    <td><?php if(isset($cv_det->email)){echo $cv_det->email;}?></td>
                                  </tr>
                                  <tr>
                                    <td>Facebook:</td>
                                    <td><?php if(isset($cv_det->fb)){echo $cv_det->fb;}?></td>
                                  </tr>
                                  <tr>
                                    <td>Twitter:</td>
                                    <td><?php if(isset($cv_det->twitter)){echo $cv_det->twitter;}?></td>
                                  </tr>
                                  <tr>
                                    <td>G+:</td>
                                    <td><?php if(isset($cv_det->G1)){echo $cv_det->G1;}?></td>
                                  </tr>
                                  <tr>
                                    <td>LinkedIn:</td>
                                    <td><?php if(isset($cv_det->linkedIn)){echo $cv_det->linkedIn;}?></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>PROFILE</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12 margin">
                            <table>
                              <tr>
                                <td style="width:142px;">Date of Birth:</td>
                                <td><?php if(isset($cv_det->dob)){echo $dob;} ?></td>
                              </tr>
                              <tr>
                                <td>Place of Birth:</td>
                                <td><?php if(isset($cv_det->pob)){echo $cv_det->pob;}?></td>
                              </tr>
                              <tr>
                                <td>Marital Status:</td>
                                <td><?php if(isset($cv_det->marital_status)){echo $cv_det->marital_status;} ?></td>
                              </tr>
                              <tr>
                                <td>Nationality:</td>
                                <td><?php if(isset($cv_det->nationality)){echo$cv_det->nationality;} ?></td>
                              </tr>
                              <tr>
                                <td>Sex:</td>
                                <td><?php echo $cv_det->gender='male'?'Male':($ddlGender='female'?'Female':'unspecified');?></td>
                              </tr>

                            </table>
                          </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                          <div class="col-md-12"><div style="padding-left:10px" class="panel panel-default"><b>WORK EXPRERIENCE</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin" style="padding:0 20px;">
                              <?php if(isset($cv_det->work_exp)){echo "<ul><lo>".$cv_det->work_exp."<lo><ul>";}?>
                            </ul>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>EDUCATION</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->edu)){echo $cv_det->edu;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>LANGUAGE</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin">
                          <?php if(isset($cv_det->lang)){echo $cv_det->lang;}?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>COMPUTER</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->computer)){echo $cv_det->computer;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>OTHER SKILLS</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->other_skill)){echo $cv_det->other_skill;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>SHORT COURSE TRAINING</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->short_course)){echo $cv_det->short_course;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>REFERENCE</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->ref)){echo $cv_det->ref;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>HOBBY</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->hobby)){echo $cv_det->hobby;} ?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>ABOUT ME</b></div></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 margin"><?php if(isset($cv_det->about_me)){echo $cv_det->about_me;}?></div>
                        </div>
                        <div class="row">
                          <div class="col-md-12"><div  style="padding-left:10px" class="panel panel-default"><b>ADDITIONAL INFORMATION</b></div></div>
                          <div class="row">
                            <div class="col-md-12" style="margin-left:20px;">
                              <table>
                                <tr>
                                  <td style="width:180px;">Expected Salary:</td>
                                  <td>
                                    <?php
                            if(isset($cv_det->salary)){
                            switch ($cv_det->salary){
                                case "<150":echo "Less than 150$";break;
                                case "150,300":echo "150$ - 300$";break;
                                case "300,500":echo "300$ - 500$";break;
                                case "500,750":echo "500$ - 750$";break;
                                case "750,1000":echo "750$ - 1000$";break;
                                case ">=1000":echo "Over 1000$";break;
                                default:echo "Negotaible";
                              }
                            }?>

                                  </td>
                                </tr>
                                <tr>
                                  <td>Position Matched:</td>
                                  <td>
                                    <?php if(isset($cv_det->position)){echo $cv_det->position;} ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Job Category:</td>
                                  <td>
                                    <?php if(isset($cv_det->cat_name)){echo $cv_det->cat_name;} ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Years of Experience:</td>
                                  <td>
                                    <?php
                                        if(isset($cv_det->year_exp)){
                                            switch ($cv_det->year_exp){
                                                  case "0,1":echo "0 - 1 year";break;
                                                  case "1,3":echo "1 - 3 years";break;
                                                  case "3,5":echo "3 - 5 years";break;
                                                  case "5,7":echo "5 - 7 years";break;
                                                  case "7,10":echo "7 - 10 years";break;
                                                  case ">=10":echo "More than 10 years";break;
                                                  default:echo "Unlimited";
                                              }
                                            }  ?>
                                  </td>
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
            <!--== Advertising Right ==-->
            <div class="col-md-2"><a href="#" id="similar" class="thumbnail" style="background-color:orange;color:white;"><h4 style="margin-left:4px;">Other Similar CVs</h4></a></div>
            <!--== End Advertising Right ==-->

            <script type="text/javascript">
              $("#similar").click(function(){
                window.location.assign('<?php if($cv_det){echo base_url("home/cv_thumbnail/".$cv_det->position);}?>');
              });
            </script>
