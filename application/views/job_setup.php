
	<div class="tab-content">
		<div class="panel panel-default">
			  <div class="panel-heading">
			  	<b>Post Job</b>
			  </div>
			  	<p>
			  		<?php foreach ($desc as $result)
			  		{
			  			echo "<h4 class='text_space'>". $result->rate_desc."<h4><hr>";
			  		} 
			  	?></p>

			  <div class="panel-body">
			  <div class="table-responsive">
			  	<table class="table table-bordered">
					<tr class="tab_color">
						<td>Job Type</td>
						<td>Duration</td>

						<td>Price/Job</td>						
						<td>From 2 Post Job discount(%) </td>

						<td>Alert job announcement  to CV</td>
						<td>Receive CV applicants related to job position</td>
						<td>Alert job announcement to all registers</td>
						<td>Facebook boosting</td>
						<td>Homepage displays</td>
						<td>Top rows display</td>
						<td>companies ‘logo display</td>
						<td>Free/month</td>
					</tr>
				  	<?php foreach ($row as $value) 
				  	{ ?>
					<tr>	
						<td><?php echo $cv_type = $value->rate_det_type;?></td>
						<td><?php echo ($value->bp_duration==NULL||$value->bp_duration=='')?$value->duration. " days":$value->bp_duration." days";?></td>																			
						<td><?php echo ($value->bp_price==NULL||$value->bp_price=='')?$value->price. " $":$value->bp_price." $";?></td>						
						<td>


							<?php 
								$result = $value->job_2post_discount;
							 	if($result==0){echo "<h5 class='no'>&#10006;</h5>";}else{echo $result." %";}																	
							 ?>

						 </td>
						 <td><?php  $sybol = $value->job_alert_job_to_cv;
						 		if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						 </td>
						<td><?php $sybol = $value->job_receive_cv_app; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php $sybol = $value->job_fb_boosting; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php $sybol = $value->job_com_logo_display; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php $sybol = $value->homepage_display; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php $sybol = $value->toprow_display; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php $sybol = $value->job_com_logo_display; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td><?php echo ($value->cps_duration!=NULL||$value->cps_duration!="")?$value->cps_duration." hours":"<h5 class='no'>&#10006;</h5>";?></td>
					</tr>	
					<?php }?>
			   </table>
			  </div>
			   <div class="pull-right">
			   		<a href="<?php echo base_url("bundle_package_c/index"); ?>" class="btn btn-success" style="margin:2px">Purchase Bundle  Package Now </a>
			  		 <a href="<?php echo base_url("job_c/post_job"); ?>" class="btn btn-success" style="margin:2px">Post Job Now</a>
			   </div>
			  </div>
		</div>
	</div>