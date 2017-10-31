<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
        <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
            <div class="row">                                           
                <div class="col-lg-12">
                    <?php if(isset($action)) echo form_open($action,"id='form' name='form'")?>
                    <h1 class="page-header">Form Add <?php echo $pageHeader?></h1>
              <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-6 ">                      
                          <span ng-show="form_error"> 
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong>{{msg}}                                                               
                            </div>
                          </span>                        
                        </div>              
                    </div>                    
              <!--==== end msg error =====-->                    
                    <div class="row">
              <!--==== form ads =====-->                    
                      <div class="col-lg-12">
                         <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Setup Job</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Job Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType" ng-change="type(ddlType)">
                                          <option value="">Chose one</option>
                                          <option value="Standard" ng-selected="<?php if($row->rate_det_type=='Standard'){echo true;}?>" ng-init="ddlType='Standard'">Standard</option>                                          
                                          <option value="Premium" ng-selected="<?php if($row->rate_det_type=='Premium'){echo true;}?>">Premium</option>
                                          <option value="Bundle" ng-selected="<?php if($row->rate_det_type=='Bundle'){echo true;}?>">Bundle</option>                                                                                                                                                                                                                                                                                                      
                                        </select>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Duration</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDuration" class="form-control" placeholder="Enter Duration here..." ng-model="txtDuration" ng-init="txtDuration='<?php echo $row->duration?>'" ng-disabled="dis">
                                        <span class="input-group-addon">days</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Price</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" class="form-control" placeholder="Enter Price here..." ng-model="txtPrice" ng-init="txtPrice='<?php echo $row->price;?>'" ng-disbled="dis">
                                        <span class="input-group-addon">$</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Price Bundle package</label>
                                      <select class="form-control" name="ddlPriceBP" id="ddlPriceBP" ng-model="ddlPriceBP" ng-change="priceBP(ddlPriceBP)" ng-disabled="bp_dis">
                                        <option value="">Choose One</option>
                                        <?php foreach($bundle_package as $bundle_package1){?>
                                        <option value="<?php echo $bundle_package1->key_id;?>" ng-selected="<?php if($bundle_package1->key_id==$row->bp_for_job){echo 'true';}?>"><?php echo $bundle_package1->key_code.' days '.$bundle_package1->key_data.' $';?></option>
                                        <?php }?>                                        
                                      </select>
                                    </div>                                   
                                  </div>                                 

                                  <div class="row">                                   
                                    <div class="col-lg-3">
                                      <label class="control-label">2 post job discount</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txt2PostDiscount" class="form-control" placeholder="Enter 2 post job discount here..." ng-model="txt2PostDiscount" ng-init="txt2PostDiscount='<?php echo $row->job_2post_discount;?>'">
                                        <span class="input-group-addon">%</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Alert Job to CV</label>
                                          <select class="form-control" name="ddlAlert_job_to_cv" id="ddlAlert_job_to_cv" ng-model="ddlAlert_job_to_cv" ng-change="alertJob_to_cv(ddlAlert_job_to_cv)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->job_alert_job_to_cv=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->job_alert_job_to_cv=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Receive cv applicant</label>
                                          <select class="form-control" name="ddlReceive_cv" id="ddlReceive_cv" ng-model="ddlReceive_cv" ng-change="receive_cv(ddlReceive_cv)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->job_receive_cv_app=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->job_receive_cv_app=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Alert job to register</label>
                                          <select class="form-control" name="ddlAlert_job_to_register" id="ddlAlert_job_to_register" ng-model="ddlAlert_job_to_register" ng-change="alert_job_to_register(ddlAlert_job_to_register)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->job_alert_job_to_register=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->job_alert_job_to_register=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>                                    
                                  </div>                                                                                                                                          

                                  <div class="row">                                                                                                                                                 
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Facebook boosting</label>
                                          <select class="form-control" name="ddlFb_boosting" id="ddlFb_boosting" ng-model="ddlFb_boosting" ng-change="fb_boostiing(ddlFb_boosting)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->job_fb_boosting=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->job_fb_boosting=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Homepage Display</label>
                                          <select class="form-control" name="ddlHomepage" id="ddlHomepage" ng-model="ddlHomepage" ng-change="homepage(ddlHomepage)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->homepage_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->homepage_display=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Toprow Display</label>
                                          <select class="form-control" name="ddlToprow" id="ddlToprow" ng-model="ddlToprow" ng-change="toprow(ddlToprow)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->toprow_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->toprow_display=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Company logo Display</label>
                                          <select class="form-control" name="ddlCompanyLogo" id="ddlCompanyLogo" ng-model="ddlCompanyLogo" ng-change="companyLogo(ddlCompanyLogo)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->job_com_logo_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->job_com_logo_display=='0'){echo true;}?>">Disable</option>                                                                                                                                
                                          </select>                                         
                                      </div>
                                    </div>                                                                                                            
                                  </div>                                  

                                  <div class="row">                                   
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Free/months</label>
                                        <select class="form-control" name="ddlFreeMonths" id="ddlFreeMonths" ng-model="ddlFreeMonths" ng-change="freeMonths(ddlFreeMonths)" ng-disabled="bp_dis">
                                        <option value="">Choose One</option>
                                        <?php foreach($cv_paid_search as $cv_paid_search1){?>
                                        <option value="<?php echo $cv_paid_search1->key_id;?>" ng-selected="<?php if($cv_paid_search1->key_id==$row->free_per_month_job){echo 'true';}?>"><?php echo $cv_paid_search1->key_code.' hours';?></option>
                                        <?php }?>                                        
                                      </select>                                        
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-9">
                                      <div class="form-group">
                                        <label class="control-label">Job Description</label>
                                        <textarea rows="7" name="txtDesc" id="txtDesc" class="form-control"><?php echo $row->rate_desc;?></textarea>                                                                            
                                      </div>                                      
                                    </div>                                   
                                  </div>                                                                    

                                  <div class="row">                                                                                                           
                                    <div class="col-lg-12">
                                    <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>                                                                                                                                                                                                                                                                                           
                                     <input type="button" name="btnUpdate" value="Update" class="btn btn-primary pull-right" ng-click="update()">                                                                                                         
                                    </div>                                   
                                  </div>
                                  <input type="hidden" name="rate_id" value="<?php echo $row->rate_id;?>">
                                </div>
                            </div>
                           </div>
                         </div>                         
                      </div>
              <!--=== end form ads ==== -->               
                      </div>                  
                    <?php echo form_close()?>
                </div>
            </div>
        </div>    
