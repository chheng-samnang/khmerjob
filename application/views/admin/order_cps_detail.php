<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
			<div class="row">
				<div class="col-lg-12">				
					<h1 class="page-header">Form CV Paid Search Detail</h1>									
						<!--== account Informaion==-->
								 <div class="col-lg-4">
								 	<div class="panel panel-primary">
								 		<div class="panel-heading">
								 			<h3 class="panel-title">Account Information</h3>
								 		</div>
								 		<div class="panel-body">
								 			<img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$detail->acc_photo);?>" style="width:80px;"/>	                                
			                                <p><b>Account ID: </b><?php echo $detail->acc_code;?></p>
			                               	<p><b>Account name: </b><?php echo $detail->acc_name;?></p>
			                                <p><b>Company: </b><?php echo $detail->acc_company;?></p>
			                                <p><b>Gender: </b><?php echo $detail->acc_gender=='m'?'Male':($detail->acc_gender=='f'?'Female':'Other');?></p>                                     
			                                <p><b>Email: </b><?php echo $detail->acc_email;?></p>
			                                <p><b>Phone: </b><?php echo $detail->acc_phone;?></p>                                        
			                                <p><b>Website: </b><?php echo $detail->acc_website;?></p>                                        			                                
			                                <p><b>Status: </b><?php echo $detail->acc_status=='1'?'Enable':'Disable';?></p>                                                                        
			                                <p><b>Address: </b><div class="thumbnail"><?php echo $detail->acc_addr;?></div></p>                                                                                
			                                <p><b>Description: </b><div class="thumbnail"><?php echo $detail->acc_desc;?></div></p>
								 		</div>
								 	</div>	                                
	                            </div>
	                    <!--== End account Informaion==-->

	                    <!--== Job Informaion==-->
								<div class="col-lg-4">
								 	<div class="panel panel-primary">
								 		<div class="panel-heading">
								 			<h3 class="panel-title">CV Paid Search Information</h3>
								 		</div>
								 		<div class="panel-body">								 			
											<p><b>CPS ID: </b><?php echo $detail->cps_code;?></p>																						
											<p><b>Posting Date: </b><?php echo date("d/m/Y",strtotime($detail->date_from));?></p>											
											<p><b>Duration: </b><?php echo $detail->key_code.' hours';?></p>
											<p><b>Price: </b><?php echo $detail->key_data.' $';?></p>
											<p><b>CPS Status: </b><?php echo $detail->cps_status;?></p>
											<p><b>CPS Action: </b><?php echo $detail->cps_action;?></p>																																																																														                                                              	                                	                                                               	                                
	                            		</div>
								 	</div>
	                            </div>
	                    <!--== End Job Informaion==-->

	                     <!--== Payment Informaion==-->
								<div class="col-lg-4">
								 	<div class="panel panel-primary">
								 		<div class="panel-heading">
								 			<h3 class="panel-title">Payment Information</h3>
								 		</div>
								 		<div class="panel-body">
											<p><b>Price: </b><?php echo $detail->price.' $';?></p>
											<p><b>Duration: </b><?php echo $detail->duration.' hours';?></p>
											<p><b>Discount: </b><?php echo $detail->discount!=""?$detail->discount.' %':'0 %';?></p>
											<p><b>VAT: </b><?php echo $detail->VAT!=""?$detail->VAT.' %':'0 %';?></p>
											<p><b>Pay by: </b><?php echo $detail->pay_by;?></p>	
											<p><b>Pay Date: </b><?php echo $detail->pay_date;?></p>												                                                               	                                
	                            		</div>
								 	</div>
	                            </div>
	                    <!--== End Payment Informaion==-->											
						<a href="<?php echo site_url($cancel);?>" class="btn btn-default fa fa-close" style="float:right;margin-bottom: 10px;"> Close</a>
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
