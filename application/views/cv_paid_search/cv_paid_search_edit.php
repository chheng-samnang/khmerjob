<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>
<?php echo form_open("cv_paid_search_c/add/$url/".$id."","id='form' name='form'");?>
	<div class="col-md-3"><!--====	=side bar button ======-->
		<div class="list-group">
		  <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item">Account Information</a>
		  <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item">Post Job</a>
		  <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item">Post CV</a>
		  <a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item">Post Skill</a>
		  <a href="<?php echo base_url("ads_c/post_ads");?>" class="list-group-item">Advertisement</a>
		  <a href="<?php echo base_url("bundle_package_c/index");?>" class="list-group-item">Purchase Bundle Package</a>
		  <a href="<?php echo base_url("cv_paid_search_c/index");?>" class="list-group-item active1">Purchase CV Paid Search</a>
		</div>
	</div><!--=====end side bar button ======-->
	<div class="col-md-9"><!--===== form post job ======-->
		<div class="row">
			<div class="panel panel-default">
		        <div class="panel-body">
		        <!--====Erroor validation====-->
	        		<div class="row">
						<div class="col-lg-12">
						<?php
							if(!empty($error) OR validation_errors())
							{
						?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
							</div>
						<?php }?>
						</div>
					</div>
		        <!---=====End Error validation=====-->

		        	<div class="row">
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">CV Paid Search ID</label>
		      					<?php echo form_input(array("name"=>"txtCvpsID","id"=>"txtCvpsID","value"=>$cps_code,"class"=>"form-control","readonly"=>"readonly"));?>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">CV Paid Search Duration</label>
		      					<!-- <select name="ddlCvpsDuration" id="ddlCvpsDuration" class="form-control"  <?php echo ($edit->cps_status=="Published" OR $edit->cps_status=="Pending" OR $edit->cps_status=="Expired")?"disabled":NULL;?>> -->
											<select name="ddlCvpsDuration" id="ddlCvpsDuration" class="form-control"  <?php echo ($edit->cps_status=="Published" OR $edit->cps_status=="Pending" OR $edit->cps_status=="Expired")?"":NULL;?>>
		      						<option value="-1">Choose one</option>
		      						<?php if(isset($cps_setup)){foreach($cps_setup as $cps_setup1){?>
		      							<option value="<?php echo $cps_setup1->key_code;?>"  <?php if(isset($edit)){if($edit->hour==$cps_setup1->key_code){echo "selected";}}?>><?php echo $cps_setup1->cps_setup2;?></option>
		      						<?php }}?>
		      					</select>
		      				</div>
			        	</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Customer Name</label>
									<?php echo form_input("txtCusName",set_value("txtCusName",$cus_info->acc_name),"class='form-control'") ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Phone Number</label>
									<?php echo form_input("txtPhone",set_value("txtPhone",$cus_info->acc_phone),"class='form-control'") ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Address</label>
									<?php echo form_input("txtAddr",set_value("txtAddr",$cus_info->acc_addr),"class='form-control'") ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Email</label>
									<?php echo form_input("txtEmail",set_value("txtEmail",$cus_info->acc_email),"class='form-control'") ?>
								</div>
							</div>
						</div>

					<!-- <div class="row">
			        	<div class="col-md-6">
				    		<label class="control-label">Purchase Date</label>
		      				<div class="input-group datetimepicker">
		      					<?php echo form_input(array("name"=>"txtPurchaseDate","id"=>"txtPurchaseDate","value"=>$edit->date_from,"class"=>"form-control datetimepicker","placeholder"=>"Click on Purchase date"));?>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                    		</div>
			        	</div>
					</div>--><hr>


					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">
							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">
							<input type="submit" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">
							<!-- <input type="button" name="btnUpdate" id="btnUpdate" class="btn btn-default" value="Update"> -->
							<input type="submit" name="btnUpdate" value="Submit" id="btnUpdate" class="btn btn-success pull-right" style="display:none;">
							<input type="submit" name="btnSubmit_edit" id="btnSubmit_edit" class="btn btn-success pull-right" value="Submit" <?php echo ($edit->cps_status=="Published" OR $edit->cps_status=="Pending" OR $edit->cps_status=="Expired")?"disabled":NULL;?>>
						</div>
					</div><!--==== end button action ====-->


				<!-- <div class="row" style="margin-top: 20px">
					<div class="col-md-12">
						<button class="btn btn-success btn-md btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show CV Paid Search Posting History</button>
						<div class="collapse" id="collapseExample">
						  <div class="well">
						    <div class="panel panel-default">
								<div class="panel-heading">CV Paid Search History</div>
									<div class="panel-body">
										<table class="table table-trip">
											<tr>
												<th>CPS ID</th>
												<th>Duration</th>
												<th>Purchase Date</th>
												<th>Status</th>
												<th>Action</th>
												<th>Edit | Delete</th>
											</tr>
											<?php if($post_history==TRUE)
											{
												foreach($post_history as $p_h)
												{
											?>
												<tr>
												<td><?php echo $p_h->cps_code;?></td>
												<td><?php echo $p_h->hour.' hours';?></td>
												<td><?php echo $p_h->date_from;?></td>
												<td><?php echo $p_h->cps_status;?></td>
												<td><?php echo $p_h->cps_action;?></td>
												<td><a href="<?php echo base_url('cv_paid_search_c/cv_paid_search_edit/'.$p_h->cps_code)?>" style="margin-right:5px;">Edit</a><a href="<?php echo base_url('cv_paid_search_c/delete/'.$p_h->cps_code)?>">Delete</a></td>
											</tr>
											<?php
												}
											}?>
										</table>
									</div>
							</div>
						  </div>
						</div>
					</div>
				</div>
				 -->
	</div><!--===== end form post job ======-->
	</div></div></div>
<?php echo form_close();?>

<script type="text/javascript">
	var status = "<?php echo $edit->cps_status?>";
	if(status!=""&&(status=="Published"||status=="Pending"||status=="Expired"))
	{
		$("#btnSubmit_edit").attr("style","display:none;");
		$("#btnUpdate").attr("style","display:block;");
	}else {
		$("#btnSubmit_edit").attr("style","display:block;");
	}
</script>
