
<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>

<?php echo form_open_multipart("cv_c/add/$url","id='form' name='form'");?>
	<input type="hidden" name="txtModify" id="txtModify" value="">
	<input type="hidden" name="txtStatus" value="<?php echo $edit->post_cv_status?>">
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
		      					<!-- <select name="ddlPriority" id="ddlPriority" class="form-control" <?php echo ($edit->post_cv_status!="Saved" AND $edit->post_cv_status=="Submited")?"disabled":NULL;?>> -->
										<select name="ddlPriority" id="ddlPriority" class="form-control">
		      						<option value="">Choose one</option>
		      						<?php if(isset($cv_setup)){foreach($cv_setup as $cv_setup1){?>
		      							<option value="<?php echo $cv_setup1->rate_det_id;?>" <?php if(isset($edit)){if($edit->priority==$cv_setup1->rate_det_id){echo "selected";}}?>><?php echo $cv_setup1->cv_setup2;?></option>
		      						<?php }}?>
		      					</select>
										<input type="hidden" name="txtPriority" value="<?php echo $edit->priority?>">
		      				</div>
			        	</div>
					</div>
					<div class="row">
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Position Matched</label>
		      					<?php echo form_input(array("name"=>"txtPosition","id"=>"txtPosition","class"=>"form-control","value"=>$edit->position));?>
		      				</div>
			        	</div>
			        	<div class="col-md-6">
				    		<div class="form-group">
		      					<label class="control-label">Expected Salary</label>
		      					<select name="ddlExpSalary" id="ddlExpSalary" class="form-control">
		      						<option value="">Choose one</option>
									<option value="<150" <?php if($edit->salary=="<150"){echo "selected";}?>>Less than $150</option>
		      						<option value="150,300" <?php if($edit->salary=="150,300"){echo "selected";}?>>$150 - $300</option>
		      						<option value="300,500" <?php if($edit->salary=="300,500"){echo "selected";}?>>$300 - $500</option>
		      						<option value="500,750" <?php if($edit->salary=="500,750"){echo "selected";}?>>$500 - $750</option>
		      						<option value="750,1000" <?php if($edit->salary=="750,1000"){echo "selected";}?>>$750 - $1000</option>
		      						<option value=">=1000" <?php if($edit->salary==">=1000"){echo "selected";}?>>Over $1000</option>
		      						<option value="negotiable" <?php if($edit->salary=="negotiable"){echo "selected";}?>>Negotiable</option>
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
		      						<option value="<?php echo $category1->cat_id;?>" <?php if(isset($edit)){if($edit->cat_id==$category1->cat_id){echo "selected";}}?>><?php echo $category1->cat_name;?></option>
		      						<?php }}?>
		      					</select>
		      				</div>
				    	</div>
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
		      						<option value=">=10" <?php if($edit->year_exp==">=10"){echo "selected";}?>>More than 10 years</option>
		      						<!-- <option value="unlimited" <?php if($edit->year_exp=="unlimited"){echo "selected";}?>>Unlimited</option> -->
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
			                                    </button><img id="img_src" name="img_scr" src="<?php echo base_url('assets/uploads/'.$edit->photo)?>" style="width:90px; margin-left:10px;">
			                                  </div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Name</label>
						      					<?php echo form_input(array("name"=>"txtName","id"=>"txtName","value"=>$edit->name,"class"=>"form-control","placeholder"=>"Enter Name here..."));?>
						      				</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Tel 1</label>
						      					<?php echo form_input(array("name"=>"txtPhone","id"=>"txtPhone","value"=>$edit->phone,"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Tel 2</label>
						      					<?php echo form_input(array("name"=>"txtPhone2","id"=>"txtPhone2","value"=>$edit->tel2,"class"=>"form-control","placeholder"=>"Enter Phone here..."));?>
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
						      					<label class="control-label">Facebook</label>
						      					<?php echo form_input(array("name"=>"txtFacebook","id"=>"txtFacebook","value"=>$edit->fb,"class"=>"form-control","placeholder"=>"Enter Facebook here..."))?>
						      				</div>
							        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Twitter</label>
						      					<?php echo form_input(array("name"=>"txtTwitter","id"=>"txtTwitter","value"=>$edit->twitter,"class"=>"form-control","placeholder"=>"Enter Twitter here..."));?>
						      				</div>
										</div>
										<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">G+</label>
						      					<?php echo form_input(array("name"=>"txtG+1","id"=>"txtG+1","value"=>$edit->G1,"class"=>"form-control","placeholder"=>"Enter G+1 here..."))?>
						      				</div>
							        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">

												<label class="control-label">LinkedIn</label>

														<?php echo form_input(array("name"=>"txtLinkedIn","id"=>"txtLinkedIn","value"=>$edit->linkedIn,"class"=>"form-control","placeholder"=>"Enter LinkedIn here..."))?>
												</div>

							        	<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Place of Birth</label>
						      					<?php echo form_input(array("name"=>"txtPOB","id"=>"txtPOB","value"=>$edit->pob,"class"=>"form-control","placeholder"=>"Enter Place of Birth here..."))?>
						      				</div>
							        	</div>
									</div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Marital Status</label>
						      					<select name="ddlMaritalSta" id="ddlMaritalSta" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="Single" <?php if($edit->marital_status=="Single"){echo "selected";}?>>Single</option>
						      						<option value="Married" <?php if($edit->marital_status=="Married"){echo "selected";}?>>Married</option>
						      						<option value="Divorced" <?php if($edit->marital_status=="Divorced"){echo "selected";}?>>Divorced</option>
						      						<option value="Widow" <?php if($edit->marital_status=="Widow"){echo "selected";}?>>Widow</option>
						      						<option value="Widower" <?php if($edit->marital_status=="Widower"){echo "selected";}?>>Widower</option>
						      					</select>
						      				</div>
								    	</div>
								    	<div class="col-md-6">
						      				<div class="form-group">
						      					<label class="control-label">Nationality</label>
						      					<?php echo form_input(array("name"=>"txtNationality","id"=>"txtNationality","value"=>$edit->nationality,"class"=>"form-control","placeholder"=>"Enter Nationality here..."))?>
						      				</div>
							        	</div>
							        </div>

									<div class="row">
										<div class="col-md-6">
								    		<div class="form-group">
						      					<label class="control-label">Gender</label>
						      					<select name="ddlGender" id="ddlGender" class="form-control">
						      						<option value="">Choose one</option>
						      						<option value="m" <?php if($edit->gender=="m"){echo "selected";}?>>Male</option>
						      						<option value="f"<?php if($edit->gender=="f"){echo "selected";}?>>Female</option>
						      						<option value="o" <?php if($edit->gender=="o"){echo "selected";}?>>Other</option>
						      					</select>
						      				</div>
								    	</div>
											<div class="col-md-6">
									    		<label class="control-label">Date of Birth</label>
							      				<div class="input-group datetimepicker">
							      					<?php echo form_input(array("name"=>"txtDOB","id"=>"txtDOB","value"=>set_value("txtDOB",date("d-m-Y",strtotime($edit->dob))),"class"=>"form-control","placeholder"=>"Click Date of Birth here..."));?>
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
							      					<?php echo form_input(array("name"=>"txtAddr","id"=>"txtAddr","value"=>$edit->addr,"class"=>"form-control","placeholder"=>"Enter Address here..."));?>
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
		      					<?php echo form_textarea(array("name"=>"txtExperience","id"=>"txtExperience","value"=>$edit->work_exp,"class"=>"form-control","placeholder"=>"Enter Experience here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Education</label>
		      					<?php echo form_textarea(array("name"=>"txtEducation","id"=>"txtEducation","value"=>$edit->edu,"class"=>"form-control","placeholder"=>"Enter Education here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Language</label>
		      					<?php echo form_textarea(array("name"=>"txtLanguage","id"=>"txtLanguage","value"=>$edit->lang,"class"=>"form-control","placeholder"=>"Enter Language here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Computer</label>
		      					<?php echo form_textarea(array("name"=>"txtComputer","id"=>"txtComputer","value"=>$edit->computer,"class"=>"form-control","placeholder"=>"Enter Computer here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Other Skills</label>
		      					<?php echo form_textarea(array("name"=>"txtOtherSkill","id"=>"txtOtherSkill","value"=>$edit->other_skill,"class"=>"form-control","placeholder"=>"Enter OtherSkill here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Short Course Training</label>
		      					<?php echo form_textarea(array("name"=>"txtShortCouseTr","id"=>"txtShortCouseTr","value"=>$edit->short_course,"class"=>"form-control","placeholder"=>"Enter Short Couse Training here..."))?>
		      				</div>
			        	</div>
					</div>
					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Reference</label>
		      					<?php echo form_textarea(array("name"=>"txtReference","id"=>"txtReference","value"=>$edit->ref,"class"=>"form-control","placeholder"=>"Enter Reference here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">Hobby</label>
		      					<?php echo form_textarea(array("name"=>"txtHobby","id"=>"txtHobby","value"=>$edit->hobby,"class"=>"form-control","placeholder"=>"Enter Hobby here..."))?>
		      				</div>
			        	</div>
					</div>

					<div class="row">
			        	<div class="col-md-12">
		      				<div class="form-group">
		      					<label class="control-label">About Me</label>
		      					<?php echo form_textarea(array("name"=>"txtAboutMe","id"=>"txtAboutMe","value"=>$edit->about_me,"class"=>"form-control","placeholder"=>"Enter About Me here..."))?>
		      				</div>
			        	</div>
					</div>
					STATUS
					<div class="row">
			        	<div class="col-md-12">
		      				<label class="radio-inline">
		      					<input type="radio" name="cv_status" id="cv_status" value="1" <?php echo $edit->cv_status=='1'?'checked':NULL?>/> Show my CV
							</label>
							<label class="radio-inline">
								<input type="radio" name="cv_status" id="cv_status" value="0" <?php echo $edit->cv_status=='0'?'checked':NULL?>/> Hide my CV
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
		                                <input  type="file" name="txtUpload" id="txtUpload"/>
										<!-- <img src="<?php echo base_url("assets/loading/loading.gif")?>" alt="" style="width:70px;"> -->
		                                <input type="hidden" id="txtImgName" name="txtImgName" value="<?php echo set_value("txtImgName",$edit->photo)?>"/>
											<div id="loading" style="display:none;">
												<img src='<?php echo base_url("assets/loading/loading.gif")?>' alt='loading' style='width:70px;'/>
											</div>
		                                <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
	                                </div>
	                                <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <button type="button" class="btn btn-primary" onclick="uploadFile()" id="btnUpload">Upload</button>
	                                </div>
	                              </div>
	                            </div>
	                          </div>
	                      </div>
	                  </div>
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">

							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">
							<a href="<?php echo base_url("cv_c/delete/$cv_code")?>" class="btn btn-default confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?" >Delete</a>
						<!--<input type="submit" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">-->
							<input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-success pull-right" value="Submit" style="display:none;">
							<input type="submit" name="btnSubmit_edit" id="btnSubmit_edit" class="btn btn-success pull-right" value="Submit" style="display:block;" <?php echo ($edit->post_cv_status!="Saved")?"disabled":NULL;?>>

						</div>
					</div><!--==== end button action ====-->
					<hr>
					<label class="control-label">Your CV Status: </label> <?php echo $edit->post_cv_status;?> <br>
					<label class="control-label">Your CV Visibility: </label> <?php echo $edit->cv_status=="1"?"Show":"Hide";?>
					<button type="button" id="btnMsg" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#msgModal" style="display:none;">
					</button>
					<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="msgModal">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="gridSystemModalLabel" style="color:green;">Congratulation!</h4>
						      </div>
						      <div class="modal-body">
						        <div class="row">
											<div class="col-lg-12">
													<p>Your information has been submitted successfully!</p>
											</div>

						        </div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->



	</div><!--===== end form post job ======-->
	</div></div></div>
	<?php echo form_close();?>
	<script>
	var value="<?php if(isset($modify)){ echo $modify; } ?>";
	if(value==1){
		$("#btnSubmit_edit").attr("style","display:none");
		$("#btnUpdate").attr("style","display:block");
		$("#txtModify").val(1);
	}
	function uploadFile(){
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
					var x= document.getElementById("txtImgName").value = data;
					var old_img = document.getElementById("img_src");
				 	old_img.src="<?php echo base_url('assets/uploads');?>/"+x;
				}
			});
		}else{
			alert("You must choose an Image to upload.");
			return 0;
		}
	}

	hide = function(){
			$("#loading").attr("style","display:none");
			document.getElementById("response").innerText = "Upload Complete!";
		};
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
				/*toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",*/
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
<script type="text/javascript">
	$(document).ready(function(){
		var modify = $("#txtModify").val();
		var msg = "<?php echo $this->session->flashdata('msg'); ?>";
		if(modify=="2")
		{
			$("#btnSubmit_edit").removeAttr("disabled");
		}else if(modify=="1")
		{
			$("#btnSubmit_edit").attr("style","display:none;");
			$("#btnUpdate").attr("style","display:block;");
		}
		if(msg!="")
		{
			$("#btnMsg").trigger("click");
		}
	});

</script>
<script type="text/javascript">
	function deleted()
	{	
			if (confirm("Are you sure..!") == true){
					document.getElementById("form").submit();
			}
	}

	 	
	 	
	$("#ddlPriority").change(function(){
		var priority = $("#ddlPriority").val();
		if(priority=="<?php echo $edit->priority?>")
		{

			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}else {
			$("#btnSubmit_edit").removeAttr("disabled");
			$("#btnSubmit_edit").attr("style","display:block");
			$("#btnUpdate").attr("style","display:none");
			$("#txtModify").val(2);
		}

	});
	var val="<?php if(isset($modify)){echo $modify;}?>"

	$("#txtPosition").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtPhone2").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#ddlExpSalary").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#ddlCategory").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#ddlYearExp").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtName").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtAddr").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#btnUpload").click(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtPhone").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtEmail").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtFacebook").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtTwitter").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtG+1").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtDOB").focusout(function(){
		var val = $("#txtDOB")[0].defaultValue;
		var changed = $("#txtDOB").val();
		if(val!==changed)
		{
			var modify = $("#txtModify").val();
			if(modify!="2")
			{
				$("#btnSubmit_edit").attr("style","display:none");
				$("#btnUpdate").attr("style","display:block");
				$("#txtModify").val(1);
			}
		}
	});


	$("#txtPOB").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#ddlMaritalSta").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtNationality").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#ddlGender").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});

	$("#txtExperience").change(function(){
		var modify = $("#txtModify").val();
		if(modify!="2")
		{
			$("#btnSubmit_edit").attr("style","display:none");
			$("#btnUpdate").attr("style","display:block");
			$("#txtModify").val(1);
		}
	});
	$(document).ready(function(){
		$('input[type="radio"][name="cv_status"]').change(function(){
			var modify = $("#txtModify").val();
						if(modify!="2")
						{
							$("#btnSubmit_edit").attr("style","display:none");
							$("#btnUpdate").attr("style","display:block");
							$("#txtModify").val(1);
						}
		});
	});
$(document).ready(function(){
	$("#txtDOB").click(function(){
		$(".input-group-addon").trigger("click");
	});
});

</script>
