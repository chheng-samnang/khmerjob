
	<div class="tab-content">
		<div class="panel panel-default">
			  <div class="panel-heading">
			  	<b>Post Skill</b>
			  </div>
			  	<?php foreach ($desc as $result)
			  		{
			  		 echo "<h4 class='text_space'>". $result->rate_desc."<h4><hr>";
			  		} 
			  	?></p>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered">
					<tr class="tab_color">
						<td>CV Type</td>
						<td>Duration</td>
						<td>Price</td>
						<td>Homepage display</td>
						<td>Top rows display</td>
						<td>photo/logo space display </td>
					</tr>
				  	<?php
				  		foreach ($row as $value) {
				  	?>
					<tr>	
						<td><?php echo $skill_type = $value->rate_det_type; ?></td>
						<td>
							<?php   
							if($skill_type =="Standard"){
								echo "Unlimited";
							}else{ echo $value->duration." Days"; } ?>
						</td>
						<td>
							<?php $price = $value->price;
								 if($price==0.00){echo "Free";}else{echo $price. '$';}
							?>
						</td>
						<td>
							<?php $sybol= $value->homepage_display;
								if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
						 	?>
						 </td>
						<td><?php  $sybol = $value->toprow_display;
						 		if($sybol==1){
									echo "<h5 class='yes'>&#10004;</h5>";
								}else{echo "<h5 class='no'>&#10006;</h5>";}
						 	?>
						 	</td>
						<td><?php $sybol = $value->photo_space_display; 
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
			   		<a href="<?php echo base_url("home/skill_thumbnail");?>" class="btn btn-success">Post your skill now </a>
			   </div>
			  </div>
		</div>
	</div>