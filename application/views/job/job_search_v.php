<style type="text/css">
	.filter_search{height:60px;}
</style>
<div ng-app="myApp" ng-controller="myCtrl">
<!--==== Post Button ====-->
	<div class="row">
		<div class="col-sm-6 col-md-2">
			<a href="<?php if(isset($thumbnail_url)){echo base_url($thumbnail_url);}?>" class="btn btn-lg thumbnail" style="padding: 20px 40px; text-align: center;background-color:#ffa500;border-radius: 5px;color:#fff"><b>Post Job</b></a>
		</div>
	</div>
<!--==== End Post Button ====-->

<!--==== Search and Filter ====-->
<?php echo form_open("home/job_thumbnail","id='form' name='form'"); ?>
	<div class="row" style="margin-bottom: 20px">
		<div class="col-sm-9 col-md-9" style="padding-right: 0px;">
			<div class="input-group">
				<input type="text" name="txtSearch" id="txtSearch" class="form-control filter_search" placeholder="Search for..." style="background-color:rgba(204, 204, 204, 0.28)">
				<span class="input-group-btn" >
					<button class="btn btn-success filter_search" type="submit" style="border-radius: 0px;"><i class="fa fa-search" aria-hidden="true"></i></button>
				</span>
			</div>
		</div>
		<div class="col-sm-3 col-md-3" style="padding-right:30px;">
			<div class="row">
				<select class="form-control filter_search" name="ddlLocation" id="ddlLocation" style="background-color:rgba(204, 204, 204, 0.28)">
					<option value="">Locations</option>
					<?php if(isset($job_location)){foreach($job_location as $location1){?>
						<option value="<?php echo $location1->loc_id;?>"><?php echo $location1->loc_name;?></option>
					<?php }}?>
				</select>
			</div>
		</div>
	</div>
<?php form_close(); ?>
<!--==== End Search and Filter ====-->

<!--==== Category Items ====-->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body"  style="padding:5px;">

						<?php
							$lang = $this->session->site_lang;
						if($job_category==TRUE){foreach($job_category as $job_cat){?>
							<ul style="display: inline;list_style_type:none;">
								<li style="width:276px;height:30px;float:left; margin:3px">
									<a  href="<?php echo base_url('home/job_thumbnail/'.$job_cat->cat_id);?>" class="thumbnail <?php if($job_cat->cat_id == $this->session->active_id){ echo 'active1';} ?>" style="text-decoration: none; color:black; border-radius: 4px;cursor: pointer;"><?php if($lang=="khmer"){echo $job_cat->cat_name_kh."(".$job_cat->count.")";}else{echo $job_cat->cat_name."(".$job_cat->count.")";}?></a>
								</li>
							</ul>
						<?php }}?>

					</div>
				</div>
			</div>
		</div>
	</div>
<!--==== End Category Items ====-->

<!--==== Table Items Category && Ads ====-->
<style>.th{text-align: center; background-color:#088708;color:#fff;}</style>
	<div class="row">
		<div class="col-md-10">
			<div class="12">
				<table class="table table-bordered table-striped" id="mydata">
				    <thead>
				        <tr>
				        	<th class="th">No</th>
				            <th class="th">Priority</th>
				            <th class="th">Function</th>
				            <th class="th">Company</th>
				            <th class="th">End Date</th>
				            <th class="th">Detail</th>
				        </tr>
				    </thead>
			      	<tbody>
			      		<?php if($sub_category==TRUE){$i=1;foreach($sub_category as $sub_cat){?>
			      		<tr>
			      			<td><?php echo $i;$i++;?></td>
			      			<td><?php echo $sub_cat->rate_det_type?></td>
			      			<td><?php echo $sub_cat->job_title?></td>
			      			<td><?php echo $sub_cat->acc_name?></td>
			      			<td><?php echo $sub_cat->end_date?></td>
			      			<td><a href="<?php echo base_url('job_c/job_detail/'.$sub_cat->post_job_id);?>">View Detail</a></td>
			      		</tr>
			      		<?php }}?>
			      	</tbody>
			    </table>
			</div>

			<!--==== Sponsor Company ====-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">

								<div class="col-md-6">
									<label><u>Feature Company</u></label>
									<div class="row">
										<?php if($feature_emp){foreach($feature_emp as $f_emp){?>
										<div class="col-md-3">
											<a href="<?php echo base_url("home/job_thumbnail_freature/".$f_emp->acc_name);?>" title="<?php echo $f_emp->acc_name;?>"><img src="<?php echo base_url("assets/uploads/".$f_emp->acc_photo);?>" class="img-responsive thumbnail"></a>
										</div>
										<?php }}?>
									</div>
								</div>

								<div class="col-md-6">
									<label><u>Feature Recruitment Agency</u></label>
									<div class="row">
										<?php if($feature_recruit){foreach($feature_recruit as $f_re){?>
										<div class="col-md-3">
											<a href="<?php echo base_url("home/job_thumbnail_freature/".$f_re->acc_name);?>" title="<?php echo $f_re->acc_name;?>"><img src="<?php echo base_url("assets/uploads/".$f_re->acc_photo);?>" class="img-responsive thumbnail"></a>
										</div>
										<?php }}?>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!--==== End Sponsor Company ====-->
		</div>

<!--==== End Table Items Category && Ads ====-->
