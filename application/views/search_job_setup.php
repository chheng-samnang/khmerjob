
	<div class="tab-content">
		<div class="panel panel-default">
			  <div class="panel-heading">
			  	<b>Search Job</b> 
			  </div>
			  <div class="panel-body">
			  	<?php 
			  		foreach ($row as $value) {
			  			echo "<p>".$value->key_data2;"</p>";
			  		}
			  	 ?>
			  	<div class="pull-right">
			  		<a href="<?php echo base_url("home/job_thumbnail"); ?>" class="btn btn-success">Search Job Now</a>
			  	</div>
			  </div>
		</div>
	</div>