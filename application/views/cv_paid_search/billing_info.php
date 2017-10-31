<?php echo form_open("process_payment_c/index","id='form' name='form'");?>

<div class="panel panel-default" ng-app="myApp" ng-controller="myCtrl">

	<div class="panel-heading">Billing Information</div>

	<div class="panel-body">

		<div class="row" style="margin-bottom:10px;"><!--==== billing information ====-->
			<?php
				$check1='';
				$check='true';
				if(isset($check_value)){ if($check_value==0){ $check="true";}else{ $check1="true";$check="";  } }
			 ?>
			<div class="col-md-3 col-md-offset-9">
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-checked="<?php echo $check1;?>" ng-model="VAT" value="<?php if(isset($VAT)){echo $VAT->key_code;}?>" ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)"> Include VAT
				</label>
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="0" ng-checked="<?php echo $check;?>" ng-click="value2(0)"> Not Include VAT							    
				</label>
			</div>
		</div><!--==== end billing information ====-->
		<div class="row"><!--==== billing information ====-->
			<div class="col-md-12">
				<table class="table table-striped table-bordered">
					<tr>
						<th>CPS ID</th>

						<th>Price</th>

						<th>Duration</th>

					</tr>

					<?php $sum_price=0;if($billing_info==TRUE)
					{
						foreach($billing_info as $index => $b_info)

						{

					?>

					<tr>

						<td><?php echo $b_info->cps_code;?></td>

						<td><?php echo $b_info->key_data.' $';?></td>

						<td><?php echo $b_info->hour.' hours';?></td>

						<?php $sum_price+=$b_info->key_data;?>

					</tr>

					<?php

						}

					}?>

					<tr>

						<td colspan="1" rowspan="3"></td>

						<th style="text-align: right;">Sub Total :</th>

						<th><?php echo $sum_price.".00$";?></th>

						<input type="hidden" ng-init="txtSubTotal='<?php echo $sum_price; ?>'" ng-model="txtSubTotal" value="<?php echo $sum_price; ?>" name="txtSubTotal" id="txtSubTotal">

					</tr>

					<tr>
						<th style="text-align: right;">VAT :</th>
						<th>{{VAT1}}%</th>
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

				<a class="btn btn-default" href="<?php echo base_url("cv_paid_search_c/invoice_preview/{{VAT1}}");?>">Invoice Preview</a>

			</div>

			<div class="col-md-6">

				<input type="button" class="btn btn-success pull-right" name="btnPayment" id="btnPayment" ng-click="payment()" value="Payment">

			</div>

		</div><!--==== end invoice preview and payment ====-->

	</div>

</div>

<!--=== To the Process bank ==-->

<input type="hidden" name="type_post" value="cv_paid_search_c">

<input type="hidden" name="post_id" value="<?php if(isset($b_info->cps_id)){echo $b_info->cps_id;}?>">
<?php echo form_close();?>

<script>

  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)

  {		$scope.VAT1=0;
   		$scope.VAT1="<?php if(isset($check_value)){ echo $check_value; }?>";
	   	if($scope.VAT1==""){ $scope.VAT1=0;}
	   	$scope.GrandTotal=<?php echo $sum_price; ?>

   	$scope.value1=function()

   	{
   		$scope.VAT1=<?php if(isset($VAT->key_code)){echo $VAT->key_code;}?>;

   		var x = $scope.txtSubTotal*$scope.VAT/100;

   		$scope.GrandTotal=parseInt($scope.txtSubTotal)+x;

   	}

   	$scope.value2=function()

   	{
   		$scope.GrandTotal=$scope.txtSubTotal;

   		$scope.VAT1=0;

   	}

  $scope.payment=function()

  {

  	document.getElementById("form").submit();

  }

 });//-------- end angularJS

</script>
