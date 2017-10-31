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
                                          <option value="Standard">Standard</option>
                                          <option value="Premium">Premium</option>
                                          <option value="Bundle">Bundle</option>
                                        </select>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Duration</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtDuration" id="txtDuration" ng-model="txtDuration" ng-disabled="dis_du" class="form-control" placeholder="Enter Duration here...">
                                        <span class="input-group-addon">days</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Price</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" class="form-control" placeholder="Enter Price here..." ng-model="txtPrice" ng-disabled="dis_du">
                                        <span class="input-group-addon">$</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <label class="control-label">Price Bundle package</label>
                                      <select class="form-control" name="ddlPriceBP" id="ddlPriceBP" ng-model="ddlPriceBP" ng-change="priceBP(ddlPriceBP)" ng-disabled="dis_bp">
                                        <option value="">Choose One</option>
                                        <option value="{{x.id}}" ng-repeat="x in bundle1">{{x.duration +' days '}}{{x.price +' $'}}</option>                                    
                                      </select>
                                    </div>                                   
                                  </div>                                 

                                  <div class="row">                                   
                                    <div class="col-lg-3">
                                      <label class="control-label">2 post job discount</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txt2PostDiscount" class="form-control" placeholder="Enter 2 post job discount here..." ng-model="txt2PostDiscount">
                                        <span class="input-group-addon">%</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Alert Job to CV</label>
                                          <select class="form-control" name="ddlAlert_job_to_cv" id="ddlAlert_job_to_cv" ng-model="ddlAlert_job_to_cv" ng-change="alertJob_to_cv(ddlAlert_job_to_cv)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
                                          </select>                                         
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Receive cv applicant</label>
                                          <select class="form-control" name="ddlReceive_cv" id="ddlReceive_cv" ng-model="ddlReceive_cv" ng-change="receive_cv(ddlReceive_cv)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Alert job to register</label>
                                          <select class="form-control" name="ddlAlert_job_to_register" id="ddlAlert_job_to_register" ng-model="ddlAlert_job_to_register" ng-change="alert_job_to_register(ddlAlert_job_to_register)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                           
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
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Homepage Display</label>
                                          <select class="form-control" name="ddlHomepage" id="ddlHomepage" ng-model="ddlHomepage" ng-change="homepage(ddlHomepage)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                           
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Toprow Display</label>
                                          <select class="form-control" name="ddlToprow" id="ddlToprow" ng-model="ddlToprow" ng-change="toprow(ddlToprow)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Company logo Display</label>
                                          <select class="form-control" name="ddlCompanyLogo" id="ddlCompanyLogo" ng-model="ddlCompanyLogo" ng-change="companyLogo(ddlCompanyLogo)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                           
                                          </select>                                         
                                      </div>
                                    </div>                                                                                                            
                                  </div>                                  

                                  <div class="row">                                   
                                    <div class="col-lg-3">
                                      <div class="form-group">
                                        <label class="control-label">Free/months</label>
                                        <select class="form-control" name="ddlFreeMonths" id="ddlFreeMonths" ng-model="ddlFreeMonths" ng-change="freeMonths(ddlFreeMonths)" ng-disabled="dis_bp">
                                        <option value="">Choose One</option>
                                        <option value="{{x.id}}" ng-repeat="x in search1">{{x.duration +' hours'}}</option>                                    
                                      </select>                                        
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-9">
                                      <div class="form-group">
                                        <label class="control-label">Job Description</label>
                                        <textarea rows="7" name="txtDesc" id="txtDesc" class="form-control"></textarea>                                                                            
                                      </div>                                      
                                    </div>                                   
                                  </div>                                                                    

                                  <div class="row">                                                                                                           
                                    <div class="col-lg-12">
                                     <input type="button" name="btnAdd" value="Add" class="btn btn-primary pull-right" ng-click="add()">                                                                                                         
                                    </div>                                   
                                  </div>
                                </div>
                            </div>
                           </div>
                         </div>                         
                      </div>
              <!--=== end form ads ==== -->

              <!--==== product selected promotion =====-->                    
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="panel panel-primary">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">List Job setup</h3>
                                      </div>
                                      <div class="panel-body">
                                        <table class="table table-hover">
                                          <tr>
                                            <th>No</th>
                                            <th>Job type</th>
                                            <th>Duration</th>                                            
                                            <th>Price</th>                                            
                                            <th>2post job_discount</th>
                                            <th>Alert job to cv</th>
                                            <th>Receive cv</th>
                                            <th>Alert job to register</th>
                                            <th>Fb boosting</th>
                                            <th>Homepage display</th>
                                            <th>Toprow display</th>
                                            <th>Company logo display</th>
                                            <th>Free/months</th>                                                                                        
                                            <th>Action</th>
                                          </tr>
                                          <tr ng-repeat="x in list">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{x[0]}}</td>
                                            <td>{{x[21]+' days'}}</td>
                                            <td>{{x[22]|currency}}</td>                                                                                       
                                            <td>{{x[4]+' %'}}</td>                                            
                                            <td><span class="{{x[14]}}"></span></td>
                                            <td><span class="{{x[15]}}"></span></td>
                                            <td><span class="{{x[16]}}"></span></td>
                                            <td><span class="{{x[17]}}"></span></td>
                                            <td><span class="{{x[18]}}"></span></td>
                                            <td><span class="{{x[19]}}"></span></td>
                                            <td><span class="{{x[20]}}"></span></td>
                                            <td>{{x[23]+' hours'}}</td>                                                                                                                                    
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
        window.location.assign("<?php echo base_url('admin/job_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {  cps_duration="";    
     //get bundle    
      $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=bundle_package")        
      .then(function (response) {$scope.bundle1=response.data.records;});
  //get paid search      
      $http.get("<?php echo base_url();?>ng/advertise_purchase.php?purchase_type=cv_paid_search")        
      .then(function (response) {$scope.search1=response.data.records;});
  //PriceBP
      $scope.priceBP=function(x1)
        {
          $http.get("<?php echo base_url();?>ng/bp_for_job.php?id="+x1).then(function (response)
            {
              var a = response.data.records;              
              for(x in a){if(a[x]['id']==x1){bp_duration=a[x]['duration'];bp_price=a[x]['price'];}};
            });
        }                   
  //Free/months
     $scope.freeMonths=function(x1)
        {
          $http.get("<?php echo base_url();?>ng/cps_for_job.php?id="+x1).then(function (response)
            {
              var a = response.data.records;              
              for(x in a){if(a[x]['id']==x1){cps_duration=a[x]['duration'];}};
            });
        }      
      $scope.type=function(x)
      {
        if(x=="Bundle"){$scope.dis_du=true;$scope.dis_bp=false;}
        else{$scope.dis_bp=true;$scope.dis_du=false;}
      }
  //validation form advertise      
      var arr = [];     
      var arr1 = []; 
      var i = 0;
      $scope.add=function()
      {        
        var desc1=document.getElementById("txtDesc").value;                              
        if(
            ($scope.ddlType==undefined || $scope.ddlType=="")||
            //($scope.txtDuration==undefined || $scope.txtDuration=="")||
            //($scope.txtPrice==undefined || $scope.txtPrice=="")||            
            //($scope.ddlPriceBP==undefined || $scope.ddlPriceBP=="")||
            ($scope.txt2PostDiscount==undefined || $scope.txt2PostDiscount=="")||
            ($scope.ddlAlert_job_to_cv==undefined || $scope.ddlAlert_job_to_cv=="")||
            ($scope.ddlReceive_cv==undefined || $scope.ddlReceive_cv=="")||
            ($scope.ddlAlert_job_to_register==undefined || $scope.ddlAlert_job_to_register=="")||
            ($scope.ddlFb_boosting==undefined || $scope.ddlFb_boosting=="")||
            ($scope.ddlHomepage==undefined || $scope.ddlHomepage=="")||
            ($scope.ddlToprow==undefined || $scope.ddlToprow=="")||
            ($scope.ddlCompanyLogo==undefined || $scope.ddlCompanyLogo=="")||
            //($scope.ddlFreeMonths==undefined || $scope.ddlFreeMonths=="")||            
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
            arr[i] = [];
            arr[i][0] = $scope.ddlType;
            arr[i][1] = $scope.txtDuration;
            arr[i][2] = $scope.txtPrice;
            arr[i][3] = $scope.ddlPriceBP;
            arr[i][4] = $scope.txt2PostDiscount;
            arr[i][5] = $scope.ddlAlert_job_to_cv;
            arr[i][6] = $scope.ddlReceive_cv;
            arr[i][7] = $scope.ddlAlert_job_to_register;
            arr[i][8] = $scope.ddlFb_boosting;
            arr[i][9] = $scope.ddlHomepage;
            arr[i][10] = $scope.ddlToprow;
            arr[i][11] = $scope.ddlCompanyLogo;
            arr[i][12] = $scope.ddlFreeMonths;
            //format            

            //if($scope.ddlPriceBP==""||$scope.ddlPriceBP==undefined){arr[i][13]=0;}else{arr[i][13]=priceBP;};             
            arr[i][14] = $scope.ddlAlert_job_to_cv=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][15] = $scope.ddlReceive_cv=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][16] = $scope.ddlAlert_job_to_register=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][17] = $scope.ddlFb_boosting=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][18] = $scope.ddlHomepage=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][19] = $scope.ddlToprow=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][20] = $scope.ddlCompanyLogo=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';

            arr[i][21] = ($scope.txtDuration==''||$scope.txtDuration==undefined)?bp_duration:$scope.txtDuration;
            arr[i][22] = ($scope.txtPrice==''||$scope.txtPrice==undefined)?bp_price:$scope.txtPrice;
            arr[i][23] = cps_duration;            
            //if($scope.ddlFreeMonths==""||$scope.ddlFreeMonths==undefined){arr[i][21]=0;}else{arr[i][21]=freeMonths;};             
            
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