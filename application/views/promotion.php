
<div class="col-md-12">
    <div class="row">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	           <b>Promotion</b>
	        </div>
	        <div class="panel-body">
		                <?php 
					foreach ($promotion as $value) 
					{
				?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<p><?php echo $value->key_data2 ?></p>
						</div> 
					</div>
				</div>
		        <div class="col-md-12">
					<div class="thumbnail" style="background-color: rgb(255, 255, 255)">
			   		 <img class="img-responsive" src="<?php echo base_url();?>/assets/uploads/<?php echo $value->key_data;?>" alt="jhh" style="width:300px">
					</div><hr>
		    	</div>
		    	<?php }?>
		</div>
    </div>
</div>

 