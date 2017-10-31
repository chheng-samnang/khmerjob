<?php $btn='';echo form_open_multipart("skill_c/add_skill","id='form' name='form'");?>
<div ng-app="myApp" ng-controller="myCtrl" ng-cloak>

	<div class="col-md-3"><!--=====side bar button ======-->
		<div class="list-group">
			<a href="<?php echo base_url('user_account/account_info')?>" class="list-group-item">Account Information</a>
			<a href="<?php echo base_url('job_c/post_job')?>" class="list-group-item">Post Job</a>
			<a href="<?php echo base_url('cv_c/post_cv')?>" class="list-group-item">Post CV</a>
			<a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item active1">Post Skill</a>
			<a href="<?php echo base_url('ads_c/post_ads')?>" class="list-group-item">Advertisement</a>
			<a href="<?php echo base_url('bundle_package_c/index')?>" class="list-group-item">Purchase Bundle Package</a>
			<a href="<?php echo base_url('cv_paid_search_c/index');?>" class="list-group-item">Purchase CV Paid Search</a>
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
							if(validation_errors())
							{
						?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>Attention!</strong><?php echo validation_errors();?>
							</div>
						<?php }?>
						</div>
					</div>
						<!---=====End Error validation=====-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Skill ID</label>
								<?php echo form_input(array("name"=>"txtSkillID","id"=>"txtSkillID","value"=>$skill_code,"class"=>"form-control","readonly"=>"readonly"));?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Priority</label>
								<select name="ddlPriority" id="ddlPriority" class="form-control">
									<option value="">Choose one</option>
									<?php if(isset($skill_setup)){foreach($skill_setup as $job_setup1){?>
										<option value="<?php echo $job_setup1->rate_det_id;?>" <?php echo set_select("ddlPriority",$job_setup1->rate_det_id)?>><?php echo $job_setup1->rate_det_type." ";echo $job_setup1->duration!=0?$job_setup1->duration." Days":" Unlimited";?></option>
									<?php }}?>
								</select>
							</div>
						</div>								
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Location</label>
								<select class="form-control" name="ddlLocation">
									<option value="0">Choose One</option>
									<?php foreach ($location as $key => $value) {?>
											<option value="<?php echo $value->loc_id?>" <?php echo set_select("ddlLocation",$value->loc_id)?>><?php echo $value->loc_name ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Category</label>
								<select class="form-control" name="ddlCategory">
									<option value="0">Choose One</option>
									<?php foreach ($category as $key => $value): ?>
										<option value="<?php echo $value->cat_id?>" <?php echo set_select("ddlCategory",$value->cat_id)?>><?php echo $value->cat_name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>					

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<table>
									<tr>
										<td>I am/We are available as:</td>
										<td><strong><input type="checkbox" name="chkbox[]" value="s"> Service Provider</strong></td>
									</tr>
									<tr>
										<td></td>
										<td><strong><input type="checkbox" name="chkbox[]" value="e"> Employee</strong></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 ">
							<img src="<?php echo base_url()?>assets/uploads/noimagefound.jpg" class="img-thumbnail" alt="" style="width:140px;"><br>
							<button type="button" class="btn btn-default btn-sm" style="margin-top:10px;" data-toggle="modal" data-target="#myModal">Upload Image
							</button>
						</div>
					</div>
					<div class="row" style="margin-top:30px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Name</label>
								<?php echo form_input("txtName",set_value("txtName"),"class='form-control' placeholder='Enter Name here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Website</label>
								<?php echo form_input("txtWebsite",set_value("txtWebsite"),"class='form-control' placeholder='Enter you website here...'"); ?>
							</div>
						</div>
					</div>

					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tel</label>
								<?php echo form_input("txtTel",set_value("txtTel"),"class='form-control' placeholder='Enter Telephone number here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Email</label>
								<?php echo form_input("txtEmail",set_value("txtEmail"),"class='form-control' placeholder='Enter Email here...'"); ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Address</label>
								<textarea name="txtAddress" rows="8" cols="80" class="form-control"><?php echo set_value("txtAddress");?></textarea>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Line</label>
								<?php echo form_input("txtLine",set_value("txtLine"),"class='form-control' placeholder='Enter Line here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">WhatsApp</label>
								<?php echo form_input("txtWhatsapp",set_value("txtWhatsapp"),"class='form-control' placeholder='Enter Whatsapp here...'"); ?>
							</div>
						</div>
					</div>


					<hr>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">About Me</label>
								<textarea name="txtAboutMe" rows="5" cols="80" class="form-control"><?php echo set_value("txtAboutMe");?></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Skill/Service</label>
									<div class="input-group">
										<input type="text" value="<?php echo set_value("txtSkill");?>" class="form-control" placeholder="Enter your Skill here..." ng-model="txtSkill" name="txtSkill">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button" ng-click="addSkill(txtSkill)"><i class="glyphicon glyphicon-plus-sign"></i> Add Skill</button>
										</span>
									</div><!-- /input-group -->
							</div>
						</div>
					</div>
					<div class="row" ng-show="state">
						<div class="col-lg-6">
							<div class="alert alert-warning" role="alert" >
								<p><i class="glyphicon glyphicon-alert"></i> Enter your skill first!</p>
							</div>
						</div>
					</div>


					<div class="row" ng-repeat="x in skills track by $index">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
										{{$index+1}}. {{x}} <button type="button" class="btn btn-danger pull-right" ng-click="removeSkill($index)">Remove</button>

								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Google Map</label>
								<?php echo form_input("txtGoogle",set_value("txtGoogle"),"class='form-control' placeholder='Copy & Paste Google Map Embed code here...'") ?>
							</div>
						</div>
					</div>
<hr>
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">

							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">
							<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success pull-right" value="Submit">
						</div>
					</div><!--==== end button action ====-->

	</div><!--===== end form post job ======-->

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
								<input	type="file" name="txtUpload" />
								<input type="hidden" id="txtImgName" name="txtImgName" />
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
	</div></div></div>

				<input type="hidden" id="str" name="str" value="">
<?php echo form_close();?>
</div><!--== end ng-app=====-->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
		var app = angular.module("myApp",[]);
		var i = 0;
		var arrSkill=[];
		app.controller("myCtrl",function($scope,$http){
			$scope.state=0;
			$scope.addSkill = function(skill){
					if(skill!==undefined&&skill!="")
					{
						$scope.state=0;
						arrSkill[i] = skill;
						$scope.skills = arrSkill;
						$scope.txtSkill = "";
						i = i+1;
					}else {
						$scope.state=1;
					}
			}

			$scope.removeSkill = function(index){
				$scope.skills.splice(index,1);
				i=i-1;
				$scope.state=0;
			}
		});

		$("#btnSubmit").click(function(){
			$('#str').val(JSON.stringify(arrSkill));
		});
		$("#btnPreview").click(function(){
			$('#str').val(JSON.stringify(arrSkill));
		});
</script>

<script type="text/javascript">
	$("#btnUpload").click(function(){
		$("#txtUpload").click();
	});
</script>

<script type="text/javascript">
	function uploadFile() {
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
				document.getElementById("response").innerText = "Upload Complete!";
				document.getElementById("txtImgName").value = data;
			}
		});
	}
</script>
