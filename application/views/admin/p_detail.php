<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</nav>
	<div id="page-wrapper">
		<div class="container_fluid" style="margin-top:40px;">
		<div class="row">
			<div class="col-lg-12">				
				<h1 class="page-header">Form Product Detail</h1>				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Product detail Information</h3>
					</div>
					<div class="panel-body">
							 <div class="col-lg-6">
                                <img class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$media->path);?>"/>
                            </div>
							<div class="col-lg-6">
                                <div><b>Store name: </b><?php echo $detail->str_name;?></div>
                                <div><b>Category name: </b><?php echo $detail->cat_name;?></div>
                                <div><b>Brand name: </b><?php echo $detail->brn_name;?></div>
                                <div><b>Product name: </b><?php echo $detail->p_name;?></div>                                        
                                <div><b>Price: </b><?php echo $detail->price."$";?></div>
                                <div><b>Quantity: </b><?php echo $detail->qty;?></div>                                        
                                <div><b>Color: </b><?php echo $detail->color;?></div>                                        
                                <div><b>Size: </b><?php echo $detail->size;?></div>
                                <div><b>Model: </b><?php echo $detail->model;?></div>                                        
                                <div><b>Date release: </b><?php echo date("d/m/Y",strtotime($detail->date_release));?></div>
                                <div><b>Dimension: </b><?php echo $detail->dimension;?></div>
                                <div><b>Short Description: </b><div class="thumbnail"><?php echo $detail->short_desc;?></div></div>                                                                                
                                <div><b>Product Description: </b><div class="thumbnail"><?php echo $detail->p_desc;?></div></div>                                
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
