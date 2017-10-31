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
                                    <h3 class="panel-title">Form Setup Skill</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Skill Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType" ng-change="type(ddlType)">
                                          <option value="">Chose one</option>
                                          <option value="Standard" ng-selected="<?php if($row->rate_det_type=='Standard'){echo true;}?>">Standard</option>                                          
                                          <option value="Premium" ng-selected="<?php if($row->rate_det_type=='Premium'){echo true;}?>">Premium</option>                                                                                  
                                        </select>
                                      </div>                                      
                                    </div>

                                    <div class="col-lg-6">
                                      <label class="control-label">Duration</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDuration" id="txtDuration" class="form-control" placeholder="Enter Duration here..." ng-model="txtDuration" ng-disabled="dis">
                                        <span class="input-group-addon">days</span>
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <label class="control-label">Price</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Enter Price here..." ng-model="txtPrice" ng-disabled="dis">
                                        <span class="input-group-addon">$</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Homepage display</label>
                                          <select class="form-control" name="ddlHomepage" id="ddlHomepage" ng-model="ddlHomepage" ng-change="homepage(ddlHomepage)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->homepage_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->homepage_display=='0'){echo true;}?>">Disable</option>                                                                                                                                                                            
                                          </select>                                         
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                   <div class="row">                                                                                                                                                 
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Toprow display</label>
                                          <select class="form-control" name="ddlToprow" id="ddlToprow" ng-model="ddlToprow" ng-change="toprow(ddlToprow)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->toprow_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->toprow_display=='0'){echo true;}?>">Disable</option>                                                                                                                                                                           
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Photo/logo space diplay</label>
                                          <select class="form-control" name="ddlPhotoLogo" id="ddlPhotoLogo" ng-model="ddlPhotoLogo" ng-change="photoLogo(ddlPhotoLogo)">
                                            <option value="">Chose one</option>
                                            <option value="1" ng-selected="<?php if($row->photo_space_display=='1'){echo true;}?>">Enable</option>
                                            <option value="0" ng-selected="<?php if($row->photo_space_display=='0'){echo true;}?>">Disable</option>                                                                                                                                                                                                                      
                                          </select>                                         
                                      </div>
                                    </div>                                                                                                            
                                  </div>                                  

                                  <div class="row">                                   
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="control-label">Skill Description</label>
                                        <textarea rows="7" name="txtDesc" id="txtDesc" class="form-control"><?php echo $row->rate_desc;?></textarea>                                                                            
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                   <div class="row">                                                                                                           
                                    <div class="col-lg-12">                                     
                                     <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>
                                     <input type="button" name="Update" value="Update" class="btn btn-primary pull-right" ng-click="update()">                                                                                                                                                                                                                                                      
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
        window.location.assign("<?php echo base_url('admin/skill_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {            
  $scope.txtDuration="<?php echo $row->duration=='0'?'Unlimited':$row->duration;?>";
  $scope.txtPrice="<?php echo $row->price=='0'?'Free':$row->price;?>";
  $scope.txtDuration=="Unlimited"?$scope.dis=true:$scope.dis=false;         
  $scope.type=function(str)
  {
    if(str=="Standard")
    {$scope.txtDuration="Unlimited";$scope.dis=true;$scope.txtPrice="Free";}
    else{$scope.txtDuration="";$scope.txtPrice="";$scope.dis=false;}    
  }   
    //validation form advertise           
     $scope.update=function()
      {
        var desc1=document.getElementById("txtDesc").value;
        var type=document.getElementById("ddlType").value;
        var homepage=document.getElementById("ddlHomepage").value;
        var toprow=document.getElementById("ddlToprow").value;
        var photo=document.getElementById("ddlPhotoLogo").value;       
        if(
            (type==undefined || type=="")||
            ($scope.txtDuration==undefined || $scope.txtDuration=="")||            
            ($scope.txtPrice==undefined || $scope.txtPrice=="")||
            (homepage==undefined || homepage=="")||
            (toprow==undefined || toprow=="")||
            (photo==undefined || photo=="")||
            (desc1==undefined || desc1=="")
          )
          {
            $scope.form_error=true;$scope.msg="Please enter form !";
          }
        else
        {
          var duration1=$scope.txtDuration=='Unlimited'?0:$scope.txtDuration;
          var price1=$scope.txtPrice=='Free'?0:$scope.txtPrice;         
          if(!(Number.isInteger(Number(duration1)))||!($.isNumeric(Number(price1))))
          {
           $scope.form_error=true;$scope.msg="The field Duration,Price Number only !"; 
          }
          else
          {                      
            document.getElementById("form").submit();            
          }
        }
      }                            
  });//-------- end angularJS
</script>