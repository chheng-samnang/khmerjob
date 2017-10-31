<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>
<?php echo form_open_multipart("cv_c/add/$url","id='form' name='form'");?>
	<input type="hidden" name="txtUrl" value="<?php echo $url?>">
	<div class="col-md-3"><!--=====side bar button ======-->
		<div class="list-group">
		  <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item">Account Information</a>
		  <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item">Post Job</a>
		  <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item active1">Post CV</a>
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
		      					<label class="control-label">CV ID</label>
		      					<?php echo form_input(array("name"=>"txtCvID","id"=>"txtCvID","value"=>$cv_code,"class"=>"form-control","readonly"=>"readonly"));?>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Priority</label>
		      					<select name="ddlPriority" id="ddlPriority" class="form-control">
		      						<option value="">Choose one</option>
		      						<?php if(isset($cv_setup)){foreach($cv_setup as $cv_setup1){?>
		      							<option value="<?php echo $cv_setup1->rate_det_id;?>" <?php echo set_select("ddlPriority",$cv_setup1->rate_det_id)?>><?php echo $cv_setup1->cv_setup2;?></option>
		      						<?php }}?>
		      					</select>
		      				</div>
			        	</div>
					</div>

					<div class="row">
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Position Matched</label>
		      					<?php echo form_input(array("name"=>"txtPosition","id"=>"txtPosition","class"=>"form-control","value"=>set_value("txtPosition")));?>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
				    		<div class="form-group">
		      					<label class="control-label">Expected Salary</label>
		      					<select name="ddlExpSalary" id="ddlExpSalary" class="form-control">
		      						<option value="">Choose one</option>
											<option value="<150" <?php echo set_select('ddlExpSalary','<150')?>>Less than $150</option>
		      						<option value="150,300" <?php echo set_select('ddlExpSalary','150,300')?>>$150 - $300</option>
		      						<option value="300,500" <?php echo set_select('ddlExpSalary','300,500')?>>$300 - $500</option>
		      						<option value="500,750" <?php echo set_select('ddlExpSalary','500,750')?>>$500 - $750</option>
		      						<option value="750,1000" <?php echo set_select('ddlExpSalary','750,1000')?>>$750 - $1000</option>
		      						<option value=">=1000" <?php echo set_select('ddlExpSalary','>=1000')?>>Over $1000</option>
		      						<option value="negotiable" <?php echo set_select('ddlExpSalary','negotiable')?>>Negotiable</option>
		      					</select>
		      				</div>
				    	</div>
					</div>

					<div class="row">
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
		      						<option value=">=10" <?php echo set_select('ddlYearExp','>=10')?>>More than 10 years</option>
		      						<option value="unlimited" <?php echo set_select('ddlYearExp','unlimited')?>>Unlimited</option>
		      					</select>
		      				</div>
				    	</div>
					</div>

					<div class="row"><!-- ====form contact us====-->
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-6">
								    		<label class="control-label">Image</label>
			                                  <div class="form-group">
			                                    <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">
			                                    Upload Image
			                                    </button>
			                                  </div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Name</label>
						      					<?php echo form_input(array("name"=>"txtName","id"=>"txtName","value"=>set_value("txtName"),"class"=>"form-control","placeholder"=>"Enter Name here..."));?>
						      				</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Tel 1</label>
						      					<?php echo form_input(array("name"=>"txtPhone","id"=>"txtPhone","value"=>set_value("txtPhone"),"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Tel 2</label>
						      					<?php echo form_input(array("name"=>"txtPhone2","id"=>"txtPhone2","value"=>set_value("txtPhone2"),"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
						      				</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Email</label>
						      					<?php echo form_input(array("name"=>"txtEmail","id"=>"txtEmail","value"=>set_value("txtEmail"),"class"=>"form-control","placeholder"=>"Enter Email here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Facebook</label>
						      					<?php echo form_input(array("name"=>"txtFacebook","id"=>"txtFacebook","value"=>set_value("txtFacebook"),"class"=>"form-control","placeholder"=>"Enter Facebook here..."))?>
						      				</div>
							        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Twitter</label>
						      					<?php echo form_input(array("name"=>"txtTwitter","id"=>"txtTwitter","value"=>set_value("txtTwitter"),"class"=>"form-control","placeholder"=>"Enter Twitter here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">G+</label>
						      					<?php echo form_input(array("name"=>"txtG+1","id"=>"txtG+1","value"=>set_value("txtG+1"),"class"=>"form-control","placeholder"=>"Enter G+1 here..."))?>
						      				</div>
							        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">LinkedIn</label>
						      					<?php echo form_input(array("name"=>"txtLinkedIn","id"=>"txtLinkedIn","value"=>set_value("txtLinkedIn"),"class"=>"form-control","placeholder"=>"Enter LinkedIn here..."))?>
						      				</div>
							       </div>
					        	<div class="col-md-6">
				      				<div class="form-group">
				      					<label class="control-label">Place of Birth</label>
				      					<?php echo form_input(array("name"=>"txtPOB","id"=>"txtPOB","value"=>set_value("txtPOB"),"class"=>"form-control","placeholder"=>"Enter Place of Birth here..."))?>
				      				</div>
					        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Marital Status</label>
						      					<select name="ddlMaritalSta" id="ddlMaritalSta" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="Single" <?php echo set_select('ddlMaritalSta','Single')?>>Single</option>
						      						<option value="Married" <?php echo set_select('ddlMaritalSta','Married')?>>Married</option>
						      						<option value="Divorced" <?php echo set_select('ddlMaritalSta','Divorced')?>>Divorced</option>
						      						<option value="Widow" <?php echo set_select('ddlMaritalSta','Widow')?>>Widow</option>
						      						<option value="Widower" <?php echo set_select('ddlMaritalSta','Widower')?>>Widower</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Nationality</label>
						      					<?php echo form_input(array("name"=>"txtNationality","id"=>"txtNationality","value"=>set_value("txtNationality"),"class"=>"form-control","placeholder"=>"Enter Nationality here..."))?>
						      				</div>
							        	</div>
							        </div>

									<div class="row">
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
											<div class="col-md-6">
									    		<label class="control-label">Date of Birth</label>
							      				<div class="input-group datetimepicker">
							      					<?php echo form_input(array("name"=>"txtDOB","id"=>"txtDOB","value"=>set_value("txtDOB"),"class"=>"form-control","placeholder"=>"Click Date of Birth here..."));?>
			                                        <span class="input-group-addon">
			                                            <span class="glyphicon glyphicon-calendar"></span>
			                                        </span>
	                                    		</div>
								        	</div>
									</div>

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
								      					<label class="control-label">Current Address</label>
								      					<?php echo form_input(array("name"=>"txtAddr","id"=>"txtAddr","value"=>set_value("txtAddr"),"class"=>"form-control","placeholder"=>"Enter Address here..."));?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--end form contact us-->

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Work Experience</label>
		      					<?php echo form_textarea(array("name"=>"txtExperience","id"=>"txtExperience","value"=>set_value("txtExperience"),"class"=>"form-control","placeholder"=>"Enter Experience here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Education</label>
		      					<?php echo form_textarea(array("name"=>"txtEducation","id"=>"txtEducation","value"=>set_value("txtEducation"),"class"=>"form-control","placeholder"=>"Enter Education here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Language</label>
		      					<?php echo form_textarea(array("name"=>"txtLanguage","id"=>"txtLanguage","value"=>set_value("txtLanguage"),"class"=>"form-control","placeholder"=>"Enter Language here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Computer</label>
		      					<?php echo form_textarea(array("name"=>"txtComputer","id"=>"txtComputer","value"=>set_value("txtComputer"),"class"=>"form-control","placeholder"=>"Enter Computer here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Other Skill</label>
		      					<?php echo form_textarea(array("name"=>"txtOtherSkill","id"=>"txtOtherSkill","value"=>set_value("txtOtherSkill"),"class"=>"form-control","placeholder"=>"Enter OtherSkill here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Short Course Training</label>
		      					<?php echo form_textarea(array("name"=>"txtShortCouseTr","id"=>"txtShortCouseTr","value"=>set_value("txtShortCouseTr"),"class"=>"form-control","placeholder"=>"Enter Short Couse Training here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Reference</label>
		      					<?php echo form_textarea(array("name"=>"txtReference","id"=>"txtReference","value"=>set_value("txtReference"),"class"=>"form-control","placeholder"=>"Enter Reference here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Hobby</label>
		      					<?php echo form_textarea(array("name"=>"txtHobby","id"=>"txtHobby","value"=>set_value("txtHobby"),"class"=>"form-control","placeholder"=>"Enter Hobby here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">About Me</label>
		      					<?php echo form_textarea(array("name"=>"txtAboutMe","id"=>"txtAboutMe","value"=>set_value("txtAboutMe"),"class"=>"form-control","placeholder"=>"Enter About Me here..."))?>
		      				</div>
			        	</div>
					</div>
					STATUS
					<div class="row">
			        	<div class="col-md-12">
		      				<label class="radio-inline">
		      					<input type="radio" name="cv_status" id="cv_status" value="1" checked/> Show my CV
							</label>
							<label class="radio-inline">
								<input type="radio" name="cv_status" id="cv_status" value="0"/> Hide my CV
							</label>
			        	</div>
					</div>
					<hr><p>I hereby declare all Information above are valid.</p>

					 <div class="row">
	                      <div class="col-lg-12">
	                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                            <div class="modal-dialog" role="document">
	                              <div class="modal-content">
	                                <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Browse Image</h4>
	                                </div>
	                                <div class="modal-body">
	                                <input  type="file" name="txtUpload"/>
	                                <input type="hidden" id="txtImgName" name="txtImgName" />
																	<div id="loading" style="display:none;">
																			<img src='<?php echo base_url("assets/loading/loading.gif")?>' alt='loading' style='width:70px;'/>
																	</div>
	                                <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
	                                </div>
	                                <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
	                                </div>
	                              </div>
	                            </div>
	                          </div>
	                      </div>
	                  </div>


					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">
							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">
							<input type="reset" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">
							<!--<input type="submit" name="btnSave" id="btnSave" class="btn btn-default" value="Save"> -->
							<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success pull-right" value="Submit">
						</div>
					</div><!--==== end button action ====-->
	</div><!--===== end form post job ======-->
	</div></div></div>
<?php echo form_close();?>
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
								var modify = $("#txtModify").val();
								if(modify!="2")
								{
									$("#btnSubmit_edit").attr("style","display:none");
									$("#btnUpdate").attr("style","display:block");
									$("#txtModify").val(1);
								}

			});
						},
			imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
			content_css: [
				'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
				'//www.tinymce.com/css/codepen.min.css'
			]

		});
</script>
<script>
	function uploadFile() {
		var txtImg = $("#txtUpload").val();
		if(txtImg!="")
		{
			var formData = new FormData();
			formData.append('image', $('input[type=file]')[0].files[0]);
			$.ajax({
				url: '<?php echo base_url()?>ng/upload.php',
				data: formData,
				type: 'POST',
				// THIS MUST BE DONE FOR FILE UPLOADING
				contentType: false,
				processData: false,
				// ... Other options like success and etc

				success: function(data) {
					$("#loading").attr("style","display:block");
					setTimeout(hide, 1000); // 5 seconds

					document.getElementById("txtImgName").value = data;
				}
			});
		}else {
			alert("You must choose an Image to upload.");
			return 0;
		}
	}
	hide = function()
	{
			$("#loading").attr("style","display:none");
			document.getElementById("response").innerText = "Upload Complete!";
	};
	$(document).ready(function(){
		$("#txtDOB").click(function(){
			$(".input-group-addon").trigger("click");
		});
	});
</script>
