<style type="text/css">
	.filter_search{height:60px;}
</style>
<div ng-app="myApp" ng-controller="myCtrl">	
<!--==== Post Button ====-->
	<div class="row">	
		<div class="col-sm-6 col-md-2">
			<a href="<?php if(isset($thumbnail_url)){echo base_url($thumbnail_url);}?>" class="btn btn-lg thumbnail" style="padding: 20px 40px; text-align: center;background-color:#ffa500;border-radius: 5px;color:#fff"><b>Post skill</b></a>
		</div>					
	</div>
<!--==== End Post Button ====-->

<!--==== Search and Filter ====-->
<?php echo form_open("home/skill_thumbnail","id='form' name='form'"); ?>
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
					<?php if(isset($skill_location)){foreach($skill_location as $location1){?>
						<option value="<?php echo $location1->loc_name;?>"><?php echo $location1->loc_name;?></option>
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
			<div class="panel panel-default"">				
				<div class="panel-body"  style="padding:5px;">			

						<?php 
							$lang = $this->session->site_lang;
						if($skill_category==TRUE){foreach($skill_category as $sk_cat){?>							
							<ul style="display: inline;">
								<li style="width:276px;height:30px;float:left; margin:3px">																																									
									<a  href="<?php echo base_url('home/skill_thumbnail/'.$sk_cat->cat_id);?>" class="thumbnail <?php if($sk_cat->cat_id == $this->session->active_id){ echo 'active1';} ?>" style="text-decoration: none; color:black; border-radius: 4px;cursor: pointer;"><?php if($lang=="khmer"){echo $sk_cat->cat_name_kh."(".$sk_cat->count.")";}else{echo $sk_cat->cat_name."(".$sk_cat->count.")";}?></a>																																	
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
				            <th class="th">Skill</th>
				            <th class="th">Name</th>
				            <th class="th">Location</th>
				            <th class="th">Detail</th>
				        </tr>
				    </thead>
			      	<tbody>			      		
			      		<?php if($sub_category==TRUE){$i=1;foreach($sub_category as $sub_cat){?>
			      		<tr>
			      			<td><?php echo $i;$i++;?></td>
			      			<td><?php echo $sub_cat->rate_det_type?></td>
			      			<td><?php echo $sub_cat->skill_det_name?></td>
			      			<td><?php echo $sub_cat->NAME?></td>
			      			<td><?php echo $sub_cat->loc_name?></td>
			      			<td><a href="<?php echo base_url('skill_c/skill_detail/'.$sub_cat->skill_det_id);?>">View Detail</a></td>																																
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
						<p><u>Feature Skill</u></p>
							<div class="row">				
								<?php if($premium_skill){foreach($premium_skill as $p_skill){?>
								<div style="width:10%;height: 10%; float: left;margin:0% 1%;">
									<a href="<?php echo base_url("skill_c/skill_detail/".$p_skill->skill_det_id);?>" class="thumbnail">										
										<img src="<?php echo base_url("assets/uploads/".$p_skill->img);?>" style="width:60px;height:40px;">
										<div><?php echo $p_skill->name?></div>
										<div><?php echo $p_skill->skill_det_name?></div>
										<div><?php echo $p_skill->loc_name?></div>								
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


