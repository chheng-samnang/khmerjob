
<style type="text/css">
	.filter_search{height:60px;}
	.cv_align{
		margin-left:12px;
		text-align:center;
	}

.hdr_style{
	background: #408800;
	text-decoration: none;
	color:#ffffff;
	padding:4px;
	border-radius: 1px;
}
</style>
<div ng-app="myApp" ng-controller="myCtrl">
	<div class="row">
	<!--==== Post Button ====-->
		<div class="col-sm-6 col-md-2">
			<a href="<?php if(isset($thumbnail_url)){echo base_url($thumbnail_url);}?>" class="btn btn-lg thumbnail" style="padding: 20px 40px; text-align: center;background-color:#ffa500;border-radius: 5px;color:#fff"><b>Post CV</b></a>
		</div>
	<!--==== End Post Button ====-->
		<!--==  cv countdown ==-->
		<?php include("cv_countdown.php");?>
		<!--==  end cv countdown ==-->
	</div>
<!--==== Search and Filter ====-->
<?php echo form_open("home/cv_thumbnail","id='form' name='form'"); ?>
	<div class="row" style="margin-bottom: 20px">
		<div class="col-sm-9 col-md-9" style="padding-right: 0px;">
			<div class="input-group">
				<input type="text" name="txtSearch" id="txtSearch" class="form-control filter_search" placeholder="Search for..." style="background-color:rgba(204, 204, 204, 0.28)">
				<span class="input-group-btn" >
					<button class="btn btn-success filter_search" type="submit" style="border-radius: 0px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
				</span>
			</div>
		</div>
		<div class="col-sm-3 col-md-3" style="padding-right:30px;">
			<div class="row">
				<select name="ddlYearExp" id="ddlYearExp" class="form-control filter_search">
					<option value="">Years of Experience</option>
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
<?php form_close(); ?>
<!--==== End Search and Filter ====-->

<!--==== Category Items ====-->
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body" style="padding:5px;>
					<div class="row">
					<?php
					$lang = $this->session->site_lang;
					 if($cv_category==TRUE){foreach($cv_category as $cv_cat){?>
						<ul style="display: inline;">
								<li style="width:276px;height:30px;float:left; margin:3px">

									<a href="<?php echo base_url('home/cv_thumbnail/'.$cv_cat->cat_id);?>" class="thumbnail <?php if($cv_cat->cat_id == $this->session->active_id){ echo 'active1';} ?>" style="text-decoration: none;border-radius: 4px;cursor: pointer; color:black;background:#e8e8e8;"><?php if($lang=="khmer"){echo $cv_cat->cat_name_kh."<span style='color:#088708;font-weight:bold;'>(".$cv_cat->count.")</span>";}else{echo $cv_cat->cat_name." <span style='color:#44de44;font-weight:bold;'>(".$cv_cat->count.")</span>";}?></a>

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
				            <th class="th">Photo</th>
				            <th class="th">Name</th>
				            <th class="th">Function</th>
				            <!-- <th class="th">Detail</th> -->
				        </tr>
				    </thead>
			      	<tbody>
			      		<?php if($sub_category==TRUE){$i=1;foreach($sub_category as $sub_cat){?>
			      		<tr>
			      			<td><?php echo $i;$i++;?></td>
			      			<td style="text-align:center;">
										<?php if($sub_cat->rate_det_type=="Premium"){?>
											<img src="<?php echo base_url()?>assets/premium.gif" style="width:60px"/>
										<?php }else{echo $sub_cat->rate_det_type;}?>
									</td>
			      			<td style="text-align:center;">
										<?php
											if($sub_cat->photo!=""){
										?>
										<a href="<?php echo base_url('cv_c/cv_detail/'.$sub_cat->post_cv_id);?>"><img src="<?php echo base_url('assets/uploads/'.$sub_cat->photo)?>" style="width:80px;"></a>
										<?php }else{?>
											<a href="<?php echo base_url('cv_c/cv_detail/'.$sub_cat->post_cv_id);?>"><img src="<?php echo base_url('assets/img/noimages.png')?>" style="width:80px;"></a>
										<?php }?>
									</td>
			      			<td><a href="<?php echo base_url('cv_c/cv_detail/'.$sub_cat->post_cv_id);?>"><?php echo $sub_cat->name?></a></td>
			      			<td><?php echo $sub_cat->position?></td>
			      			<!-- <td><a href="<?php echo base_url('cv_c/cv_detail/'.$sub_cat->post_cv_id);?>">View Detail</a></td> -->
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
							<p><u class="hdr_style">Featured CVs</u></p>
							<div class="row">
								<?php if($premium_cv){foreach($premium_cv as $p_cv){?>
								<div class="col-md-2">
									<a href="<?php echo base_url("cv_c/cv_detail/".$p_cv->post_cv_id);?>" class="thumbnail">
										<img style="width:90px;" src="<?php echo base_url("assets/uploads/".$p_cv->photo);?>" >
										<div class="cv_align"><?php echo $p_cv->name?></div>
										<div class="cv_align"><?php echo $p_cv->position?></div>
									</a>
								</div>
								<?php }}?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--==== End Sponsor Company ====-->
		</div>
<!--==== End Table Items Category && Ads ====-->
