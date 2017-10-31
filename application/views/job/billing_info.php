<?php echo form_open("process_payment_c/index","id='form' name='form'");?>
<div class="panel panel-default" ng-app="myApp" ng-controller="myCtrl" ng-cloak>
	<div class="panel-heading">Billing Information</div>
	<div class="panel-body">
		<div class="row" style="margin-bottom:10px;"><!--==== billing information ====-->
			<div class="col-md-3 col-md-offset-9">
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="<?php if(isset($VAT)){echo $VAT->key_code;}?>" ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)"> Include VAT
				</label>
				<label class="radio-inline">
				  <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="0" ng-checked="true" ng-click="value2(0)"> Not Include VAT
				</label>
			</div>
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== billing information ====-->
			<div class="col-md-12">
				<table class="table table-striped table-bordered">
					<tr>
						<th>No.</th>
						<th>Job ID</th>
						<th>Price/Job</th>
						<th>Discount</th>
						<th>Priority</th>
					</tr>
					<?php $i=1;$sum_price=0;$sum_discount=0;if($billing_info==TRUE)
					{
						foreach($billing_info as $index => $b_info)
						{
					?>
					<tr>
						<td><?php echo $i;$i++;?></td>
						<td><?php echo $b_info->job_code;?></td>
						<td><?php echo $b_info->price.' $';?></td>
						<td><?php echo $b_info->rate_det_type=="Premium"?($premium->premium>=2?$b_info->job_2post_discount:0)."%":($standard->standard>=2?$b_info->job_2post_discount:0)."%";?>
						<td><?php echo $b_info->rate_det_type;?></td>
						<?php $sum_price+=$b_info->price;?>
						<?php $sum_discount+=$b_info->rate_det_type=="Premium"?($premium->premium>=2?$b_info->job_2post_discount:0):($standard->standard>=2?$b_info->job_2post_discount:0);?>
					</tr>
					<?php
						}
					}?>
					<tr>
						<td colspan="3" rowspan="5"></td>
						<th style="text-align: right;">Sub Total :</th>
						<th><?php echo $sum_price."$";?></th>
					</tr>
					<tr>
						<th style="text-align: right;">Discount :</th>
						<th><?php echo $sum_discount."%";?></th>
					</tr>
					<tr>
						<th style="text-align: right;">Total :</th>
						<th><?php echo $total=$sum_price-(($sum_price*$sum_discount)/100)."$";?></th>
						<input type="hidden" ng-init="txtTotal='<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>'" name="txtTotal" ng-model="txtTotal" value="<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>">
					</tr>
					<tr>
						<th style="text-align: right;">VAT :</th>
						<th>{{VAT1}}%</th>
					</tr>
					<tr>
						<th style="text-align: right;">Grand Total :</th>
						<th>{{GrandTotal}}$</th>
						<input type="hidden" name="txtGrand_total" id="txtGrand_total" value="{{GrandTotal}}">
					</tr>
				</table>
			</div>
		</div><!--==== end billing information ====-->

		<div class="row"><!--==== invoice preview and payment ====-->
			<div class="col-md-6">
				<a href="<?php echo base_url("job_c/invoice_preview/{{VAT1}}")?>" class="btn btn-default">Invoice Preview</a>

			</div>
			<div class="col-md-6">
				<input type="button" class="btn btn-success pull-right" name="btnPayment" id="btnPayment" ng-click="payment()" value="Payment">
				<a href="<?php echo base_url('job_c/post_job')?>" style="margin-right: 7px;" class="btn btn-default pull-right">Add more</a>
			</div>
		</div><!--==== end invoice preview and payment ====-->
	</div>
</div>
<!--=== To the Process bank ==-->
<input type="hidden" name="type_post" value="job_c">
<input type="hidden" name="post_id" value="<?php if(isset($b_info)){echo $b_info->post_job_id;}?>">
<?php echo form_close();?>
<script>
  angular.module('myApp',[]).controller('myCtrl',function($scope,$http)
  {
	  $scope.VAT1=0;
	  $scope.GrandTotal=<?php echo $total=$sum_price-(($sum_price*$sum_discount)/100);?>;
	  $scope.value1=function()
	  {
	  	$scope.VAT1=<?php if(isset($VAT)){echo $VAT->key_code;}?>;
	  	var x =$scope.txtTotal*$scope.VAT/100;
	  	$scope.GrandTotal=parseInt($scope.txtTotal)+x;
	  }
	  $scope.value2=function()
	  {
	  	$scope.GrandTotal=$scope.txtTotal;
	  	$scope.VAT1=0;
	  }
	  $scope.payment=function()
	  {
	  	document.getElementById("form").submit();
	  }
  });//-------- end angularJS
</script>
