<?php $url= $this->uri->segment(1).'/'.$this->uri->segment(2); ?>
<?php echo form_open("ads_c/add/$url","id='form' name='form'");?>

	<div class="col-md-3"><!--=====side bar button ======-->
		<div class="list-group">
		  <a href="<?php echo base_url("user_account/account_info");?>" class="list-group-item">Account Information</a>
		  <a href="<?php echo base_url("job_c/post_job");?>" class="list-group-item">Post Job</a>
		  <a href="<?php echo base_url("cv_c/post_cv");?>" class="list-group-item">Post CV</a>
		  <a href="<?php echo base_url('skill_c/post_skill')?>" class="list-group-item">Post Skill</a>
		  <a href="<?php echo base_url("ads_c/post_ads");?>" class="list-group-item  active1">Advertisement</a>
		  <a href="<?php echo base_url("bundle_package_c/index");?>" class="list-group-item">Purchase Bundle Package</a>
		  <a href="<?php echo base_url("cv_paid_search_c/index");?>" class="list-group-item">Purchase CV Paid Search</a>
		</div>
	</div><!--=====end side bar button ======-->
	<div class="col-md-9"><!--===== form post job ======-->
		<div class="row">
			<div class="panel panel-default">
		        <div class="panel-body">
		        <!--====Erroor validation====-->
	        		<div class="row">
						<div class="col-lg-12">
						<?php
							if(!empty($error) OR validation_errors())
							{
						?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<strong>Attention!</strong><?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
							</div>
						<?php }?>
						</div>
					</div>
		        <!---=====End Error validation=====-->
			      
		        	<div class="row">
		        		<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Number</label>
		      					<?php echo form_input(array("name"=>"txtNumber","id"=>"txtNumber","value"=>$number,"class"=>"form-control","readonly"=>"readonly"));?>		      					
		      				</div>		      				
			        	</div>
		      			<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Advertisement ID</label>
		      					<?php echo form_input(array("name"=>"txtAdsID","id"=>"txtAdsID","value"=>$ads_code,"class"=>"form-control","readonly"=>"readonly"));?>		      					
		      				</div>
		      				<input type="hidden" name="txt_post_ads_id" id="txt_post_ads_id" value="<?php echo $edit->post_ads_id;?>">			        					        						        						        			      				
			        	</div>			        	
					</div>

					<div class="row">
						<div class="col-md-6">
		      				<div class="form-group">
		      					<label class="control-label">Advertisement Location</label>		      					
		      					<select name="ddlAdsLoc" id="ddlAdsLoc" class="form-control"  <?php echo ($edit->post_ads_status=="Published" OR $edit->post_ads_status=="Pending" OR $edit->post_ads_status=="Expired")?"disabled":NULL;?>>
		      						<option value="">Choose one</option>
		      						<?php if(isset($ads_setup)){foreach($ads_setup as $ads_setup1){?>
		      							<option value="<?php echo $ads_setup1->rate_det_id;?>" <?php if(isset($edit)){if($edit->ads_type==$ads_setup1->rate_det_id){echo "selected";}}?> <?php if(isset($Top) && $Top->rate_det_type==$ads_setup1->rate_det_type){echo 'disabled';}?>><?php echo $ads_setup1->ads_setup2;?></option>
		      						<?php }}?>		      								      								      					
		      					</select>
		      				</div>			        					        						        						        	
			        	</div>
			        	<div class="col-md-6">
				    		<label class="control-label">Posting Date</label>
		      				<div class="input-group datetimepicker">
		      					<?php echo form_input(array("name"=>"txtPostingDate","id"=>"txtPostingDate","value"=>$edit->post_ads_date,"class"=>"form-control datetimepicker","placeholder"=>"Click on Posting date"));?>		      											      					                                         		                                          
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>                                
                    		</div>			        					        						        						        	
			        	</div>		     						        				        	
					</div>

					<div class="row">
						<div class="col-md-6">											
				    		<label class="control-label">Advertisement URL</label>
	                          <div class="form-group">
	                            <?php echo form_input(array("name"=>"txtAdsURL","id"=>"txtAdsURL","value"=>$edit->ads_url,"class"=>"form-control"));?>		      					
	                          </div>							    	
						</div>
						<div class="col-md-6">											
				    		<label class="control-label">Image</label>
	                          <div class="form-group">
	                            <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal">
	                            Upload Image
	                            </button><img src="<?php echo base_url('assets/uploads/'.$edit->ads_img)?>" style="width:150px; margin-left:10px;">	
	                          	<input type="hidden" name="imgEdit" id="imgEdit" value="<?php if(isset($edit->ads_img)){echo $edit->ads_img;}?>">
	                          </div>							    	
						</div>
					</div><hr>
					 <div class="row">
	                      <div class="col-lg-12">
	                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                            <div class="modal-dialog" role="document">
	                              <div class="modal-content">
	                                <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                <h4 class="modal-title" id="myModalLabel">Browse Image</h4>
	                                </div>
	                                <div class="modal-body">
	                                <input  type="file" name="txtUpload"/>
	                                <input type="hidden" id="txtImgName" name="txtImgName" />
	                                <div id="response" style="margin-top:10px;color:green;font-weight:bold;"></div>
	                                </div>
	                                <div class="modal-footer">
	                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                                <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload</button>
	                                </div>
	                              </div>
	                            </div>
	                          </div>
	                      </div>
	                  </div>
					

					
															
					<div class="row"><!--==== button action ====-->
						<div class="col-md-12">
							<input type="submit" name="btnPreview" id="btnPreview" class="btn btn-default" value="Preview">							
							<input type="submit" name="btnDelete" id="btnDelete" class="btn btn-default" value="Delete">														
							<input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-default" value="Update">
							<input type="submit" name="btnSubmit_edit" id="btnSubmit_edit" class="btn btn-success pull-right" value="Submit"   <?php echo ($edit->post_ads_status=="Published" OR $edit->post_ads_status=="Pending" OR $edit->post_ads_status=="Expired")?"disabled":NULL;?>>																					
						</div>
					</div><!--==== end button action ====-->
															
					
					<div class="row" style="margin-top: 20px"><!--==== show post history ====-->
						<div class="col-md-12">						
							<button class="btn btn-success btn-md btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Show Advertisement Posting History</button>										
							<div class="collapse" id="collapseExample">
							  <div class="well">
							    <div class="panel panel-default">
									<div class="panel-heading">Advertisement Posting History</div>
										<div class="panel-body">
											<table class="table table-trip">
												<tr>
													<th>No</th>
													<th>Ads ID</th>
													<th>Ads Location</th>
													<th>Post Date</th>
													<th>End Date</th>												
													<th>Duration</th>
													<th>Status</th>												
													<th>Action</th>
													<th>Edit | Delete</th>
												</tr>
												<?php $i=1;if($post_history==TRUE)
												{
													foreach($post_history as $p_h)
													{
												?>
													<tr>
													<td><?php echo $i;$i++;?></td>
													<td><?php echo $p_h->ads_code;?></td>
													<td><?php echo $p_h->rate_det_type;?></td>
													<td><?php echo $p_h->post_ads_date;?></td>
													<td><?php echo date("Y-m-d",strtotime("+$p_h->duration days",strtotime($p_h->post_ads_date)))?></td>																																														
													<td><?php echo $p_h->duration.' days';?></td>
													<td><?php echo $p_h->post_ads_status;?></td>												
													<td><?php echo $p_h->post_ads_action;?></td>
													<td><a href="<?php echo base_url('ads_c/post_ads_edit/'.$p_h->post_ads_id)?>" style="margin-right:5px;">Edit</a><a href="<?php echo base_url('ads_c/delete/'.$p_h->post_ads_id)?>">Delete</a></td>
												</tr>
												<?php	
													}	
												}?>											
											</table>
										</div>
								</div>
							  </div>
							</div>
						</div>
					</div><!--==== end show post history ====-->
				</div>
			</div>
		</div>							
	</div><!--===== end form post job ======-->

<?php echo form_close();?>

<script>
	function uploadFile() {
		var formData = new FormData();
		formData.append('image', $('input[type=file]')[0].files[0]); 
		$.ajax({
			url: '<?php echo base_url()?>ng/upload.php',
			data: formData,
			type: 'POST',
			// THIS MUST BE DONE FOR FILE UPLOADING
			contentType: false,
			processData: false,
			// ... Other options like success and etc
			
			success: function(data) {
				document.getElementById("response").innerText = "Upload Complete!"; 
				document.getElementById("txtImgName").value = data;
			}			
		});
		
	}
</script>

