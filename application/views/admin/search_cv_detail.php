<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Search cv Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Search cv Detail Information</h3>
					</div>
					<div class="panel-body">							 
							<div class="col-lg-12">
                                <p><b>Search cv type: </b><?php echo $detail->rate_det_type;?></p>
                               	<p><b>Duration: </b><?php echo $detail->key_id==0?"Unlimited":$detail->key_code." hours";?></p>                               	
                                <p><b>Price: </b><?php echo $detail->key_id==0?"Free":$detail->key_data." $";?></p>
                                <p><b>See applicant(photo,name,job position): </b><?php echo $detail->scv_see_app_position=="1"?"Enable":"Disable";?></p>                                     
                                <p><b>Full view applicant detail: </b><?php echo $detail->scv_send_email_app=="1"?"Enable":"Disable";?></p>
                                <p><b>Print applicant's cv out: </b><?php echo $detail->scv_print_app_cv=="1"?"Enable":"Disable";?></p>
                                <p><b>Sent email to applicant: </b><?php echo $detail->scv_send_email_app=="1"?"Enable":"Disable";?></p>
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

