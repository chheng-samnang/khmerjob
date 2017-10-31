	
	
	<div class="tab-content">
		<div class="panel panel-default">
			  <div class="panel-heading">
			  	<b>Post CV</b>
			  </div>
			  	<p class="text_space">
			  		<?php foreach ($desc as $result)
			  		{
			  		 echo "<h4  class='text_space'>". $result->rate_desc."<h4><hr>";
			  		} 
			  		?>
			  	</p>
			  <div class="panel-body">
			  <div class="table-responsive">
			  	<table class="table table-bordered">
					<tr class="tab_color">
						<td>CV Type</td>						
						<td>Duration</td>
						<td>Price</td>
						<td>Homepage Display</td>
						<td>Top row display</td>
						<td>Private photo space box</td>
					</tr>
				  	<?php foreach ($row as $value) 
				  	{ ?>
					<tr>	
						<td><?php echo $cv_type = $value->rate_det_type;?></td>
						<td>
							<?php echo $value->duration; 
							if($cv_type =="Premium"){
								echo " Days";
							}else{ echo " years"; } ?>
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
			  		<a href="<?php echo base_url("cv_c/post_cv"); ?>" class="btn btn-success">post your CV now</a>
			  	</div>
			  </div>
		</div>
	</div>