<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default" style="border-radius: 0px;">
	       	<div class="panel-body">
	       		<div class="row">	       			
		       		<div class="col-md-2">

		       			<img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$skill_det->img);?>">
		       		</div>
		       		<div class="col-md-2">
		       			<div class="row">Name:</div>	       						       			
		       			<div class="row">Address:</div>		       						       			
		       			<div class="row">Tel:</div>		       						       			
		       			<div class="row">Email:</div>		       						       			
		       			<div class="row">Line</div>		       						       			
		       			<div class="row">WhatsApp</div>		       						       			
		       			<div class="row">Website</div>	       						       			
		       		</div>
		       		<div class="col-md-6">
		       			<div class="row"><?php echo $skill_det->name;?></div>
		       			<div class="row"><?php echo $skill_det->addr;?></div>
		       			<div class="row"><?php echo $skill_det->phone;?></div>
		       			<div class="row"><?php echo $skill_det->email;?></div>
		       			<div class="row"><?php echo $skill_det->line;?></div>
		       			<div class="row"><?php echo $skill_det->whatApp;?></div>		       						       <div class="row"><?php echo $skill_det->website;?></div>			       			
		       		</div>
		       	</div><hr /><!-- logo company and job title -->

		       	<div class="row">
			       	<div class="col-md-12">			       		
			       		<div><h5><b>ABOUNT ME</b></h5></div>		       						       		
			       		<div><ol><li><?php echo $skill_det->about_me;?></li></ol></div>			       						       		
			       	</div>			    
		       	</div><hr />

		       	<div class="row">
			       	<div class="col-md-12">			       		
			       		<div><h5><b>SKILL/SERVICE</b></h5></div>			       						       					       				       			
		       			<div><ol><li><?php echo $skill_det->skill_det_name;?></li></ol></div>		       					       						       					       					       					       	
			       	</div>
			    </div><hr/>
			    <div class="row">
			       	<div class="col-md-12">			       		
			       		<div><h5><b>ADDICTION INFORMATION</b></h5></div>
			       		<div><b>I am / We are avallable as:</b></div>			       						       		
			       		<div><ol><li><?php echo $skill_det->service_provider==1?"Severvice Provider":NULL;?></li><li><?php echo $skill_det->employee==1?"Employee":NULL;?></li></ol></div>			       		
			       		<hr/>
			       	</div>
			    </div>
			    <div class="row">
			       	<div class="col-md-12">
			       		<div class="panel panel-default" style="border-radius: 0px;">
	       					<div class="panel-body">
	       						<?php echo $skill_det->googleMap;?>
	       					</div>
	       				</div>
			       	</div>
			     </div>

		       	</div><!-- abount company-->
	    	</div><!-- this panel-body -->
		</div><!-- this panel panel-default -->
		<!--== Advertising Right ==-->
	<div class="col-md-2"><iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Flocalhost%3A8888%2FKhmerJob%2Fjob_c%2Fjob_detail.com&layout=button_count&size=large&mobile_iframe=true&appId=353362871732588&width=83&height=28" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>		
    <div class="col-md-2"><a href="<?php if($skill_det){echo base_url("home/skill_thumbnail/".$skill_det->skill_det_name);}?>" class="thumbnail">Other Similar Skills</a></div>
    <div class="col-md-2"><a href="<?php if($skill_det){echo base_url("home/skill_thumbnail/".$skill_det->name);}?>" class="thumbnail">Other Skills from this Individual/Company</a></div>
<!--== End Advertising Right ==-->
