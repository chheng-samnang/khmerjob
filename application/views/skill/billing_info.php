<?php echo form_open("process_payment_c/index","id='form' name='form'");?>
<div class="panel panel-default" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<div class="panel-heading">Billing Information</div>
	<div class="panel-body">
		<div class="row" style="margin-bottom:10px;"><!--==== billing information ====-->									
			<div class="col-md-3 col-md-offset-9">
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="<?php if(isset($VAT)){echo $VAT->key_code;}?>" ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)"> Need VAT
				</label>
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="0" ng-click="value2(0)" ng-checked="true"> No Need VAT							    
				</label>				

			</div>																						
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== billing information ====-->												
			<div class="col-md-12">
				<table class="table table-striped table-bordered">
					<tr>						
						<th>Skill ID</th>
						<th>Price</th>						
						<th>Duration</th>						
						<th>Priority</th>						
					</tr>
					<?php $sum_price=0;if($billing_info==TRUE)
					{
						foreach($billing_info as $index => $b_info)
						{
					?>
					<tr>						
						<td><?php echo $b_info->skill_code;?></td>
						<td><?php echo $b_info->price.' $';?></td>
						<td><?php echo $b_info->duration.' days';?></td>
						<td><?php echo $b_info->rate_det_type;?>												
						<?php $sum_price+=$b_info->price;?>						
					</tr>
					<?php	
						}	
					}?>					
					<tr> 
						<td colspan="2" rowspan="5"></td>									
						<th style="text-align: right;">Sub Total :</th>
						<th><?php echo $sum_price."$";?></th>
						<input type="hidden" id="txtSubTotal"  ng-init="txtSubTotal='<?php echo $sum_price;?>'"   ng-model="txtSubTotal" name="txtSubTotal" value="<?php echo $sum_price;?>">
					</tr>																		
					<tr>						
						<th style="text-align: right;">VAT :</th>
						<th>{{VAT1}}%</th>
					</tr>
					<tr>					
						<th style="text-align: right;">Grand Total :</th>																							
						<th>{{GrandTotal}}</th>
						<input type="hidden" name="txtGrand_total" id="txtGrand_total" value="{{GrandTotal}}">																			
					</tr>																
				</table>				
			</div>																			
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== invoice preview and payment ====-->												
			<div class="col-md-6">
				<a href="<?php echo base_url("skill_c/invoice_preview{{VAT1}}")?>" class="btn btn-default">Invoice Preview</a>
				
			</div>	
			<div class="col-md-6">
				<input type="button" class="btn btn-success pull-right" name="btnPayment" id="btnPayment" ng-click="payment()" value="Payment">												
			</div>																							
		</div><!--==== end invoice preview and payment ====-->
	</div>
</div>
<!--=== To the Process bank ==-->
<input type="hidden" name="type_post" value="skill_c">
<input type="hidden" name="post_id" value="<?php if(isset($b_info)){echo $b_info->post_skill_id;}?>">
<?php echo form_close();?>
<script>  
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  { 
   	$scope.VAT1=0;
   	$scope.GrandTotal=<?php echo $sum_price;?>   
   	$scope.GrandTotal; 
   $scope.value1=function()
   {
   	$scope.VAT1=<?php if(isset($VAT)){echo $VAT->key_code;}?>;
   	var x=$scope.txtSubTotal*$scope.VAT/100;
   	$scope.GrandTotal= parseInt($scope.txtSubTotal)+x;
   }
   $scope.value2=function()
   {
   	$scope.VAT1=0;
   	$scope.GrandTotal=$scope.txtSubTotal;
   }
  $scope.payment=function()
  {  	
  	document.getElementById("form").submit();                     
  }                          
  });//-------- end angularJS
</script>