<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
        <div class="container_fluid" style="margin:40px 400px 0px 400px;" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
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
                      <div class="col-lg-12">
                         <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit Advertise</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Advertise Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType" ng-change="type()">
                                          <option value="">Chose one</option>
                                          <option value="Top" ng-selected="<?php if($row->rate_det_type=='Top'){echo true;}?>">Advertise Top</option>
                                          <option value="Side" ng-selected="<?php if($row->rate_det_type=='Side'){echo true;}?>">Advertise Side</option>
                                        </select>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="control-label">Duration</label>
                                      <div class="input-group">                                                                    
                                        <input type="text" name="txtDuration" class="form-control" placeholder="Enter Duration here..." ng-model="txtDuration" ng-init="txtDuration='<?php echo $row->duration?>'"  />
                                        <span class="input-group-addon">days</span>
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Size</label>
                                        <input type="text" name="txtSize" class="form-control" placeholder="Enter Size here..." ng-model="txtSize" ng-init="txtSize='<?php echo $row->ads_size;?>'">
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="control-label">Price/advertise</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" class="form-control" placeholder="Enter Price/advertise here..." ng-model="txtPrice" ng-init="txtPrice='<?php echo $row->price;?>'">
                                        <span class="input-group-addon">$</span>
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                   <div class="row">                                                                         
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Free/bundle(day)</label>
                                          <select class="form-control" name="ddlBundle" id="ddlBundle" ng-model="ddlBundle" ng-change="bundle(ddlBundle)" ng-disabled="ddlBundle_dis">
                                            <option value="">Choose One</option>
                                            <?php foreach($bundle_package as $bundle_package1){?>
                                            <option value="<?php echo $bundle_package1->key_id;?>" ng-selected="<?php if($bundle_package1->key_id==$row->free_per_month){echo 'true';}?>"><?php echo $bundle_package1->key_code.' days';?></option>
                                            <?php }?>                                    
                                         </select>                                         
                                      </div>                                      
                                    </div>                                    
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Free/search(hours)</label>
                                         <select class="form-control" name="ddlSearch" id="ddlSearch" ng-model="ddlSearch" ng-change="search(ddlSearch)" ng-disabled="ddlSearch_dis">
                                          <option value="">Chose one</option>
                                           <?php foreach($cv_paid_search as $cv_paid_search1){?>
                                            <option value="<?php echo $cv_paid_search1->key_id;?>" ng-selected="<?php if($cv_paid_search1->key_id==$row->free_per_month){echo 'true';}?>"><?php echo $cv_paid_search1->key_code.' hours';?></option>
                                            <?php }?>
                                        </select>
                                      </div>                                      
                                    </div>                                                                                                            
                                  </div>

                                  <div class="row">                                                                       
                                    <div class="col-lg-9">
                                      <label class="control-label">Side Ads 2up Discount</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDiscount" class="form-control" placeholder="Enter Side Ads 2up Discount here..." ng-model="txtDiscount" ng-init="txtDiscount='<?php echo $row->ads_discount;?>'">
                                        <span class="input-group-addon">%</span>
                                      </div>                                                                                                                
                                    </div>
                                    <div class="col-lg-3" style="margin-top:25px">
                                     <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>
                                     <input type="button" name="Update" value="Update" class="btn btn-primary pull-right" ng-click="update()">                                                                                                                                                                                                                  
                                    </div>                                                                       
                                  </div>

                                  <div class="row">                                   
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="control-label">Advertise Description</label>
                                        <textarea rows="7" name="txtDesc" id="txtDesc" class="form-control"><?php echo $row->rate_desc;?></textarea>                                                                            
                                      </div>                                      
                                    </div>                                   
                                  </div>
                                  <input type="hidden" name="rate_id" value="<?php echo $row->rate_id;?>">
                                </div>
                            </div>
                           </div>
                         </div>                         
                      </div>             
            <!--=== end list advertise ==== -->  
                      </div>                  
                    <?php echo form_close();?>
                </div>
            </div>
        </div>    
<script>
    $("#btnCancel").click(function(){
        window.location.assign("<?php echo base_url('admin/ads_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {    
  //bundle  
      $scope.bundle=function(x1)
        {
          if($scope.ddlBundle=="" || $scope.ddlBundle==undefined){$scope.ddlSearch_dis=false}
          else
          {
            $scope.ddlSearch_dis=true;
            $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=bundle_package").then(function (response)
            {
              var a = response.data.records;
              for(x in a){if(a[x]['id']==x1){purchase_id=a[x]['id'];purchase_duration=a[x]['duration']+' days'}};
            });
          }
        }
  //search
      $scope.search=function(x1)
        {
          if($scope.ddlSearch=="" || $scope.ddlSearch==undefined){$scope.ddlBundle_dis=false}
          else
          {
            $scope.ddlBundle_dis=true;
            $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=cv_paid_search").then(function (response)
            {
              var a = response.data.records;
              for(x in a){if(a[x]['id']==x1){purchase_id=a[x]['id'];purchase_duration=a[x]['duration']+' hours'}};
            });
          }
        }
    //    
  
  //validation form advertise            
      $scope.update=function()
      {
        var desc1=document.getElementById("txtDesc").value;
        var type=document.getElementById("ddlType").value;
        var bundle=document.getElementById("ddlBundle").value;
        var search=document.getElementById("ddlSearch").value;                                      
        if(
            (type==undefined || type=="")||
            ($scope.txtDuration==undefined || $scope.txtDuration=="")||
            ($scope.txtSize==undefined || $scope.txtSize=="")||
            ($scope.txtPrice==undefined || $scope.txtPrice=="")||
            ($scope.txtDiscount==undefined || $scope.txtDiscount=="")||
            ((bundle==undefined || bundle=="")&&(search==undefined || search==""))||
            (desc1==undefined || desc1=="")
          )
          {
            $scope.form_error=true;$scope.msg="Please enter form !";
          }
        else
        {
          if(!(Number.isInteger(Number($scope.txtDuration)))||!($.isNumeric(Number($scope.txtPrice)))||!(Number.isInteger(Number($scope.txtDiscount))))
          {
           $scope.form_error=true;$scope.msg="The field Duration,Price,Discount Number only !"; 
          }
          else
          {
            document.getElementById("form").submit();                     
          }
        }
      }                         
                        
  });//-------- end angularJS
</script>