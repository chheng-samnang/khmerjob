<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="container-fluid">
    <!--==== Title Header ====-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Form Pay walk in Detail</h1>
            </div>            
        </div>
    <!--==== End Title Header ====-->
    <!--==== Form ====-->
      <?php echo form_open(base_url("admin/pay_walk_in_c/addPay_walk"),"id='form' name='form'");?>
        <div class="row" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
            <div class="col-lg-7"><!--==left==-->                     
                <div class="panel panel-primary">
                    <div class="panel-heading">Pay walk in </div>
                    <div class="panel-body">                                                            
                      <!--== form ==-->
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="table table-border">
                            <tr>     
                              <th>Post Code</th>
                              <th>Price</th>
                              <th>Package Duration</th>
                              <th>Purchase Date</th>
                              <th>Exprire Date</th>
                            </tr>
                            <?php $sum_price=0; $sum_discount=0; if($val==TRUE)
                              {
                                foreach($val as $val)
                                {
                              ?>
                              <tr>            
                                <td><?php echo $val->bp_code;?></td>
                                <td><?php echo $val->key_data.' $';?></td>
                                <td><?php echo $val->key_code.' days';?></td>            
                                <td><?php echo $val->date_from;?></td>
                                <td><?php echo date("Y-m-d",strtotime("+$val->key_code month",strtotime($val->date_from)))?></td> 
                                <?php $sum_price+=$val->key_data;?>            
                              </tr>
                              <?php 
                                } 
                              }?>     
                          </table>
                          <input type="hidden" value="<?php echo $acc_info->acc_code; ?>" name="acc_code">
                        </div>
                      </div>
                    <!--=== End form===--> 
                    <input type="hidden" ng-init="txtAccId='<?php echo $val->acc_id;?>'" ng-model="txtAccId" value="<?php $val->acc_id;?>" name="txtAccId">
                    </div>    
                </div>            
            </div><!--==left==-->
            <div class="col-lg-5"><!--==left==-->                     
                <div class="panel panel-primary">
                    <div class="panel-heading">Pay walk in </div>
                    <div class="panel-body">
                      <div class="row">
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
                      </div>
                    <?php if(validation_errors()){?>
              <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-12">                      
                          <span ng-show="form_error"> 
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong><?php echo validation_errors();?>                                                               
                            </div>
                          </span>                        
                        </div>              
                    </div>                    
              <!--==== end msg error =====-->
                    <?php }?>                                            
                <!--== form ==-->
                    <!-- start hidden texbox -->
                    <input type="hidden" value="<?php echo $val->acc_id;?>" name="txtAccId" id="txtAccId">
                    <input type="hidden" value="<?php echo $post_type;?>" name="post_type" id="post_type">
                    <!-- end hidden textbox --> 
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Sub Total($)</label>
                            <input type="text" value="<?php echo $sum_price; ?>" name="txtSubtotal" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Discount(%)</label>
                            <input type="" name="txtDiscount" value="<?php echo $sum_discount;?>" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Total($)</label>
                            <input type="hidden" value="<?php echo $post_type;?>" name="post_type" id="post_type">
                            <input type="text" id="txtTotal" name="txtTotal" value="<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>" class="form-control" readonly>
                            <input type="hidden" id="txtTotal"  ng-init="txtTotal='<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>'"   ng-model="txtTotal" name="txtTotal" value="<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>">
                          </div>
                        </div>                        
                        <div class="col-lg-6" style="margin-top:18px">
                          <label class="radio-inline">
                            <input type="radio" ng-model="VAT" ng-init="VAT='<?php if(isset($VAT)){echo $VAT->key_code;}?>'" name="VAT" ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)" value="<?php if(isset($VAT)){echo $VAT->key_code;}?>">Need VAT
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="VAT" id="VAT" ng-init="VAT='0'" value="0" ng-click="value2(0)" ng-checked='true'> No Need VAT                  
                          </label>
                        </div>                       
                      </div>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="control-label">Grand Total($)</label>
                            <input type="text" ng-model="txtGandTotal" ng-init="txtGandTotal='{{GrandTotal}}'" value="{{GrandTotal}}" name="txtGandTotal"  class="form-control" readonly>
                            <input type="hidden" ng-model="txtgandtotal" ng-init="txtgandotal='{{GrandTotal}}'"  name="">
                          </div>
                        </div>   
                      </div><hr>
                       <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Cash($)</label>
                            <input type="number" ng-model="txtCash" id="txtCash"  name="txtCash" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Exchange($)</label>
                            <input type="number" value="{{txtCash - GrandTotal}} " ng-model="txtEchange" id="txtEchange" name="txtEchange" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Total($)</label>
                            <input type="text" name="txtExtotal" value="{{GrandTotal}}" class="form-control" readonly>
                          </div>
                        </div>                                             
                      </div>
                <!--=== End form===-->
                <!--==Button==-->
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="pull-right">
                          <?php echo form_button("btnPay","Go",array("class"=>"btn btn-success btn-sm","id"=>"btnPay","ng-click"=>"add_pay()"));?>
                          <a href="<?php echo base_url("main");?>" class="btn btn-default">Cancel</a>
                          </div>
                        </div>                         
                      </div>  
                <!--== End Button ==--> 
                    </div>    
                </div>            
            </div><!--==left==-->
        </div>
      <?php form_close();?>
    <!--==== End Form ====-->
    </div>  
  </div><!--== End wrapper ==-->
</body>
</html>
<script>
      /*$("#btnPay").removeAttr("disabled");
      $('#btnPay').removeClass('disabled');*/
      var grandtotal = document.getElementById('txtgandtotal'); 
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope)
{
    $scope.GrandTotal="<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>";
    $scope.GrandTotal;
    $scope.txtgandtotal;
    $scope.txtCash;
    $scope.total_price =$scope.txtCash-$scope.txtgandtotal;
    $scope.add_pay=function()
    {
      if(($scope.txtTotal)<=($scope.txtCash)){
        document.getElementById("form").submit();
      }else{$scope.msg_error=true; $scope.msg="your cash invalid...!";}
    }
    $scope.value1=function(value)
    {
      $scope.VAT=value;            
       var x=(($scope.txtTotal*$scope.VAT)/100);
      $scope.GrandTotal=parseInt($scope.txtTotal)+x; 
    }
    $scope.value2=function(value)
    {
      $scope.VAT=value;
      $scope.GrandTotal=$scope.txtTotal;
    }
    $scope.txtCash;
    $scope.txtEchange;
});
</script>
