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
			        	</div>
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Job ID</label>
		      					<?php echo form_input(array("name"=>"txtJobID","id"=>"txtJobID","value"=>$job_code,"class"=>"form-control","readonly"=>"readonly"));?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
						<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Priority</label>
		      					<select name="ddlPriority" id="ddlPriority" class="form-control">
		      						<option value="">Choose one</option>
		      						<?php if(isset($job_setup)){foreach($job_setup as $job_setup1){?>
		      							<option value="<?php echo $job_setup1->rate_det_id;?>" <?php echo set_select("ddlPriority",$job_setup1->rate_det_id)?>><?php echo $job_setup1->job_setup2;?></option>
		      						<?php }}?>
		      					</select>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Job Title</label>
		      					<?php echo form_input(array("name"=>"txtJobTitle","id"=>"txtJobTitle","value"=>set_value("txtJobTitle"),"class"=>"form-control","placeholder"=>"Enter Job Title here..."));?>
		      				</div>
			        	</div>
					</div>
					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Job Description</label>
										<div id="txtArea">
										<?php echo form_textarea(array("name"=>"txtJobDes","id"=>"txtJobDes","value"=>set_value("txtJobDes","",false),"class"=>"form-control","placeholder"=>"Enter Job Description here..."))?>
										</div>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Job Requirement</label>
		      					<?php echo form_textarea(array("name"=>"txtJobRequirement","value"=>set_value("txtJobRequirement","",false),"id"=>"txtJobRequirement","class"=>"form-control","placeholder"=>"Enter Job Requirement here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Other Benefits</label>
		      					<?php echo form_textarea(array("name"=>"txtOtherBenefit","id"=>"txtOtherBenefit","value"=>set_value("txtOtherBenefit","",false),"class"=>"form-control","placeholder"=>"Enter Other Benefits here..."))?>
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
						      					<?php echo form_input(array("name"=>"txtContactName","id"=>"txtContactName","value"=>$account->acc_name,"class"=>"form-control","placeholder"=>"Enter Contact name here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Phone</label>
						      					<?php echo form_input(array("name"=>"txtPhone","id"=>"txtPhone","value"=>$account->acc_phone,"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
						      				</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Email</label>
						      					<?php echo form_input(array("name"=>"txtEmail","id"=>"txtEmail","value"=>$account->acc_email,"class"=>"form-control","placeholder"=>"Enter Email here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Phone 2</label>
						      					<?php echo form_input(array("name"=>"txtPhone2","id"=>"txtPhone2","class"=>"form-control","placeholder"=>"Enter Phone here..."))?>
						      				</div>
							        	</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Address</label>
												<?php echo form_input(array("name"=>"txtAddr","id"=>"txtAddr","value"=>$account->acc_addr,"class"=>"form-control","placeholder"=>"Enter Address here..."))?>
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
						      					<?php echo form_input(array("name"=>"txtPostingDate","id"=>"txtPostingDate","value"=>set_value("txtPostingDate"),"class"=>"form-control","placeholder"=>"Click on Posting date"));?>
		                                        <span class="input-group-addon" id="group1">
		                                            <span class="glyphicon glyphicon-calendar"></span>
		                                        </span>
                                    		</div>
														<input type="hidden" name="hdnPostingDate" id="hdnPostingDate" value="">
							        	</div>
							        	<div class="col-md-6">
								    		<label class="control-label">End Date</label>
						      				<div class="input-group datetimepicker">
						      					<?php echo form_input(array("name"=>"txtEndDate","id"=>"txtEndDate","value"=>set_value("txtEndDate"),"class"=>"form-control","placeholder"=>"Click on End date"));?>
		                                        <span class="input-group-addon" id="group2">
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
						      						<option value="full_time" <?php echo set_select('ddlContract','full_time')?>>Full Time</option>
						      						<option value="part_time" <?php echo set_select('ddlContract','part_time')?>>Part Time</option>
						      						<option value="<3" <?php echo set_select('ddlContract','<3')?>>Less Than 3 months</option>
						      						<option value="3,6" <?php echo set_select('ddlContract','3,6')?>>From 3 to 6 months</option>
						      						<option value="6,12" <?php echo set_select('ddlContract','6,12')?>>From 6 to 12 months</option>
						      						<option value=">1" <?php echo set_select('ddlContract','>1')?>>More Than 1 year</option>
						      						<option value="internship" <?php echo set_select('ddlContract','internship')?>>Internship</option>
						      						<option value="negotiable" <?php echo set_select('ddlContract','negotiable')?>>Negotiable</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Gender</label>
						      					<select name="ddlGender" id="ddlGender" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="m" <?php echo set_select('ddlGender','m')?>>Male</option>
						      						<option value="f" <?php echo set_select('ddlGender','f')?>>Female</option>
						      						<option value="o" <?php echo set_select('ddlGender','o')?>>Other</option>
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
						      						<option value="18,25" <?php echo set_select('ddlAge','18,25')?>>18 - 25</option>
						      						<option value="25,32" <?php echo set_select('ddlAge','25,32')?>>25 - 32</option>
						      						<option value="32,37" <?php echo set_select('ddlAge','32,37')?>>32 - 37</option>
						      						<option value="37,45" <?php echo set_select('ddlAge','37,45')?>>37 - 45</option>
						      						<option value=">=45" <?php echo set_select('ddlAge','>=45')?>>Over 45</option>
						      						<option value="unlimited" <?php echo set_select('ddlAge','unlimited')?>>Unlimited</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Salary Range</label>
						      					<select name="ddlSalaryRange" id="ddlSalaryRange" class="form-control">
						      						<option value="">Choose one</option>
															<option value="<150" <?php echo set_select('ddlSalaryRange','<150') ?>>Less than $150</option>
						      						<option value="150,300" <?php echo set_select('ddlSalaryRange','150,300')?>>$150 - $300</option>
						      						<option value="300,500" <?php echo set_select('ddlSalaryRange','300,500')?>>$300 - $500</option>
						      						<option value="500,750" <?php echo set_select('ddlSalaryRange','500,750')?>>$500 - $750</option>
						      						<option value=">=1000" <?php echo set_select('ddlSalaryRange','>=1000')?>>Over $1000</option>

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
															<option value="0,1" <?php echo set_select('ddlYearExp','0,1')?>>0 - 1 year</option>
						      						<option value="1,3" <?php echo set_select('ddlYearExp','1,3')?>>1 - 3 years</option>
						      						<option value="3,5" <?php echo set_select('ddlYearExp','3,5')?>>3 - 5 years</option>
						      						<option value="5,7" <?php echo set_select('ddlYearExp','5,7')?>>5 - 7 years</option>
						      						<option value="7,10" <?php echo set_select('ddlYearExp','7,10')?>>7 - 10 years</option>
						      						<option value=">=10" <?php echo set_select('ddlYearExp','>=10')?>>Over 10 years</option>
						      						<option value="unlimited" <?php echo set_select('ddlYearExp','unlimited')?>>Unlimited</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Education</label>
						      					<select name="ddlEducation" id="ddlEducation" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="PhD" <?php echo set_select('ddlEducation','PhD')?>>PhD</option>
						      						<option value="Master" <?php echo set_select('ddlEducation','Master')?>>Master</option>
						      						<option value="Bachelor" <?php echo set_select('ddlEducation','Bachelor')?>>Bachelor</option>
						      						<option value="Associate" <?php echo set_select('ddlEducation','Associate')?>>Associate</option>
						      						<option value="Vocational" <?php echo set_select('ddlEducation','Vocational')?>>Vocational</option>
						      						<option value="High School" <?php echo set_select('ddlEducation','High School')?>>High School</option>
						      						<option value="unspecified" <?php echo set_select('ddlEducation','unspecified')?>>Unspecified</option>
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
								    			<option value="Khmer" <?php echo set_select('ddlLang1','Khmer')?>>Khmer</option>
								    			<option value="English" <?php echo set_select('ddlLang1','English')?>>English</option>
								    			<option value="French" <?php echo set_select('ddlLang1','French')?>>French</option>
								    			<option value="Chines" <?php echo set_select('ddlLang1','Chines')?>>Chines</option>
								    			<option value="Thai" <?php echo set_select('ddlLang1','Thai')?>>Thai</option>
								    			<option value="Vietnames" <?php echo set_select('ddlLang1','Vietnames')?>>Vietnames</option>
								    			<option value="Other" <?php echo set_select('ddlLang1','o')?>>Other</option>
								    		</select>
								    	</div>

								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang2" id="ddlLang2">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php echo set_select('ddlLang2','Khmer')?>>Khmer</option>
								    			<option value="English" <?php echo set_select('ddlLang2','English')?>>English</option>
								    			<option value="French" <?php echo set_select('ddlLang2','French')?>>French</option>
								    			<option value="Chines" <?php echo set_select('ddlLang2','Chines')?>>Chines</option>
								    			<option value="Thai" <?php echo set_select('ddlLang2','Thai')?>>Thai</option>
								    			<option value="Vietnames" <?php echo set_select('ddlLang2','Vietnames')?>>Vietnames</option>
								    			<option value="Other" <?php echo set_select('ddlLang2','o')?>>Other</option>
								    		</select>
								    	</div>
								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang3" id="ddlLang3">
								    		<option value="">Choose one</option>
								    			<option value="Khmer" <?php echo set_select('ddlLang3','Khmer')?>>Khmer</option>
								    			<option value="English" <?php echo set_select('ddlLang3','English')?>>English</option>
								    			<option value="French" <?php echo set_select('ddlLang3','French')?>>French</option>
								    			<option value="Chines" <?php echo set_select('ddlLang3','Chines')?>>Chines</option>
								    			<option value="Thai" <?php echo set_select('ddlLang3','Thai')?>>Thai</option>
								    			<option value="Vietnames" <?php echo set_select('ddlLang3','Vietnames')?>>Vietnames</option>
								    			<option value="Other" <?php echo set_select('ddlLang3','o')?>>Other</option>
								    		</select>
								    	</div>
								    	<div class="col-md-3">
								    		<select class="form-control" name="ddlLang4" id="ddlLang4">
								    			<option value="">Choose one</option>
								    			<option value="Khmer" <?php echo set_select('ddlLang4','Khmer')?>>Khmer</option>
								    			<option value="English" <?php echo set_select('ddlLang4','English')?>>English</option>
								    			<option value="French" <?php echo set_select('ddlLang4','French')?>>French</option>
								    			<option value="Chines" <?php echo set_select('ddlLang4','Chines')?>>Chines</option>
								    			<option value="Thai" <?php echo set_select('ddlLang4','Thai')?>>Thai</option>
								    			<option value="Vietnames" <?php echo set_select('ddlLang4','Vietnames')?>>Vietnames</option>
								    			<option value="Other" <?php echo set_select('ddlLang4','o')?>>Other</option>
								    		</select>
								    	</div>
								    </div>

								    <div class="row">
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Hiring Quantities</label>
						      					<?php echo form_input(array("name"=>"txtHiringQty","id"=>"txtHiringQty","value"=>set_value("txtHiringQty"),"class"=>"form-control","placeholder"=>"Enter Hiring Quantities here..."));?>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Category</label>
						      					<select name="ddlCategory" id="ddlCategory" class="form-control">
						      						<option value="">Choose one</option>
						      						<?php if($category==TRUE){foreach($category as $category1){?>
						      						<option value="<?php echo $category1->cat_id;?>" <?php echo set_select('ddlCategory',$category1->cat_id)?>><?php echo $category1->cat_name;?></option>
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
						      						<option value="<?php echo $location1->loc_id;?>" <?php echo set_select('ddlLocation',$location1->loc_id)?>><?php echo $location1->loc_name;?></option>
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
							<input type="reset" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">
							<!-- <input type="submit" name="btnSave" id="btnSave" class="btn btn-default" value="Save"> -->

							<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success pull-right" value="Submit">
						</div>
					</div><!--==== end button action ====-->


				<div class="row" style="margin-top: 20px"><!--==== show post history ====-->
					<div class="col-md-12">
						<button class="btn btn-success btn-md btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show Job Posting Histories</button>
						<div class="collapse" id="collapseExample">
						  <div class="well">
						    <div class="panel panel-default">
								<div class="panel-heading">Job Posting Histories</div>
									<div class="panel-body">
										<table class="table table-trip">
											<tr>
												<th>No</th>
												<th>Job ID</th>
												<th>Function</th>
												<th>Post Date</th>
												<th>Closed Date</th>
												<th>Expired Date</th>
												<th>Status</th>
												<th>Priority</th>
												<th>Action</th>
												<!-- <th>Edit | Delete</th> -->
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
												<td><?php echo $p_h->expired_date; ?></td>
												<td><?php echo $p_h->post_job_status;?></td>
												<td><?php echo $p_h->rate_det_type;?></td>
												<!-- <td><?php echo $p_h->post_job_action;?></td> -->
												<!-- <td><a href="<?php echo base_url('job_c/post_job_edit/'.$p_h->post_job_id)?>" style="margin-right:5px;">Edit</a><a href="<?php echo base_url('job_c/delete/'.$p_h->post_job_id)?>">Delete</a></td> -->
												<td><a href="<?php echo base_url('job_c/preview/'.$p_h->post_job_id.'')?>">Preview</a>|
													<a href="#" data-toggle="modal" data-target="#myModal" onclick="deleteJob('<?php echo $p_h->post_job_id?>')">Delete</a></td>
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




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm Delete!</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this?
				<input type="hidden" name="hiddenID" id="hiddenID" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="btnYes">Yes</button>
      </div>
    </div>
  </div>
</div>

<?php echo form_close();?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#txtPostingDate").click(function(){
			$("#group1.input-group-addon").trigger("click");
		});
		$("#txtEndDate").click(function(){
			$("#group2.input-group-addon").trigger("click");
		});
	});

	function deleteJob(id){
		$("#hiddenID").val(id);
	}
	$("#btnYes").click(function(){
		var id = $("#hiddenID").val();
		window.location.assign("<?php echo base_url()?>job_c/delete/"+id);
	});
</script>
<script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
<script>
		tinymce.init({
		forced_root_block : "",
			selector: 'textarea',
			height: 300,
			plugins: [
						"advlist autolink lists link image charmap print preview anchor",
						"searchreplace visualblocks code fullscreen",
						"insertdatetime media table contextmenu paste imagetools"
				],
				 menubar : false,
				 toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent imageupload",
					  setup: function(editor) {
							editor.on('keyup', function(e) {
							var ctrVal = e.target.outerText;
							var ctrName = e.target.dataset.id;
							if(ctrName=="txtJobDes")
							{
									$("#mceu_13").attr("style","border:1px solid #ccc;");
							}else if(ctrName=="txtJobRequirement"){
									$("#mceu_38").attr("style","border:1px solid #ccc;");
							}else if(ctrName=="txtOtherBenefit"){
									$("#mceu_63").attr("style","border:1px solid #ccc;");
							}

			});
						},
			imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
			content_css: [
				'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
				'//www.tinymce.com/css/codepen.min.css'
			]

		});
		var valid = true;
		$("#btnSubmit").click(function(e){
			valid = true;
			hightlightCtrl("ddlPriority");
			hightlightCtrl("txtJobTitle");
			hightlightCtrl("txtJobDes");
			hightlightCtrl("txtJobRequirement");
			hightlightCtrl("txtOtherBenefit");
			hightlightCtrl("txtContactName");
			hightlightCtrl("txtAddr");
			hightlightCtrl("txtPostingDate");
			hightlightCtrl("txtEndDate");
			hightlightCtrl("ddlContract");
			hightlightCtrl("ddlGender");
			hightlightCtrl("ddlAge");
			hightlightCtrl("ddlSalaryRange");
			hightlightCtrl("ddlYearExp");
			hightlightCtrl("ddlEducation");
			hightlightCtrl("ddlLang1");
			hightlightCtrl("txtHiringQty");
			hightlightCtrl("ddlCategory");
			hightlightCtrl("ddlLocation");
			if(valid==false)
			{
				e.preventDefault();
			}else{

			}
		});

		$("#ddlPriority").change(function()
		{
			highlightDefault("ddlPriority");
		});
		$("#txtJobTitle").change(function(){
			highlightDefault("txtJobTitle");
		});
		$("#txtJobDes").change(function(){
			highlightDefault("txtJobDes");
		});
		$("#txtJobRequirement").change(function(){
			highlightDefault("txtJobRequirement");
		});
		$("#txtOtherBenefit").change(function(){
			highlightDefault("txtOtherBenefit");
		});
		$("#txtPostingDate").mouseout(function(){
			var val = $("#txtPostingDate")[0].value;
			if(val!="")
			{
				highlightDefault("txtPostingDate");
			}
		});
		$("#txtEndDate").mouseout(function(){
			var val = $("#txtEndDate")[0].value;
			if(val!="")
			{
				highlightDefault("txtEndDate");
			}
		});
		$("#ddlContract").change(function(){
			highlightDefault("ddlContract");
		});
		$("#ddlGender").change(function(){
			highlightDefault("ddlGender");
		});
		$("#ddlAge").change(function(){
			highlightDefault("ddlAge");
		});
		$("#ddlSalaryRange").change(function(){
			highlightDefault("ddlSalaryRange");
		});
		$("#ddlYearExp").change(function(){
			highlightDefault("ddlYearExp");
		});
		$("#ddlEducation").change(function(){
			highlightDefault("ddlEducation");
		});
		$("#ddlLang1").change(function(){
			highlightDefault("ddlLang1");
		});
		$("#txtHiringQty").change(function(){
			highlightDefault("txtHiringQty");
		});
		$("#ddlCategory").change(function(){
			highlightDefault("ddlCategory");
		});
		$("#ddlLocation").change(function(){
			highlightDefault("ddlLocation");
		});
		$("#txtJobDes").change(function(){
			highlightDefault("txtJobDes");
		});
		$("#txtJobRequirement").change(function(){
			highlightDefault("txtJobRequirement");
		});
		$("#txtOtherBenefit").change(function(){
			highlightDefault("txtOtherBenefit");
		});
		// ============This function is used for highlight border control red whenever its value is not entered================
		function hightlightCtrl(ctrlName){
			if(ctrlName=="txtJobDes")
			{
				var ctrl = tinymce.get("txtJobDes").getContent();

				if(ctrl=="")
				{
						$("#mceu_13").attr("style","border:2px solid red;");
						valid=false;
				}
			}
			else if(ctrlName=="txtJobRequirement")
			{
				var ctrl = tinymce.get("txtJobRequirement").getContent();;
				if(ctrl=="")
				{
						$("#mceu_38").attr("style","border:2px solid red;");
						valid=false;
				}
			}
			else if(ctrlName=="txtOtherBenefit")
			{
				var ctrl = tinymce.get("txtOtherBenefit").getContent();;
				if(ctrl=="")
				{
						$("#mceu_63").attr("style","border:2px solid red;");
						valid=false;
				}
			}
			else {
				var ctrl = $("#"+ctrlName).val();
				if(ctrl=="")
				{
						$("#"+ctrlName).attr("style","border:2px solid red;");
						valid=false;
				}
			}
		}

		// ====================This function is used for reset the control default border color=========================
		function highlightDefault(ctrlName)
		{
			if(ctrlName=="txtJobDes")
			{
				$("#mceu_13").attr("style","border:1px solid #ccc;");
			}else if(ctrlName=="txtJobRequirement")
			{
				$("#mceu_38").attr("style","border:1px solid #ccc;");
			}else if(ctrlName=="txtOtherBenefit")
			{
				$("#mceu_63").attr("style","border:1px solid #ccc;");
			}else {
				$("#"+ctrlName).attr("style","border:1px solid #ccc;");
			}
		}

		$("#btnDelete").click(function(){
			var my_editor_id = 'content';
			tinymce.get("#txtJobDes").setContent('');
			tinymce.get("#txtJobRequirement").setContent('');
			tinymce.get("#txtOtherBenefit").setContent('');
		});
</script>
