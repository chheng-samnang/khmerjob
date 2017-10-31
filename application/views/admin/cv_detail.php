<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form CV Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">CV Detail Information</h3>
					</div>
					<div class="panel-body">							 
							<div class="col-lg-12">
                                <p><b>CV type: </b><?php echo $detail->rate_det_type;?></p>
                               	<p><b>Duration: </b><?php echo $detail->duration." days";?></p>                               	
                                <p><b>Price: </b><?php echo $detail->price."$";?></p>
                                <p><b>Homepage Display: </b><?php echo $detail->homepage_display=="1"?"Enable":"Disable";?></p>                                     
                                <p><b>Toprow Display: </b><?php echo $detail->toprow_display=="1"?"Enable":"Disable";?></p>
                                <p><b>Private photo space box: </b><?php echo $detail->photo_space_display=="1"?"Enable":"Disable";?></p>
                                <p><b>User create: </b><?php echo $detail->user_crea;?></p>                                        
                                <p><b>Date create: </b><?php echo $detail->date_crea;?></p>
                                <p><b>User update: </b><?php echo $detail->user_updt;?></p>                                        
                                <p><b>Date update: </b><?php echo $detail->date_updt;?></p>                                                                                                                                                 
                                <p><b>Description: </b><div class="thumbnail"><?php echo $detail->rate_desc;?></div></p>                                                                                                                
                                <a href="<?php echo site_url($cancel);?>" class="btn btn-default fa fa-close"> Close</a>
                            </div>											
					</div>
				</div>
				<?php echo form_close()?>
			</div>
		</div>
	</div>
</div>

<script>
	$("#btnCancel").click(function(){
    	window.location.assign("<?php if(isset($cancel)){echo base_url($cancel);}?>");
	});
</script> 
