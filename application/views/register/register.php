<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- MetisMenu CSS -->
    <!-- Custom Fonts -->
        <style type="text/css">
           .capt_cha{

                  background-image: url("<?php echo base_url('assets/photo_captchar.jpg')?>");

                 /* background-color:#ffe4b5;*/
                  width:213px; 
                  color:#a05959;
                  border-left-style: dotted;
                  text-shadow: 1px 1px red;
                  word-spacing: 100px;
                  pointer-events: none;
               }
        </style>

        <div class="container_fluid" style="margin:0px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>

            <div class="row">                                           
                    <?php if(isset($action)) echo form_open($action,array('id'=>'form','name'=>'form','method'=>'post'))?>
                    <div class="row">
                      <div class="col-lg-12"><!--==== start col-lg-8 =====--> 
                        <div class="panel panel-default">
                              <div class="panel-heading">
                              <h3 class="panel-title">Form member information</h3>
                              </div>
                            <div class="panel-body">
                              <div class="row"><!--====Error msg ===-->
                                <div class="col-lg-12">
                                  <span ng-show="msg_error"> 
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>

                                        <strong>Warning!</strong>{{msg}} 

                                    </div>
                                  </span>
                                </div><!--====End error msg ===-->
                                <div class="col-lg-12">
                                  <?php
                                    if(!empty($error) OR validation_errors())
                                    {
                                  ?>
                                    <div class="alert alert-danger" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
                                    </div>
                                  <?php }?>
                                  </div>
                                <div class="col-lg-4">
                                    Account Code
                                    <input readonly type="text" name="txtAccCode" id="txtAccCode" class="form-control input-sm" value="<?php $acc_code1=substr($acc_code,3);
                                  echo $acc_code1!=''?'KJ-'.str_pad($acc_code1+1,6,"0", STR_PAD_LEFT):'KJ-'.str_pad(1, 6, "0", STR_PAD_LEFT);
                                   ?>">
                                </div>
                                <div class="col-lg-4">
                                    Name
                                    <?php echo form_input("txtAccName","",array("class"=>"form-control input-sm","placeholder"=>"Name","phone-input","ng-model"=>"txtAccName","id"=>"txtAccName"));?>                                          
                                </div>
                                <div class="col-lg-4">
                                  Gender                                        
                                   <select class="form-control input-sm" ng-model="ddlGender" name="ddlGender" id="ddlGender">
                                      <option value="">Chose one</option>
                                      <option value="m">Male</option>
                                      <option value="f">Female</option>
                                      <option value="o">Other</option>
                                    </select>  
                                </div> 
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  Password

                                    <?php echo form_password("txtAccPass","",array("class"=>"form-control input-sm","ng-minlength"=>"6","ng-maxlength"=>"8","placeholder"=>"Password","ng-model"=>"txtAccPass","id"=>"txtAccPass","required"=>""));?>                                          
                                    <span style="color:Red" ng-show="form.txtAccPass.$error.minlength">Password atless 6 characters.</span>
                                    <span style="color:Red" ng-show="form.txtAccPass.$error.maxlength">Password upto 8 characters.</span>

                                </div>
                                <div class="col-lg-4">
                                      Confirm Password
                                        <?php echo form_password("txtConPasswd","",array("class"=>"form-control","placeholder"=>"Confirm password","ng-model"=>"txtConPasswd","valid-txtConPasswd","id"=>"txtConPasswd","required"=>"","onkeyup"=>"checkPass(); return false"));?>                                          
                                         <span id="confirmMessage" class="confirmMessage"></span>
                                    </div>

                                  <div class="col-lg-4">
                                <label class="control-label">Phone Number</label>
                                <?php echo form_input("txtPhone","",array("class"=>"form-control input-sm","placeholder"=>"Phone number","ng-model"=>"txtPhone","ng-pattern"=>"/^[0-9]{9,10}$/","id"=>"txtPhone","required"=>""));?>                                          
                                 <span style="color:Red" ng-show="form.txtPhone.$dirty&&form.txtPhone.$error.pattern">Only phone number</span>
                                </div>
                               

                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  Website
                                  <?php echo form_input("txtWebsite","",array("class"=>"form-control input-sm","placeholder"=>"Website","ng-model"=>"txtWtxtWebsiteeb","id"=>"txtWebsite","required"=>""));?>                                          
                                </div>
                                <div class="col-lg-4">
                                  Email
                                    <input type="text" name="txtEmail"  ng-model="txtEmail" class="form-control input-sm" placeholder="Email" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="txtEmail" required />
                                    <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span>
                                </div>
                                <div class="col-lg-4">
                                  Image
                                  <div class="form-group">
                                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">
                                    Upload Image
                                    </button>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-8">

                                    I am  \  We are <br>
                                    <label class="radio-inline"><input type="radio" checked="checked" value="individual" id="raIM" name="raIM">Individual</label>
                                    <label class="radio-inline"><input type="radio" value="company" id="raIM" name="raIM">Company</label>
                                    <label class="radio-inline"><input type="radio" value="recruitment_agency" id="raIM" name="raIM">Recruitment Agency</label>

                                    <label class="radio-inline"><input type="radio" value="government" id="raIM" name="raIM">Government</label>
                                </div>  
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  Description
                                  <?php echo form_textarea("txtDesc","",array("class"=>"form-control input-sm textarea","ng-model"=>"txtDesc","id"=>"txtDesc","required"=>""));?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  Address
                                  <?php echo form_textarea("txtAddr","",array("class"=>"form-control input-sm textarea","ng-model"=>"txtAddr","id"=>"txtAddr","required"=>""));?>                                
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                      <div class="text-center capt_cha">
                                            <h1 style="font-family:Parchment;font-size:44px"><b style="font-family:Parchment"><i><?php echo $rand= rand(1000000,20000000);?></i></b></h1>
                                            <input type="hidden" value="<?php echo $rand; ?>" name="txtCaptcha1" id="txtCaptcha1">
                                      </div>
                                       <?php echo form_input("txtCaptcha1","",array("class"=>"form-control","placeholder"=>"enter number","ng-model"=>"txtCaptcha2","valid-txtCaptcha2","id"=>"txtCaptcha2","required"=>"","onkeyup"=>"captcha(); return false"));?>                                          
                                    <!-- <input type="narrow text input" value="" placeholder="enter number" name="txtCaptcha2" id="txtCaptcha2" class="form-control" style="background-color:#ddd; "> -->
                                </div>
                                <div class="col-lg-1 pull-right" style="margin-top:75px;">                                    
                                    <a class="btn btn-default pull-right btn-sm" href="<?php echo base_url($this->session->cancel);?>">Cancel</a>
                                </div>
                                <div class="col-lg-1 pull-right" style="margin-top:75px;">
                                     <?php echo form_button("btn_register","Register",array("class"=>"btn btn-success btn-sm disabled","id"=>"btn_register","ng-click"=>"validation()"));?>                                   
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-lg-12">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Browse Image</h4>
                                            </div>
                                            <div class="modal-body">
                                            <input  type="file" name="txtUpload"/>
                                            <input type="hidden" id="txtImgName" name="txtImgName" />
                                            <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div><!--====end col-lg-8 ====--> 
                    </div>
                  <?php echo form_close()?>
            </div>
        </div>
        <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
       


        <script>            

            tinymce.init({ selector:'textare'});

            $("#btnCancel").click(function(){
                window.location.assign('<?php echo base_url().$cancel?>');
            });
          function uploadFile() {
            var formData = new FormData();
            formData.append('image', $('input[type=file]')[0].files[0]); 
            $.ajax({
              url: '<?php echo base_url()?>ng/upload.php',
              data: formData,
              type: 'POST',
              // THIS MUST BE DONE FOR FILE UPLOADING
              contentType: false,
              processData: false,
              // ... Other options like success and etc
              success: function(data) {
                document.getElementById("response").innerText = "Upload Complete!"; 
                document.getElementById("txtImgName").value = data;
              }     
            });
          }//file upload img 

          function captcha(){
            var capt1 = document.getElementById('txtCaptcha1');
            var capt2 = document.getElementById('txtCaptcha2');
            if(capt1.value==capt2.value){
                $("#btn_register").removeAttr("disabled");
                $('#btn_register').removeClass('disabled');
            }

            if(capt2.value==""){
                message.innerHTML = ""
              }
          }
          function checkPass()
          {
            var badColor = "#ff6666";
            var pass1 = document.getElementById('txtAccPass');
            var pass2 = document.getElementById('txtConPasswd');
            var message = document.getElementById('confirmMessage');
            if(pass1.value !=pass2.value){
              message.style.color = badColor;
              message.innerHTML = "Passwords not Match!"
            }else{message.innerHTML ="" }
            if(pass1.value==""){
              message.innerHTML = ""
            }
          }
          // ------- start angularJS
        var app = angular.module('myApp',[]);
        app.controller('myCtrl',function($scope,$http)
        {   
            $scope.validation = function()
            {   

              if(($scope.txtAccName==undefined || $scope.txtAccName=="")||
                  ($scope.txtAccPass==undefined || $scope.txtAccPass=="")||                                    
                  ($scope.txtConPasswd==undefined || $scope.txtConPasswd=="") ||                 
                  ($scope.txtPhone==undefined || $scope.txtPhone=="") ||
                  ($scope.ddlGender==undefined || $scope.ddlGender=="") ||                 
                  ($scope.txtEmail==undefined || $scope.txtEmail=="")
                ){$scope.msg_error=true; $scope.msg="Please enter form !";
                 }else
                 {
                  passwd_c = $scope.txtConPasswd;
                  passwd = $scope.txtAccPass;
                  if(passwd==passwd_c)
                  {
                    $http.get("<?php echo base_url();?>ng/register_check.php?email="+$scope.txtEmail).then(function (response)
                          {
                           var email=response.data.records;
                           if(email==false){document.getElementById("form").submit();
                           }else{$scope.msg_error=true; $scope.msg="your email has been used alredy";}
                          });

                  }
                }
            }                
        });  
        </script>