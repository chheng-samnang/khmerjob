<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default" style="border-radius: 0px;">
	       	<div class="panel-body">
	       	<!--== Logo ==-->
	       		<div class="row">
	       			<div class="col-md-5"></div>
	       			<div class="col-md-2">
	       				<img style="width: 128px;" src="<?php if(isset($job_det->acc_photo)){echo base_url('assets/uploads/').'/'.$job_det->acc_photo;}?>" style="text-align:center">
						<span class="thumbnail" style="text-align: center;"><?php if(isset($job_det->acc_name)){echo $job_det->acc_name;}?></span>													       						
	       			</div>
	       			<div class="col-md-4"></div>	       				       			     			       				       				 	       				       							       						       		       				       			       		
		       	</div>
		       	<div class="row">
		       	<div class="col-md-4"></div>
		       	<div class="col-md-4 thumbnail" style="text-align: center;"><h3><?php if(isset($job_det->job_title)){echo $job_det->job_title;}?></h3></div>
		       	<div class="col-md-4"></div>
		       	</div>		       	
		       	<hr />
		    <!--== End Logo ==-->

		    <!--== About Company ==-->
		    	<div class="row">
		    		<div class="col-md-12">
		    			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 10px;">About Company</p>			       	
				       	<p>
				       		<?php if(isset($job_det->acc_desc)){echo $job_det->acc_desc;}?>
				       	</p>
		    		</div>
		    	</div>
		    <!--== End About Company ==-->

		    <!--== Job Description ==-->
		    	<div class="row">
		    		<div class="col-md-12">
		    			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 10px;">Job Descriptions</p>			       	
				       	<p>
				       		<?php if(isset($job_det->job_desc)){echo $job_det->job_desc;}?>
				       	</p>
		    		</div>
		    	</div>
		    <!--== End Job Description ==-->

		    <!--== Requirement ==-->
		    	<div class="row">
		    		<div class="col-md-12">
		    			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 10px;">Requirements</p>			       	
				       	<p>
				       		<?php if(isset($job_det->job_requirement)){echo $job_det->job_requirement;}?>
				       	</p>
		    		</div>
		    	</div>
		    <!--== End Requirement ==-->

		    <!--== Other Benefit ==-->
		    	<div class="row">
		    		<div class="col-md-12">
		    			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 10px;">Other Benefit</p>			       	
				       	<p>
				       		<?php if(isset($job_det->other_benefit)){echo $job_det->other_benefit;}?>
				       	</p>
		    		</div>
		    	</div>
		    <!--== End Other Benefit ==-->		      
		    
		     <!--== Contact us==-->
		    	<div class="row">
		       		<div class="col-md-12">
		       			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 15px;">Contact Information</p>
		       			<div class="row">
		       				<div class="col-md-2">Contact Name:</div>
		       				<div class="col-md-10">
		       					<?php if(isset($job_det->contact_name)){echo $job_det->contact_name;}?>
		       				</div>
		       			</div>
		       			<div class="row" style="margin-top: 10px">
		       				<div class="col-md-2">Phone:</div>
		       				<div class="col-md-10">
		       					<?php if(isset($job_det->phone)){echo $job_det->phone;}?>
		       				</div>
		       			</div>
		       			<div class="row" style="margin-top: 10px">
		       				<div class="col-md-2">Email:</div>
		       				<div class="col-md-10">
		       					<?php if(isset($job_det->email)){echo $job_det->email;}?>
		       				</div>
		       			</div>
		       			<div class="row" style="margin-top: 10px">
		       				<div class="col-md-2">Address:</div>
		       				<div class="col-md-10">
		       					<?php if(isset($job_det->addr)){echo $job_det->addr;}?>
		       				</div>
		       			</div>
		       		</div>		       	 
		    	</div>
		    <!--== Contact us ==-->

		     <!--== Contact us==-->
		    	<div class="row">
		       		<div class="col-md-12">
		       			<p style="background: #f1f1f1; font-weight: bold; padding: 8px; margin-bottom: 15px;">Job Information</p>
		       			<div class="row">      						       				
       						<div class="col-md-6" style="border-right:solid 1px gray;">
       							<div class="row">
       								<div class="col-md-4"><p>End Date:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->end_date)){echo $job_det->end_date;}?></p></div>
       							</div>       							
       							<div class="row">
       								<div class="col-md-4"><p>Contract:</p></div>
       								<div class="col-md-8"><p>
       								<?php if(isset($job_det->contract)){
       										switch ($job_det->contract){
				                              case "full_time":echo "Full Time";break; 
				                              case "part_time":echo "Part Time";break;
				                              case "<3":echo "Less Than 3 months";break;
				                              case "3,6":echo "From 3 to 6 months";break;
				                              case "6,12":echo "From 6 to 12 months";break;
				                              case ">1":echo "More Than 1 year";break;
				                              case "intership":echo "Intership";break;
				                              default:echo "Negotiable";}
       									}?>
       									
       								</p></div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Gender:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->gender)){echo $job_det->gender=='m'?'Male':($job_det->gender=='f'?'Female':'Other');}?></p></div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Age:</p></div>
       								<div class="col-md-8"><p>
       								<?php if(isset($job_det->age)){
       									switch ($job_det->age) {
			                            case "18,25":echo "18 - 25";break; 
			                            case "25,32":echo "25 - 32";break;
			                            case "32,37":echo "32 - 37";break;
			                            case "37,45":echo "37 - 45";break;
			                            case ">=45":echo "Over 45";break;
			                            default:echo "unspecified";}
			                          }?>       								       									
       								</p></div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Salary Range:</p></div>
       								<div class="col-md-8"><p>
       								<?php if(isset($job_det->salary_range))
       								{      									
				                          switch ($job_det->salary_range)
				                           {
				                              case "150,300":echo "150$ - 300$";break; 
				                              case "300,500":echo "300$ - 500$";break;
				                              case "500,750":echo "500$ - 750$";break;
				                              case ">=1000":echo "Over 1000$";break;
				                              default:echo "Negotaible";
				                          	}
				                        
       								}?>       									
       								</p></div>
       							</div>				       							       					
		       				</div>

		       				<div class="col-md-6">
       							<div class="row">
       								<div class="col-md-4"><p>Year of Experience:</p></div>
       								<div class="col-md-8"><p>
       								<?php 
       									if(isset($job_det->year_exp))
       									{
				                          switch ($job_det->year_exp)
				                          {
				                              case "1,2":echo "1 - 2 years";break; 
				                              case "2,3":echo "2 - 3 years";break;
				                              case "3,5":echo "3 - 5 years";break;
				                              case "5,7":echo "5 - 7 years";break;
				                              case "7,10":echo "7 - 10 years";break;
				                              case ">=10":echo "Over 10 years";break;
				                              default:echo "Other";
				                          }                        
       									}       									
       								?>
       									
       								</p></div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Education:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->edu)){echo $job_det->edu;}?></p></div>
       							</div>       							
       							<div class="row">
       								<div class="col-md-4"><p>Languages:</p></div>
       								<div class="col-md-8">
       								<p>
       									<?php if(isset($job_det->lang1)){echo $job_det->lang1.',';}?>
       									<?php if(isset($job_det->lang2)){echo $job_det->lang2.',';}?>
       									<?php if(isset($job_det->lang3)){echo $job_det->lang3.',';}?>
       									<?php if(isset($job_det->lang4)){echo $job_det->lang4;}?>	
       								</p>       								
       								</div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Hiring Quantity:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->hiring_qty)){echo $job_det->hiring_qty;}?></p></div>
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Category:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->cat_name)){echo $job_det->cat_name;}?></p></div>       								
       							</div>
       							<div class="row">
       								<div class="col-md-4"><p>Location:</p></div>
       								<div class="col-md-8"><p><?php if(isset($job_det->loc_name)){echo $job_det->loc_name;}?></p></div>       								
       							</div>				       							       					
		       				</div>       								       						       		
			       						       						       				
			       			</table>
			       		</div>		       						       			




		       			</div>
		       		</div>		       	 
		    	</div>
		    <!--== Contact us ==-->   
		    	



		    	
	    	</div><!-- this panel-body -->
		</div><!-- this panel panel-default -->

<!--== Advertising Right ==-->
	<div class="col-md-2"><iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8888%2FKhmerJob%2Fjob_c%2Fjob_detail.com&layout=button_count&size=large&mobile_iframe=true&appId=353362871732588&width=83&height=28" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>		
    <div class="col-md-2"><a href="<?php if($job_det){echo base_url("home/job_thumbnail/".$job_det->job_title);}?>" class="thumbnail">Other Similar Job Position</a></div>
    <div class="col-md-2"><a href="<?php if($job_det){echo base_url("home/job_thumbnail/".$job_det->acc_name);}?>" class="thumbnail">Other Job from this company</a></div>
<!--== End Advertising Right ==-->

	