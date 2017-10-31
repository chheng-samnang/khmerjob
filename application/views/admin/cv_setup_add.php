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
                                    <h3 class="panel-title">Form Setup CV</h3>
                                </div>
                                <div class="panel-body"><!--  style="overflow:scroll; height:360px" -->
                                  <div class="row">                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">CV Type</label>
                                        <select class="form-control" name="ddlType" id="ddlType" ng-model="ddlType">
                                          <option value="">Chose one</option>
                                          <option value="Standard">Standard</option>
                                          <option value="Premium">Premium</option>                                          
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
                                      <label class="control-label">Price</label>
                                      <div class="input-group">                                        
                                        <input type="text" name="txtPrice" class="form-control" placeholder="Enter Price here..." ng-model="txtPrice">
                                        <span class="input-group-addon">$</span>
                                      </div>                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Homepage display</label>
                                          <select class="form-control" name="ddlHomepage" id="ddlHomepage" ng-model="ddlHomepage" ng-change="homepage(ddlHomepage)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
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
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                            
                                          </select>                                         
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label class="control-label">Private photo space box</label>
                                          <select class="form-control" name="ddlPrivatePhoto" id="ddlPrivatePhoto" ng-model="ddlPrivatePhoto" ng-change="private(ddlPrivatePhoto)">
                                            <option value="">Chose one</option>
                                            <option value="1">Enable</option>
                                            <option value="0">Disable</option>                                           
                                          </select>                                         
                                      </div>
                                    </div>                                                                                                            
                                  </div>                                  

                                  <div class="row">                                   
                                    <div class="col-lg-12">
                                      <div class="form-group">
                                        <label class="control-label">CV Description</label>
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
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-12">
                                  <div class="panel panel-primary">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">List CV setup</h3>
                                      </div>
                                      <div class="panel-body">
                                        <table class="table table-hover">
                                          <tr>
                                            <th>No</th>
                                            <th>CV type</th>
                                            <th>Duration</th>                                            
                                            <th>Price</th>
                                            <th>Homepage display</th>
                                            <th>Toprow display</th>
                                            <th>Private photo space box</th>                                                                                        
                                            <th>Action</th>
                                          </tr>
                                          <tr ng-repeat="x in list">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{x[0]}}</td>
                                            <td>{{x[1]}}{{x[6]}}</td>
                                            <td>{{x[2]|currency}}</td>
                                            <td><span class="{{x[7]}}"></span></td>
                                            <td><span class="{{x[8]}}"></span></td>
                                            <td><span class="{{x[9]}}"></span></td>                                                                                                                                    
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
        window.location.assign("<?php echo base_url('admin/cv_setup_c')?>");
    });
</script>

<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {  
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
            ($scope.txtPrice==undefined || $scope.txtPrice=="")||
            ($scope.ddlHomepage==undefined || $scope.ddlHomepage=="")||
            ($scope.ddlToprow==undefined || $scope.ddlToprow=="")||
            ($scope.ddlPrivatePhoto==undefined || $scope.ddlPrivatePhoto=="")||
            (desc1==undefined || desc1=="")
          )
          {
            $scope.form_error=true;$scope.msg="Please enter form !";
          }
        else
        {
          if(!(Number.isInteger(Number($scope.txtDuration)))||!($.isNumeric(Number($scope.txtPrice))))
          {
           $scope.form_error=true;$scope.msg="The field Duration,Price Number only !"; 
          }
          else
          {                      
            arr[i] = [];
            arr[i][0] = $scope.ddlType;
            arr[i][1] = $scope.txtDuration;
            arr[i][2] = $scope.txtPrice;
            arr[i][3] = $scope.ddlHomepage;
            arr[i][4] = $scope.ddlToprow;
            arr[i][5] = $scope.ddlPrivatePhoto;
            //format duration
            arr[i][6] =' days';
            arr[i][7] = $scope.ddlHomepage=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][8] = $scope.ddlToprow=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            arr[i][9] = $scope.ddlPrivatePhoto=='1'?'glyphicon glyphicon-ok':' glyphicon glyphicon-remove';
            
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