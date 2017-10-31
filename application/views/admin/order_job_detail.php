<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
			<div class="row">
				<div class="col-lg-12">				
					<h1 class="page-header">Form JOB Detail</h1>									
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
								 			<h3 class="panel-title">JOB Information</h3>
								 		</div>
								 		<div class="panel-body">
											<p><b>Job ID: </b><?php echo $detail->job_code;?></p>
											<p><b>Contact name: </b><?php echo $detail->contact_name;?></p>
											<p><b>Phone: </b><?php echo $detail->phone;?></p>
											<p><b>Email: </b><?php echo $detail->email;?></p>
											<p><b>Priority: </b><?php echo $detail->rate_det_type;?></p>
											<p><b>Duration: </b><?php echo $detail->duration." Days";?></p>
											<p><b>Price: </b><?php echo $detail->price. "$";?></p>
											<p><b>Job Title: </b><?php echo $detail->job_title;?></p>
											<p><b>Email: </b><?php echo $detail->email;?></p>
											<p><b>Posting Date: </b><?php echo date("d/m/Y",strtotime($detail->posting_date));?></p>
											<p><b>Close Date: </b><?php echo date("d/m/Y",strtotime($detail->end_date));?></p>
											<p><b>Contract: </b>
												<?php
													switch ($detail->contract)
													{
														case "full_time":echo "Full Time";break; 
							                              case "part_time":echo "Part Time";break;
							                              case "<3":echo "Less Than 3 months";break;
							                              case "3,6":echo "From 3 to 6 months";break;
							                              case "6,12":echo "From 6 to 12 months";break;
							                              case ">1":echo "More Than 1 year";break;
							                              case "intership":echo "Intership";break;
							                              default:echo "Negotiable";
													}
												?>
											</p>
											<p><b>Gender: </b><?php echo $detail->gender=='m'?'Male':($detail->gender=='f'?'Female':'Other');?></p>
											<p><b>Age: </b>
												<?php
													switch ($detail->age)
													{
														case "18,25":echo "18 - 25";break; 
							                            case "25,32":echo "25 - 32";break;
							                            case "32,37":echo "32 - 37";break;
							                            case "37,45":echo "37 - 45";break;
							                            case ">=45":echo "Over 45";break;
							                            default:echo "Other";
													}
												?>
											</p>
											<p><b>Salary Range: </b>
												<?php
													switch ($detail->salary_range)
													{
														case "150,300":echo "150$ - 300$";break; 
						                             	case "300,500":echo "300$ - 500$";break;
						                             	case "500,750":echo "500$ - 750$";break;
						                              	case ">=1000":echo "Over 1000$";break;
						                              	default:echo "Other";
													}
												?>
											</p>
											<p><b>Year Experient: </b>
												<?php
													switch ($detail->year_exp)
													{
														case "1,2":echo "1 - 2 years";break; 
						                              	case "2,3":echo "2 - 3 years";break;
						                              	case "3,5":echo "3 - 5 years";break;
						                              	case "5,7":echo "5 - 7 years";break;
						                              	case "7,10":echo "7 - 10 years";break;
						                              	case ">=10":echo "Over 10 years";break;
						                              	default:echo "Other";
													}
												?>
											</p>
											<p><b>Education: </b><?php echo $detail->edu;?></p>
											<p><b>language1: </b><?php echo $detail->lang1;?></p>
											<p><b>language2: </b><?php echo $detail->lang2;?></p>
											<p><b>language3: </b><?php echo $detail->lang3;?></p>
											<p><b>language4: </b><?php echo $detail->lang4;?></p>
											<p><b>Hiring Quantity: </b><?php echo $detail->hiring_qty;?></p>
											<p><b>Category name: </b><?php echo $detail->cat_name;?></p>
											<p><b>Location name: </b><?php echo $detail->loc_name;?></p>
											<p><b>Job Status: </b><?php echo $detail->post_job_status;?></p>
											<p><b>Job Action: </b><?php echo $detail->post_job_action;?></p> 
											<p><b>Address: </b><div class="thumbnail"><?php echo $detail->addr;?></div></p>
											<p><b>Description: </b><div class="thumbnail"><?php echo $detail->job_desc;?></div></p>
											<p><b>Requirement: </b><div class="thumbnail"><?php echo $detail->job_requirement;?></div></p>
											<p><b>Other Benefit: </b><div class="thumbnail"><?php echo $detail->other_benefit;?></div></p>	                                                               	                                
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
