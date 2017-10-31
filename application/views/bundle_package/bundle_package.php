<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>
<?php echo form_open("bundle_package_c/add/$url","id='form' name='form'");?>
	<div class="col-md-3"><!--=====side bar button ======-->
		<div class="list-group">
		  <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item">Account Information</a>
		  <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item">Post Job</a>
		  <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item">Post CV</a>
		  <a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item">Post Skill</a>
		  <a href="<?php echo base_url("ads_c/post_ads");?>" class="list-group-item">Advertisement</a>
		  <a href="<?php echo base_url("bundle_package_c/index");?>" class="list-group-item active1">Purchase Bundle Package</a>
		  <a href="<?php echo base_url("cv_paid_search_c/index");?>" class="list-group-item">Purchase CV Paid Search</a>
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
		      					<label class="control-label">Bundle Package ID</label>
		      					<?php echo form_input(array("name"=>"txtBpID","id"=>"txtBpID","value"=>$bp_code,"class"=>"form-control","readonly"=>"readonly"));?>		      					
		      				</div>		      				
			        	</div>
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Bundle Package Duration</label>		      					
		      					<select name="ddlBpDuration" id="ddlBpDuration" class="form-control">
		      						<option value="">Choose one</option>
		      						<?php if(isset($bp_setup)){foreach($bp_setup as $bp_setup1){?>
		      							<option value="<?php echo $bp_setup1->key_id;?>" <?php echo set_select("ddlBpDuration",$bp_setup1->key_id)?>><?php echo $bp_setup1->bp_setup2;?></option>
		      						<?php }}?>		      								      								      					
		      					</select>
		      				</div>			        					        						        						        	
			        	</div>			        	
					</div>

					<div class="row">						
			        	<div class="col-md-6">
				    		<label class="control-label">Purchase Date</label>
		      				<div class="input-group datetimepicker">
		      					<?php echo form_input(array("name"=>"txtPurchaseDate","id"=>"txtPurchaseDate","value"=>set_value("txtPurchaseDate"),"class"=>"form-control datetimepicker","placeholder"=>"Click on Purchase date"));?>		      											      					                                         		                                          
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>                                
                    		</div>			        					        						        						        	
			        	</div>			        				        		     						        				        	
					</div><hr>														
															
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">
							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">							
							<input type="reset" name="btnDelete" id="btnDelete" class="btn btn-default" value="Reset">														
							<input type="submit" name="btnSave" id="btnSave" class="btn btn-default" value="Save">
							<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success pull-right" value="Submit">																					
						</div>
					</div><!--==== end button action ====-->
															
					
				<div class="row" style="margin-top: 20px"><!--==== show post history ====-->
					<div class="col-md-12">						
						<button class="btn btn-success btn-md btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show Bundle Package Posting History</button>										
						<div class="collapse" id="collapseExample">
						  <div class="well">
						    <div class="panel panel-default">
								<div class="panel-heading">Bundle Package Posting History</div>
									<div class="panel-body">
										<table class="table table-trip">
											<tr>												
												<th>BP ID</th>
												<th>Duration</th>
												<th>Purchase Date</th>
												<th>Expire Date</th>																							
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
												<td><?php echo $p_h->bp_code;?></td>
												<td><?php echo $p_h->key_code.' days';?></td>																																		
												<td><?php echo $p_h->date_from;?></td>
												<td><?php echo date("Y-m-d",strtotime("+$p_h->key_code days",strtotime($p_h->date_from)))?></td>													
												<td><?php echo $p_h->bp_status;?></td>												
												<td><?php echo $p_h->bp_action;?></td>
												<td><a href="<?php echo base_url('bundle_package_c/bundle_package_edit/'.$p_h->bp_code)?>" style="margin-right:5px;">Edit</a><a href="<?php echo base_url('bundle_package_c/delete/'.$p_h->bp_code)?>">Delete</a></td>
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
				</div><!--==== end show post history ====-->							
	</div><!--===== end form post job ======-->
	</div></div></div>

<?php echo form_close();?>


