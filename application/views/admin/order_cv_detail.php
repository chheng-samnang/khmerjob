<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
			<div class="row">
				<div class="col-lg-12">				
					<h1 class="page-header">Form CV Detail</h1>									
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
								 			<h3 class="panel-title">CV Information</h3>
								 		</div>
								 		<div class="panel-body">
								 			<img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$detail->photo);?>" style="width:80px;"/>	                                
											<p><b>CV ID: </b><?php echo $detail->cv_code;?></p>											
											<p><b>Priority: </b><?php echo $detail->rate_det_type;?></p>
											<p><b>Duration: </b><?php echo $detail->duration." Days";?></p>
											<p><b>Price: </b><?php echo $detail->price." $";?></p>
											<p><b>Position: </b><?php echo $detail->position;?></p>
																						
											<p><b>Salary: </b>
												<?php
													switch ($detail->salary)
													{
														case "150,300":echo "150$ - 300$";break; 
						                             	case "300,500":echo "300$ - 500$";break;
						                             	case "500,750":echo "500$ - 750$";break;
						                             	case "750,1000":echo "750$ - 1000$";break;
						                              	case ">=1000":echo "Over 1000$";break;
						                              	default:echo "Other";
													}
												?>
											</p>										
											<p><b>Year Experient: </b>
												<?php
													switch ($detail->year_exp)
													{
														case "0,1":echo "0 - 1 year";break; 
						                              	case "1,3":echo "1 - 3 years";break;
						                              	case "3,5":echo "3 - 5 years";break;
						                              	case "5,7":echo "5 - 7 years";break;
						                              	case "7,10":echo "7 - 10 years";break;
						                              	case ">=10":echo "Over 10 years";break;
						                              	default:echo "Other";
													}
												?>
											</p>

											<p><b>Name: </b><?php echo $detail->name;?></p>
											<p><b>Phone: </b><?php echo $detail->phone;?></p>
											<p><b>Email: </b><?php echo $detail->email;?></p>
											<p><b>Facebook: </b><?php echo $detail->fb;?></p>
											<p><b>Twitter: </b><?php echo $detail->twitter;?></p>
											<p><b>G+1: </b><?php echo $detail->G1;?></p>											
											<p><b>Date Of Birth: </b><?php echo date("d/m/Y",strtotime($detail->dob));?></p>											
											<p><b>Place Of Birth: </b><?php echo $detail->pob;?></p>
											<p><b>Marital Status: </b><?php echo $detail->marital_status;?></p>
											<p><b>Nationality: </b><?php echo $detail->nationality;?></p>
											<p><b>Gender: </b><?php echo $detail->acc_gender=='m'?'Male':($detail->acc_gender=='f'?'Female':'Other');?></p>                                     
											<p><b>Language: </b><?php echo $detail->lang;?></p>																																																																
											<p><b>CV Status: </b><?php echo $detail->post_cv_status;?></p>											
											<p><b>Address: </b><div class="thumbnail"><?php echo $detail->addr;?></div></p>
											<p><b>Work Experient: </b><div class="thumbnail"><?php echo $detail->work_exp;?></div></p>
											<p><b>Education: </b><div class="thumbnail"><?php echo $detail->edu;?></div></p>
											<p><b>Computer: </b><div class="thumbnail"><?php echo $detail->computer;?></div></p>
											<p><b>Other Skill: </b><div class="thumbnail"><?php echo $detail->other_skill;?></div></p>	                                                               	                                
											<p><b>Short Course: </b><div class="thumbnail"><?php echo $detail->short_course;?></div></p>	                                                               	                                
											<p><b>Reference: </b><div class="thumbnail"><?php echo $detail->ref;?></div></p>
											<p><b>Habby: </b><div class="thumbnail"><?php echo $detail->hobby;?></div></p>
											<p><b>About Me: </b><div class="thumbnail"><?php echo $detail->about_me;?></div></p>	                                                               	                                	                                                               	                                
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
											<p><b>Duration: </b><?php echo $detail->duration.' days';?></p>
											<p><b>Discount: </b><?php echo $detail->discount!=""?$detail->discount. '%':'0 %';?></p>
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
