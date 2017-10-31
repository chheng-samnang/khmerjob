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
                      <div class="col-lg-5">
                         <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Setup Advertise</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Advertise Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType" ng-change="type()">
                                          <option value="">Chose one</option>
                                          <option value="Top">Advertise Top</option>
                                          <option value="Side">Advertise Side</option>
                                        </select>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="control-label">Duration</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDuration" class="form-control" placeholder="Enter Duration here..." ng-model="txtDuration">
                                        <span class="input-group-addon">days</span>
                                      </div>                                      
                                    </div>                                   
                                  </div>

                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Size</label>
                                        <input type="text" name="txtSize" class="form-control" placeholder="Enter Size here..." ng-model="txtSize">
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="control-label">Price/advertise</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" class="form-control" placeholder="Enter Price/advertise here..." ng-model="txtPrice">
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
                                            <option value="{{x.id}}" ng-repeat="x in bundle1">{{x.duration +' days'}}</option>                                    
                                          </select>                                         
                                      </div>                                      
                                    </div>                                    
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Free/search(hours)</label>
                                         <select class="form-control" name="ddlSearch" id="ddlSearch" ng-model="ddlSearch" ng-change="search(ddlSearch)" ng-disabled="ddlSearch_dis">
                                          <option value="">Chose one</option>
                                          <option value="{{x.id}}" ng-repeat="x in search1">{{x.duration +' hours'}}</option>                                          
                                        </select>
                                      </div>                                      
                                    </div>                                                                                                            
                                  </div>

                                  <div class="row">                                                                       
                                    <div class="col-lg-11">
                                      <label class="control-label">Side Ads 2up Discount</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDiscount" class="form-control" placeholder="Enter Side Ads 2up Discount here..." ng-model="txtDiscount">
                                        <span class="input-group-addon">%</span>
                                      </div>                                                                                                                
                                    </div>
                                    <div class="col-lg-1" style="margin-top:25px">
                                     <input type="button" name="btnAdd" value="Add" class="btn btn-primary pull-right" ng-click="add()">                                                                                                         
                                    </div>                                   
                                  </div>

                                  <div class="row">                                   
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="control-label">Advertise Description</label>
                                        <textarea rows="7" name="txtDesc" id="txtDesc" class="form-control"></textarea>                                                                            
                                      </div>                                      
                                    </div>                                   
                                  </div>
                                </div>
                            </div>
                           </div>
                         </div>                         
                      </div>
              <!--=== end form ads ==== -->

              <!--==== product selected promotion =====-->                    
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="panel panel-primary">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">List Advertise</h3>
                                      </div>
                                      <div class="panel-body">
                                        <table class="table table-hover">
                                          <tr>
                                            <th>No</th>
                                            <th>Ads Type</th>
                                            <th>Duration</th>
                                            <th>Size</th>
                                            <th>Price/Ads</th>
                                            <th>Side Ads 2up discount</th>
                                            <th>Free/purchase</th>                                                                                        
                                            <th>Action</th>
                                          </tr>
                                          <tr ng-repeat="x in list">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{x[0]}}</td>
                                            <td>{{x[1]+'days'}}</td>
                                            <td>{{x[2]}}</td>
                                            <td>{{x[3]|currency}}</td>
                                            <td>{{x[4]+'%'}}</td>
                                            <td>{{x[5]}}</td>                                                                                        
                                            <td><a href="#" ng-click="remove($index)">Remove</a></td>
                                          </tr>                                           
                                        </table>
                                        <input type="text" name="str" ng-model="str" id="str" value="" style="visibility: hidden;">                                       
                                        <input type="text" name="desc" ng-model="desc" id="desc" value="" style="visibility: hidden;">                                       
                                      </div>
                                  </div>  
                                </div>
                            </div>
                            <div class="row">                             
                              <div class="col-lg-12">
                                  <?php echo form_button("btnCancel","Cancel",array("class"=>"btn btn-defaul pull-right","style"=>"margin-left:10px","id"=>"btnCancel"))?>
                                  <?php echo form_button("btnSubmit","Submit",array("class"=>"btn btn-success pull-right","ng-click"=>"submit()","id"=>"btnSubmit"))?>
                              </div>
                            </div>                          
                        </div>
            <!--=== end list advertise ==== -->  
                      </div>                  
                    <?php echo form_close()?>
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
   //get bundle    
      $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=bundle_package")        
      .then(function (response) {$scope.bundle1=response.data.records;});
  //get paid search      
      $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=cv_paid_search")        
      .then(function (response) {$scope.search1=response.data.records;});
  //bundle
      $scope.bundle=function(x1)
        {
          if($scope.ddlBundle=="" || $scope.ddlBundle==undefined){$scope.ddlSearch_dis=false;}
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
              for(x in a)
                {if(a[x]['id']==x1)
                      {
                       purchase_id=a[x]['id'];
                       purchase_duration=a[x]['duration']+' hours'
                      }
               };
            });
          }
        }
    //    
  
  //validation form advertise      
      var arr = [];     
      var arr1 = []; 
      var i = 0;
      $scope.add=function()
      {
        var desc1=document.getElementById("txtDesc").value;                              
        if(
            ($scope.ddlType==undefined || $scope.ddlType=="")||
            ($scope.txtDuration==undefined || $scope.txtDuration=="")||
            ($scope.txtSize==undefined || $scope.txtSize=="")||
            ($scope.txtPrice==undefined || $scope.txtPrice=="")||
            ($scope.txtDiscount==undefined || $scope.txtDiscount=="")||
            (($scope.ddlBundle==undefined || $scope.ddlBundle=="")&&($scope.ddlSearch==undefined || $scope.ddlSearch==""))||
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
            arr[i] = [];
            arr[i][0] = $scope.ddlType;
            arr[i][1] = $scope.txtDuration;
            arr[i][2] = $scope.txtSize;
            arr[i][3] = $scope.txtPrice;
            arr[i][4] = $scope.txtDiscount;
            arr[i][5] = purchase_duration;
            arr[i][6] = purchase_id;            
            $scope.desc=desc1;                        
            $scope.list= arr;   
            i = i+1;
            $scope.form_error=false;
            $scope.str=JSON.stringify($scope.list);            
          }
        }
      }                         
    
 //remove product promotion from product discout list       
      $scope.remove=function(index)
      {
          if(index!==undefined)
          {
              $scope.list.splice(index,1);  
              arr1.splice(index,1);            
              i = i-1;
            $scope.str=JSON.stringify($scope.list);
          }
      }
//add discount
      
      $scope.submit=function()
      {
        if($scope.str==undefined || $scope.str=="[]"){$scope.form_error=true;$scope.msg=" Please Enter form form!";}        
        else{document.getElementById("form").submit();}
      }                       
  });//-------- end angularJS
</script>