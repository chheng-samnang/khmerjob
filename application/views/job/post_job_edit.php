<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>
<?php echo form_open("job_c/add/$url","id='form' name='form'");?>
	<div class="col-md-3"><!--=====side bar button ======-->
		<div class="list-group">
		  <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item">Account Information</a>
		  <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item active1">Post Job</a>
		  <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item">Post CV</a>
		  <a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item">Post Skill</a>
		  <a href="<?php echo base_url("ads_c/post_ads");?>" class="list-group-item">Advertisement</a>
		  <a href="<?php echo base_url("bundle_package_c/index");?>" class="list-group-item">Purchase Bundle Package</a>
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
		      					<label class="control-label">Number</label>
		      					<?php echo form_input(array("name"=>"txtNumber","id"=>"txtNumber","value"=>$number,"class"=>"form-control","readonly"=>"readonly"));?>
		      				</div>
		      				<!-- <input type="hidden" name="txt_post_job_id" value="<?php echo $edit->post_job_id;?>">			        					        						        						        				        					        						        						        	 -->
			        	</div>
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Job ID</label>
		      					<?php echo form_input(array("name"=>"txtJobID","id"=>"txtJobID","value"=>$job_code,"class"=>"form-control","readonly"=>"readonly"));?>
		      				</div>

		      				<input type="hidden" name="txt_post_job_id" value="<?php echo $edit->post_job_id;?>">
			        	</div>
					</div>
					<div class="row">
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Priority</label>
		      					<select name="ddlPriority" id="ddlPriority" class="form-control" <?php echo ($edit->post_job_status=="Published" OR $edit->post_job_status=="Pending" OR $edit->post_job_status=="Expired")?"disabled":NULL;?>>
		      						<option value="">Choose one</option>
		      						<?php if(isset($job_setup)){foreach($job_setup as $job_setup1){?>
		      							<option value="<?php echo $job_setup1->rate_det_id;?>" <?php if(isset($edit)){if($edit->priority==$job_setup1->rate_det_id){echo "selected";}}?>><?php echo $job_setup1->job_setup2;?></option>
		      						<?php }}?>
		      					</select>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Job Title</label>
		      					<?php echo form_input(array("name"=>"txtJobTitle","id"=>"txtJobTitle","value"=>$edit->job_title,"class"=>"form-control","placeholder"=>"Enter Job Title here..."));?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Job Description</label>
		      					<?php echo form_textarea(array("name"=>"txtJobDes","id"=>"txtJobDes","value"=>$edit->job_desc,"class"=>"form-control","placeholder"=>"Enter Job Description here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Job Requirement</label>
		      					<?php echo form_textarea(array("name"=>"txtJobRequirement","value"=>$edit->job_requirement,"id"=>"txtJobRequirement","class"=>"form-control","placeholder"=>"Enter Job Requirement here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Other Benefits</label>
		      					<?php echo form_textarea(array("name"=>"txtOtherBenefit","id"=>"txtOtherBenefit","value"=>$edit->other_benefit,"class"=>"form-control","placeholder"=>"Enter Other Benefits here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row"><!-- ====form contact us====-->
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Contact name</label>
						      					<?php echo form_input(array("name"=>"txtContactName","id"=>"txtContactName","value"=>$edit->contact_name,"class"=>"form-control","placeholder"=>"Enter Contact name here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Phone</label>
						      					<?php echo form_input(array("name"=>"txtPhone","id"=>"txtPhone","value"=>$edit->phone,"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
						      				</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Email</label>
						      					<?php echo form_input(array("name"=>"txtEmail","id"=>"txtEmail","value"=>$edit->email,"class"=>"form-control","placeholder"=>"Enter Email here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Address</label>
						      					<?php echo form_input(array("name"=>"txtAddr","id"=>"txtAddr","value"=>$edit->addr,"class"=>"form-control","placeholder"=>"Enter Address here..."))?>
						      				</div>
							        	</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--end form contact us-->

					<div class="row"><!--==== other benefit ====-->
			        	<div class="col-md-12">
		      				<div class="panel panel-default">

								  <div class="panel-body">
								    <div class="row">
								    	<div class="col-md-6">
								    		<label class="control-label">Posting Date</label>
						      				<div class="input-group datetimepicker">
						      					<?php echo form_input(array("name"=>"txtPostingDate","id"=>"txtPostingDate","value"=>$edit->posting_date,"class"=>"form-control datetimepicker","placeholder"=>"Click on Posting date"));?>
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>
                                    		</div>
							        	</div>
							        	<div class="col-md-6">
								    		<label class="control-label">End Date</label>
						      				<div class="input-group datetimepicker">
						      					<?php echo form_input(array("name"=>"txtEndDate","id"=>"txtEndDate","value"=>$edit->end_date,"class"=>"form-control datetimepicker","placeholder"=>"Click on End date"));?>
		                                        <span class="input-group-addon">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>
                                    		</div>
							        	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Contract</label>
						      					<select name="ddlContract" id="ddlContract" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="full_time" <?php if($edit->contract=="full_time"){echo "selected";}?>>Full Time</option>
						      						<option value="part_time" <?php if($edit->contract=="part_time"){echo "selected";}?>>Part Time</option>
						      						<option value="<3" <?php if($edit->contract=="<3"){echo "selected";}?>>Less Than 3 months</option>
						      						<option value="3,6" <?php if($edit->contract=="3,6"){echo "selected";}?>>From 3 to 6 months</option>
						      						<option value="6,12" <?php if($edit->contract=="6,12"){echo "selected";}?>>From 6 to 12 months</option>
						      						<option value=">1" <?php if($edit->contract==">1"){echo "selected";}?>>More Than 1 year</option>
						      						<option value="internship" <?php if($edit->contract=="internship"){echo "selected";}?>>Internship</option>
						      						<option value="negotiable" <?php if($edit->contract=="negotiable"){echo "selected";}?>>Negotiable</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Gender</label>
						      					<select name="ddlGender" id="ddlGender" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="m" <?php if($edit->gender=="m"){echo "selected";}?>>Male</option>
						      						<option value="f" <?php if($edit->gender=="f"){echo "selected";}?>>Female</option>
						      						<option value="o" <?php if($edit->gender=="o"){echo "selected";}?>>Other</option>
						      					</select>
						      				</div>
								    	</div>
								    </div>

								     <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Age</label>
						      					<select name="ddlAge" id="ddlAge" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="18,25" <?php if($edit->age=="18,25"){echo "selected";}?>>18 - 25</option>
						      						<option value="25,32" <?php if($edit->age=="25,32"){echo "selected";}?>>25 - 32</option>
						      						<option value="32,37" <?php if($edit->age=="32,37"){echo "selected";}?>>32 - 37</option>
						      						<option value="37,45" <?php if($edit->age=="37,45"){echo "selected";}?>>37 - 45</option>
						      						<option value=">=45" <?php if($edit->age==">=45"){echo "selected";}?>>Over 45</option>
						      						<option value="unlimited" <?php if($edit->age=="unlimited"){echo "selected";}?>>Unlimited</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Salary Range</label>
						      					<select name="ddlSalaryRange" id="ddlSalaryRange" class="form-control">
						      						<option value="">Choose one</option>
															<option value="<150" <?php if($edit->salary_range=="<150"){echo "selected";} ?>>Less than $150</option>
						      						<option value="150,300" <?php if($edit->salary_range=="150,300"){echo "selected";}?>>$150 - $300</option>
						      						<option value="300,500" <?php if($edit->salary_range=="300,500"){echo "selected";}?>>$300 - $500</option>
						      						<option value="500,750" <?php if($edit->salary_range=="500,750"){echo "selected";}?>>$500 - $750</option>
						      						<option value=">=1000" <?php if($edit->salary_range==">=1000"){echo "selected";}?>>Over $1000</option>
						      						<option value="negotiable" <?php if($edit->salary_range=="negotiable"){echo "selected";} ?>>Negotiable</option>
						      					</select>
						      				</div>
								    	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Years of Experience</label>
						      					<select name="ddlYearExp" id="ddlYearExp" class="form-control">
						      						<option value="">Choose one</option>
															<option value="0,1" <?php if($edit->year_exp=="0,1"){echo "selected";}?>>0 - 1 year</option>
						      						<option value="1,3" <?php if($edit->year_exp=="1,3"){echo "selected";}?>>1 - 3 years</option>
						      						<option value="3,5" <?php if($edit->year_exp=="3,5"){echo "selected";}?>>3 - 5 years</option>
						      						<option value="5,7" <?php if($edit->year_exp=="5,7"){echo "selected";}?>>5 - 7 years</option>
						      						<option value="7,10" <?php if($edit->year_exp=="7,10"){echo "selected";}?>>7 - 10 years</option>
						      						<option value=">=10" <?php if($edit->year_exp==">=10"){echo "selected";}?>>Over 10 years</option>
						      						<option value="unlimited" <?php if($edit->year_exp=="unlimited"){echo "selected";}?>>Unlimited</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Education</label>
						      					<select name="ddlEducation" id="ddlEducation" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="PhD" <?php if($edit->edu=="PhD"){echo "selected";}?>>PhD</option>
						      						<option value="Master" <?php if($edit->edu=="Master"){echo "selected";}?>>Master</option>
						      						<option value="Bachelor" <?php if($edit->edu=="Bachelor"){echo "selected";}?>>Bachelor</option>
						      						<option value="Associate" <?php if($edit->edu=="Associate"){echo "selected";}?>>Associate</option>
						      						<option value="Vocational" <?php if($edit->edu=="Vocational"){echo "selected";}?>>Vocational</option>
						      						<option value="High School" <?php if($edit->edu=="High School"){echo "selected";}?>>High School</option>
						      						<option value="unspecified" <?php if($edit->edu=="unspecified"){echo "selected";}?>>Unspecified</option>
						      					</select>
						      				</div>
								    	</div>
								    </div>
								    <div class="row">
								    	<div class="col-md-12"><label class="control-label">Languages</label></div>
								    </div>
								    <div class="row" style="margin-bottom: 7px;">
								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang1" id="ddlLang1">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php if($edit->lang1=="Khmer"){echo "selected";}?>>Khmer</option>
								    			<option value="English" <?php if($edit->lang1=="English"){echo "selected";}?>>English</option>
								    			<option value="French" <?php if($edit->lang1=="French"){echo "selected";}?>>French</option>
								    			<option value="Chines" <?php if($edit->lang1=="Chines"){echo "selected";}?>>Chines</option>
								    			<option value="Thai" <?php if($edit->lang1=="Thai"){echo "selected";}?>>Thai</option>
								    			<option value="Vietnames" <?php if($edit->lang1=="Vietnames"){echo "selected";}?>>Vietnames</option>
								    			<option value="Other" <?php if($edit->lang1=="o"){echo "selected";}?>>Other</option>
								    		</select>
								    	</div>

								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang2" id="ddlLang2">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php if($edit->lang2=="Khmer"){echo "selected";}?>>Khmer</option>
								    			<option value="English" <?php if($edit->lang2=="English"){echo "selected";}?>>English</option>
								    			<option value="French" <?php if($edit->lang2=="French"){echo "selected";}?>>French</option>
								    			<option value="Chines" <?php if($edit->lang2=="Chines"){echo "selected";}?>>Chines</option>
								    			<option value="Thai" <?php if($edit->lang2=="Thai"){echo "selected";}?>>Thai</option>
								    			<option value="Vietnames" <?php if($edit->lang2=="Vietnames"){echo "selected";}?>>Vietnames</option>
								    			<option value="Other" <?php if($edit->lang2=="o"){echo "selected";}?>>Other</option>
								    		</select>
								    	</div>
								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang3" id="ddlLang3">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php if($edit->lang3=="Khmer"){echo "selected";}?>>Khmer</option>
								    			<option value="English" <?php if($edit->lang3=="English"){echo "selected";}?>>English</option>
								    			<option value="French" <?php if($edit->lang3=="French"){echo "selected";}?>>French</option>
								    			<option value="Chines" <?php if($edit->lang3=="Chines"){echo "selected";}?>>Chines</option>
								    			<option value="Thai" <?php if($edit->lang3=="Thai"){echo "selected";}?>>Thai</option>
								    			<option value="Vietnames" <?php if($edit->lang3=="Vietnames"){echo "selected";}?>>Vietnames</option>
								    			<option value="Other" <?php if($edit->lang3=="o"){echo "selected";}?>>Other</option>
								    		</select>
								    	</div>
								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang4" id="ddlLang4">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php if($edit->lang4=="Khmer"){echo "selected";}?>>Khmer</option>
								    			<option value="English" <?php if($edit->lang4=="English"){echo "selected";}?>>English</option>
								    			<option value="French" <?php if($edit->lang4=="French"){echo "selected";}?>>French</option>
								    			<option value="Chines" <?php if($edit->lang4=="Chines"){echo "selected";}?>>Chines</option>
								    			<option value="Thai" <?php if($edit->lang4=="Thai"){echo "selected";}?>>Thai</option>
								    			<option value="Vietnames" <?php if($edit->lang4=="Vietnames"){echo "selected";}?>>Vietnames</option>
								    			<option value="Other" <?php if($edit->lang4=="o"){echo "selected";}?>>Other</option>
								    		</select>
								    	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Hiring Quantities</label>
						      					<?php echo form_input(array("name"=>"txtHiringQty","id"=>"txtHiringQty","value"=>$edit->hiring_qty,"class"=>"form-control","placeholder"=>"Enter Hiring Quantities here..."));?>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Category</label>
						      					<select name="ddlCategory" id="ddlCategory" class="form-control">
						      						<option value="">Choose one</option>
						      						<?php if($category==TRUE){foreach($category as $category1){?>
						      						<option value="<?php echo $category1->cat_id;?>" <?php if($edit->cat_id==$category1->cat_id){echo "selected";}?>><?php echo $category1->cat_name;?></option>
						      						<?php }}?>
						      					</select>
						      				</div>
								    	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Location</label>
						      					<select name="ddlLocation" id="ddlLocation" class="form-control">
						      						<option value="">Choose one</option>
						      						<?php if($location==TRUE){foreach($location as $location1){?>
						      						<option value="<?php echo $location1->loc_id;?>" <?php if($edit->loc_id==$location1->loc_id){echo "selected";}?>><?php echo $location1->loc_name;?></option>
						      						<?php }}?>
						      					</select>
						      				</div>
								    	</div>
								    </div>
								  </div>
		      				</div>
			        	</div>
					</div><!--==== end other benefit ====-->
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">
							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">
							<input type="submit" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">
							<input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-default" value="Update">
							<input type="submit" name="btnSubmit_edit" id="btnSubmit_edit" class="btn btn-success pull-right" value="Submit"  <?php echo ($edit->post_job_status=="Published" OR $edit->post_job_status=="Pending" OR $edit->post_job_status=="Expired")?"disabled":NULL;?>>
						</div>
					</div><!--==== end button action ====-->
				<div class="row" style="margin-top: 20px"><!--==== show post history ====-->
					<div class="col-md-12">
						<button class="btn btn-success btn-md btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show Job Posting History</button>
						<div class="collapse" id="collapseExample">
						  <div class="well">
						    <div class="panel panel-default">
								<div class="panel-heading">Job Posting History</div>
									<div class="panel-body">
										<table class="table table-trip">
											<tr>
												<th>No</th>
												<th>Job ID</th>
												<th>Function</th>
												<th>Post Date</th>
												<th>End Date</th>
												<th>Status</th>
												<th>Priority</th>
												<th>Action</th>
												<th>Edit | Delete</th>
											</tr>
											<?php $i=1;if($post_history==TRUE)
											{
												foreach($post_history as $p_h)
												{
											?>
												<tr>
												<td><?php echo $i;$i++;?></td>
												<td><?php echo $p_h->job_code;?></td>
												<td><?php echo $p_h->job_title;?></td>
												<td><?php echo $p_h->posting_date;?></td>
												<td><?php echo $p_h->end_date;?></td>
												<td><?php echo $p_h->post_job_status;?></td>
												<td><?php echo $p_h->rate_det_type;?></td>
												<td><?php echo $p_h->post_job_action;?></td>
												<td><a href="<?php echo base_url('job_c/post_job_edit/'.$p_h->post_job_id)?>" style="margin-right:5px;">Edit</a><a href="<?php echo base_url('job_c/delete/'.$p_h->post_job_id)?>">Delete</a></td>
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
