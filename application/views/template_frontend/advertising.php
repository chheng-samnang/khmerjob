	<div class="col-md-2">
	<?php if($right_ads){foreach($right_ads as $right_ads1){?>
		<a href="<?php echo $right_ads1->ads_url;?>" class="thumbnail" target="_blank">
		    <img src="<?php echo base_url('assets/uploads/'.$right_ads1->ads_img);?>" title="<?php echo $right_ads1->ads_url;?>" style="width: 100%;height: 110px;">
		</a>
	<?php }}?>
	</div><!-- col-md-2 advertising -->
</div><!-- class row -->