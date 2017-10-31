
	<div class="tab-content">
		<div class="panel panel-default">
			  <div class="panel-heading">
			  	<b>Search CV</b>
			  </div>
			  	<p>
			  		<?php foreach ($desc as $result)
			  		{
			  		 echo "<h4 class='text_space'>". $result->rate_desc."<h4><hr>";
			  		} 
			  	?></p>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered ">
					<tr class="tab_color">
						<td>Search Type</td>
						<td>Duration</td>
						<td>Price</td>
						<td>See applicant’s photo, name and job position</td>
						<td>Full view applicant detail information </td>
						<td>Print applicant’s CV out </td>
						<td>Send a direct email to applicant </td>
					</tr>
				  	<?php foreach ($row as $value) 
				  	{ ?>
					<tr>	
						<td><?php echo $cv_type = $value->rate_det_type; ?></td>
						<td>
							<?php  $value->key_code; 
							if($value->key_code ==0){
								echo "Unlimited";
							}else{ echo $value->key_code." hours"; } ?>
						</td>
						<td>
							<?php $price = $value->key_data;
								 if($price==0.00){echo "Free";}else{echo $price. '$';}
							?>
						</td>
						<td>
							<?php $sybol= $value->scv_see_app_position;
								if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
						 	?>
						 </td>
						<td><?php  $sybol = $value->scv_full_app_det;
						 		if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
						 	?>
						 	</td>
						<td><?php $sybol = $value->scv_print_app_cv; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
						<td>
							<?php $sybol = $value->scv_send_email_app; 
							if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
							?>
						</td>
					</tr>	
					<?php }?>
			   </table>
			  	</div>
			   <div class="pull-right">
			   		<a href="<?php echo base_url("cv_paid_search_c/index"); ?>" class="btn btn-success" style="margin:2px">Purchase CV paid  search now </a>
			  		 <a href="<?php echo base_url("home/cv_thumbnail")?>" class="btn btn-success" style="margin:2px">Search CV now </a>
			   </div>
			  </div>
		</div>
	</div>