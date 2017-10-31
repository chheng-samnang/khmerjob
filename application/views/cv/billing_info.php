<?php echo form_open("process_payment_c/index","id='form' name='form'");?>
<div class="panel panel-default" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<div class="panel-heading">Billing Information</div>
	<div class="panel-body">
		<div class="row" style="margin-bottom:10px;"><!--==== billing information ====-->
			<div class="col-md-3 col-md-offset-9">
				<label class="radio-inline">
					<?php 
						$check="";
						$check1='true';
						if(isset($check_value)){ if($check_value=='0'){ $check1="true";}else{$check="true";}}
					?>
				  <input type="radio" name="VAT" id="VAT" ng-checked='<?php echo $check;?>' ng-model="VAT" value="<?php if(isset($VAT)){ echo $VAT->key_code;}?>" ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)"> Include VAT
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="0" ng-checked="<?php if($check==""){ echo "true";}else{ echo "0"; }?>"" ng-click="value2(0)"> Not include VAT
				</label>

			</div>
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== billing information ====-->
			<div class="col-md-12">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No.</th>
						<th>CV ID</th>
						<th>Price</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Duration</th>
						<th>Priority</th>
					</tr>
					<?php $i=1;if($billing_info==TRUE)
					{
						foreach($billing_info as $index => $b_info)
						{
					?>
					<tr>
						<td><?php echo $i;$i++;?></td>
						<td><?php echo $b_info->cv_code;?></td>
						<td><?php echo $b_info->price.'$';?></td>
						<td><?php echo $date_f?></td>
						<td><?php echo $date_t?></td>
						<td><?php echo $b_info->duration.' days';?></td>
						<td><?php echo $b_info->rate_det_type;?></td>
					</tr>
					<?php
						}
					}?>
					<tr>
						<td colspan="5" rowspan="5"></td>
						<!-- <th style="text-align: right;">Sub Total :</th> -->
						<!-- <th><?php echo $b_info->price."$";?></th> -->
					</tr>
					<tr>
						<!-- <th style="text-align: right;">Duration :</th> -->
						<!-- <th><?php echo $b_info->duration." days";?></th> -->
					</tr>
					<tr>
						<th style="text-align: right;">Total :</th>
						<th><?php echo $b_info->price."$";?></th>
						<input type="hidden" id="txtTotal"  ng-init="txtTotal='<?php echo $b_info->price;?>'"   ng-model="txtTotal" name="txtTotal" value="<?php echo $b_info->price;?>">
					</tr>
					<tr>
						<th style="text-align: right;">VAT:</th>
						<th><?php if(isset($check_value)){ echo $check_value; }else{ echo "{{VAT1}}";}?>%</th>
					</tr>
					<tr>
						<th style="text-align: right;">Grand Total :</th>
						<th>{{GrandTotal}}$</th>
					</tr>
				</table>
			</div>
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== invoice preview and payment ====-->
			<div class="col-md-6">
				<a href="<?php echo base_url("cv_c/invoice_preview/{{VAT1}}");?>" class="btn btn-default" >Invoice Preview</a>
			</div>
			<div class="col-md-6">
				<input type="button" class="btn btn-success pull-right" name="btnPayment" id="btnPayment" ng-click="payment()" value="Payment">
			</div>
		</div><!--==== end invoice preview and payment ====-->
	</div>
</div>
<!--=== To the Process bank ==-->
<input type="hidden" name="type_post" value="cv_c">
<input type="hidden" name="post_id" value="<?php if(isset($b_info)){echo $b_info->post_cv_id;}?>">
<?php echo form_close();?>
<script>
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {
   	$scope.VAT1="<?php if(isset($check_value)){ echo $check_value; }else{} ?>";
   	if($scope.VAT1==""){ $scope.VAT1=0; }
   	$scope.GrandTotal=<?php if(isset($b_info->price)){echo $b_info->price;}else{echo "0";}?>;
   	$scope.value1=function()
   	{	$scope.VAT1=<?php if(isset($VAT)){echo $VAT->key_code;}?>;
   		var x=$scope.txtTotal*$scope.VAT/100;
   		$scope.GrandTotal=parseInt($scope.txtTotal)+x;
   	}
   	$scope.value2=function()
   	{	$scope.VAT1=0;
   		$scope.GrandTotal=<?php if(isset($b_info->price)){echo $b_info->price;}else{echo "0";}?>
   	}
  $scope.payment=function()
  {
  	document.getElementById("form").submit();
  }
  });//-------- end angularJS
</script>
