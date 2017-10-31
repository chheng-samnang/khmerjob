<?php $btn='';echo form_open_multipart("skill_c/add_skill","id='form' name='form'");?>


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
								<?php echo form_input(array("name"=>"txtSkillID","id"=>"txtSkillID","value"=>$get_saved->skill_code,"class"=>"form-control","readonly"=>"readonly"));?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Priority</label>
								<select name="ddlPriority" id="ddlPriority" class="form-control">
									<option value="">Choose one</option>
									<?php if(isset($skill_setup)){foreach($skill_setup as $job_setup1){?>
										<option value="<?php echo $job_setup1->rate_det_id;?>" <?php if($job_setup1->rate_det_id==$get_saved->priority){echo "selected";}?>><?php echo $job_setup1->rate_det_type." ";echo $job_setup1->duration!=0?$job_setup1->duration." Days":" Unlimited";?></option>
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
											<option value="<?php echo $value->loc_id?>" <?php if($value->loc_id==$get_saved->loc_id){echo "selected";}?>><?php echo $value->loc_name ?></option>
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
										<option value="<?php echo $value->cat_id?>" <?php if($value->cat_id==$get_saved->cat_id){echo "selected";}?>><?php echo $value->cat_name ?></option>
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
										<td><strong><input type="checkbox" name="chkbox[]" value="s" <?php if($get_saved->service_provider==1){echo "checked";}?>> Service Provider</strong></td>
									</tr>
									<tr>
										<td></td>
										<td><strong><input type="checkbox" name="chkbox[]" value="e" <?php if($get_saved->employee==1){echo "checked";}?>> Employee</strong></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 ">
							<img src="<?php if(isset($get_saved)){echo base_url("assets/uploads/".$get_saved->img);}?>" class="img-thumbnail" alt="" style="width:140px;"><br>
							<button type="button" class="btn btn-default btn-sm" style="margin-top:10px;" data-toggle="modal" data-target="#myModal">Upload Image
							</button>
						</div>
					</div>
					<div class="row" style="margin-top:30px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Name</label>
								<?php echo form_input("txtName",isset($get_saved->name)?$get_saved->name:NULL,"class='form-control' placeholder='Enter Name here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Website</label>
								<?php echo form_input("txtWebsite",isset($get_saved->website)?$get_saved->website:NULL,"class='form-control' placeholder='Enter you website here...'"); ?>
							</div>
						</div>
					</div>

					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Tel</label>
								<?php echo form_input("txtTel",isset($get_saved->phone)?$get_saved->phone:NULL,"class='form-control' placeholder='Enter Telephone number here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Email</label>
								<?php echo form_input("txtEmail",isset($get_saved->email)?$get_saved->email:NULL,"class='form-control' placeholder='Enter Email here...'"); ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Address</label>
								<textarea name="txtAddress" rows="8" cols="80" class="form-control"><?php if(isset($get_saved->addr))echo $get_saved->addr;?></textarea>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Line</label>
								<?php echo form_input("txtLine",isset($get_saved->line)?$get_saved->line:NULL,"class='form-control' placeholder='Enter Line here...'"); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">WhatsApp</label>
								<?php echo form_input("txtWhatsapp",isset($get_saved->whatApp)?$get_saved->whatApp:NULL,"class='form-control' placeholder='Enter Whatsapp here...'"); ?>
							</div>
						</div>
					</div>


					<hr>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">About Me</label>
								<textarea name="txtAboutMe" rows="5" cols="80" class="form-control"><?php if(isset($get_saved->about_me)){echo $get_saved->about_me;}?></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Skill/Service</label>
									<div class="input-group">
										<input type="text" value="<?php echo set_value("txtSkill");?>" class="form-control" placeholder="Enter your Skill here..." name="txtSkill">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button" disabled="disabled"><i class="glyphicon glyphicon-plus-sign"></i> Add Skill</button>
										</span>
									</div><!-- /input-group -->
							</div>
						</div>
					</div>
					

					<?php if(isset($skill_name)){foreach($skill_name as $sk_name){?>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-default">
								<div class="panel-body">
									<?php echo $sk_name->skill_det_name;?>
								</div>
							</div>
						</div>
					</div>
					<?php }}?>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Google Map</label>
								<?php echo form_input("txtGoogle",isset($get_saved->googleMap)?$get_saved->googleMap:NULL,"class='form-control' placeholder='Copy & Paste Google Map Embed code here...'") ?>
							</div>
						</div>
					</div>
<hr>
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">

							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview" disabled="">
							<a href="<?php echo base_url("skill_c/delete/".$get_saved->post_skill_id);?>" class="btn btn-default">Delete</a>
							<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success pull-right" value="Submit" disabled="">
						</div>
					</div><!--==== end button action ====-->
					<hr>
					<label class="control-label">Your Skill Status: </label> <?php echo $get_saved->post_skill_status;?>

	</div><!--===== end form post job ======-->

			
	</div></div></div>

				<input type="hidden" id="str" name="str" value="">
<?php echo form_close();?>