<script>
    $("#btnCancel").click(function(){
        window.location.assign("<?php echo base_url('admin/job_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {  

   $scope.type=function(x)
      {
        if(x=="Bundle"){$scope.dis=true;$scope.bp_dis=false;}
        else{$scope.bp_dis=true;$scope.dis=false;}
      }         
  //validation form advertise      
      var arr = [];     
      var arr1 = []; 
      var i = 0;
      $scope.update=function()
      {
        var desc1=document.getElementById("txtDesc").value;
        var type=document.getElementById("ddlType").value;
        var alert_job_to_cv=document.getElementById("ddlAlert_job_to_cv").value;
        var receive_cv=document.getElementById("ddlReceive_cv").value;
        var alert_job_to_register=document.getElementById("ddlAlert_job_to_register").value;
        var fb_boostiing=document.getElementById("ddlFb_boosting").value;        
        var homepage=document.getElementById("ddlHomepage").value;
        var toprow=document.getElementById("ddlToprow").value;
        var companyLogo=document.getElementById("ddlCompanyLogo").value;                                     
        if(
            (type==undefined || type=="")||
            //($scope.txtDuration==undefined || $scope.txtDuration=="")||
            //($scope.txtPrice==undefined || $scope.txtPrice=="")||                        
            ($scope.txt2PostDiscount==undefined || $scope.txt2PostDiscount=="")||
            (alert_job_to_cv==undefined || alert_job_to_cv=="")||
            (receive_cv==undefined || receive_cv=="")||
            (alert_job_to_register==undefined || alert_job_to_register=="")||
            (fb_boostiing==undefined || fb_boostiing=="")||
            (homepage==undefined || homepage=="")||
            (toprow==undefined || toprow=="")||
            (companyLogo==undefined || companyLogo=="")||                        
            (desc1==undefined || desc1=="")
          )
          {
            $scope.form_error=true;$scope.msg="Please enter form !";
          }
        else
        {
          if(
            //!(Number.isInteger(Number($scope.txtDuration)))||
            //!($.isNumeric(Number($scope.txtPrice)))||            
            !(Number.isInteger(Number($scope.txt2PostDiscount)))
            )
          {
           $scope.form_error=true;$scope.msg="The field Duration,Price,2post discount Number only !"; 
          }
          else
          {                      
           document.getElementById("form").submit();             
          }
        }
      }                                       
  });//-------- end angularJS
</script>