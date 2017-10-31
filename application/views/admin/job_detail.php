<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Job Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Job Detail Information</h3>
					</div>
					<div class="panel-body">							 
							<div class="col-lg-12">
                                <p><b>Job type: </b><?php echo $detail->rate_det_type;?></p>
                               	<p><b>Duration: </b><?php echo $detail->bp_duration!=NULL||$detail->bp_duration!=""?$detail->bp_duration." days":$detail->duration." days";?></p>
                                <p><b>Price: </b><?php echo $detail->bp_price!=NULL||$detail->bp_price!=""?$detail->bp_price." $":$detail->price." $";?></p>                                                                                                                                
                                <p><b>From 2 posting job discount:</b><?php echo $detail->job_2post_discount=="1"?"Enable":"Disable";?></p>
                                <p><b>Alert job annoucement to CV: </b><?php echo $detail->job_alert_job_to_cv=="1"?"Enable":"Disable";?></p>
                                <p><b>Receive CV to job position: </b><?php echo $detail->job_receive_cv_app=="1"?"Enable":"Disable";?></p>
                                <p><b>Alert jog to all register: </b><?php echo $detail->job_alert_job_to_register=="1"?"Enable":"Disable";?></p>                                     
                                <p><b>Facebook boosting: </b><?php echo $detail->job_fb_boosting=="1"?"Enable":"Disable";?></p>
                                <p><b>Homepage display: </b><?php echo $detail->homepage_display=="1"?"Enable":"Disable";?></p>
                                <p><b>Toprow display: </b><?php echo $detail->toprow_display=="1"?"Enable":"Disable";?></p>                                     
                                <p><b>Company logo display: </b><?php echo $detail->job_com_logo_display=="1"?"Enable":"Disable";?></p>
                                <p><b>Free per months: </b><?php echo $detail->cps_duration!=NULL||$detail->cps_duration!=""?$detail->cps_duration." hours":" 0 hours";?></p>                                                                                                                                                                
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
