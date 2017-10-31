<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
        <div class="container_fluid" style="margin:40px 25px 0px 25px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
            <div class="row">                                           
                <div class="col-lg-12">
                    <?php if(isset($action)) echo form_open($action,"id='form' name='form'")?>
                    <h1 class="page-header">Form Edit <?php echo $pageHeader?></h1>
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
                      <div class="col-lg-7 col-lg-offset-2">
                         <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Search cv setup</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Search cv Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType">
                                          <option value="">Chose one</option>                                          
                                          <option value="Normal_search" ng-selected="<?php if($row->rate_det_type=='Normal_search'){echo true;}?>">Normal_search</option>                                          
                                          <option value="Paid_search" ng-selected="<?php if($row->rate_det_type=='Paid_search'){echo true;}?>">Paid_search</option>                                                                                  
                                        </select>
                                      </div>                                      
                                    </div>

                                   <div class="col-lg-6">
                                      <label class="control-label">Duration</label>
                                        <select class="form-control" name="ddlDuration" id="ddlDuration" ng-model="ddlDuration" ng-change="cps(ddlDuration)";>
                                          <option value="">Chose one</option>
                                        <?php if($cps){foreach($cps as $cps1 ){;?>
                                          <option value="<?php echo $cps1->key_id;?>" ng-selected="<?php if($row->key_id==$cps1->key_id){echo true;}?>"><?php echo $cps1->value;?></option>                                          
                                        <?php }}?>
                                          <option value="0" ng-selected="<?php if($row->key_id==0){echo true;}?>">Unlimited (Free)</option>                                                                                                                               
                                        </select>                             
                                    </div>                                   
                                  </div>

                                  <div class="row">                                                                       
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">See applicant(photo,name,job position)</label>
                                          <select class="form-control" name="ddlSee_app" id="ddlSee_app" ng-model="ddlSee_app" ng-change="seeApp(ddlSee_app)">
                                            <option value="">Chose one</option>                                           
                                            <option value="1" ng-selected="<?php if($row->scv_see_app_position=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->scv_see_app_position=='0'){echo true;}?>">Disable</option>                                                                                                                                                                            
                                          </select>                                         
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Full view applicant detail</label>
                                          <select class="form-control" name="ddlFull_app_det" id="ddlFull_app_det" ng-model="ddlFull_app_det" ng-change="full_app_det(ddlFull_app_det)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->scv_full_app_det=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->scv_full_app_det=='0'){echo true;}?>">Disable</option>                                                                                                                                                                           
                                          </select>                                         
                                      </div>
                                    </div>                                   
                                  </div>

                                   <div class="row">                                                                                                                                                                                     
                                    <div class="col-lg-6">
                                      <label class="control-label">Print applicant's cv out</label>
                                      <select class="form-control" name="ddlPrint_app_cv" id="ddlPrint_app_cv" ng-model="ddlPrint_app_cv" ng-change="print_app_cv(ddlPrint_app_cv)">
                                        <option value="">Chose one</option>
                                        <option value="1" ng-selected="<?php if($row->scv_print_app_cv=='1'){echo true;}?>">Enable</option>
                                        <option value="0" ng-selected="<?php if($row->scv_print_app_cv=='0'){echo true;}?>">Disable</option>                                                                                                                                                                                                                      
                                      </select>                                                                               
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Sent email to applicant</label>
                                          <select class="form-control" name="ddlSent_email_to_app" id="ddlSent_email_to_app" ng-model="ddlSent_email_to_app" ng-change="sentEmail_to_app(ddlSent_email_to_app)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->scv_send_email_app=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->scv_send_email_app=='0'){echo true;}?>">Disable</option>                                                                                                                                                                                                                      
                                          </select>                                         
                                      </div>
                                    </div>                                                                                                             
                                  </div>                                                                    

                                  <div class="row">                                   
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="control-label">Search cv Description</label>
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
        window.location.assign("<?php echo base_url('admin/search_cv_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {                     
  //validation form search cv           
   $scope.update=function()
    {
      var desc1=document.getElementById("txtDesc").value;
      var type=document.getElementById("ddlType").value;
      var duration=document.getElementById("ddlDuration").value;
      var see_app=document.getElementById("ddlSee_app").value;
      var full_app=document.getElementById("ddlFull_app_det").value;
      var print_app=document.getElementById("ddlPrint_app_cv").value;
      var sent_email_app=document.getElementById("ddlSent_email_to_app").value;       
      if(
          (type==undefined || type=="")||
          (duration==undefined || duration=="")||                    
          (see_app==undefined || see_app=="")||
          (full_app==undefined || full_app=="")||
          (print_app==undefined || print_app=="")||
          (sent_email_app==undefined || sent_email_app=="")||
          (desc1==undefined || desc1=="")
        )
        {
          $scope.form_error=true;$scope.msg="Please enter form !";
        }
      else
      {document.getElementById("form").submit();}                                                        
    }                            
  });//-------- end angularJS
</script>