
<div class="col-md-12">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Advertise Rate</b>
            </div>
            <div class="panel-body">
                <p>
                <?php foreach ($desc as $result)
                {
                  echo "<h4 class='text_space'>". $result->rate_desc."<h4>";
                } 
                ?></p>
            <div class="table-responsive">
               <table class="table table-bordered">
                <tr class="tab_color">
                  <td>Advertisement Type</td>
                  <td>Duration</td>
                  <td>Size</td>
                  <td>Price/Ads</td>
                  <td>Discount</td>
                  <td>Free Per Month</td>
                </tr>
                <?php
                  foreach ($ads as $value) {
                ?> 
                <tr>
                  <td><?php echo $value->rate_det_type; ?></td>
                  <td><?php echo $value->duration;?> Month<?php if($value->duration >1){ echo "s";} ?></td>
                  <td><?php echo $value->ads_size;?></td>
                  <td><?php echo $value->price;?> $</td>
                  <td><?php echo $value->ads_discount;?> %</td>
                  <td><?php echo $value->key_code?></td>
                </tr> 
                <?php 
                  }
                ?>
              </table>
            </div>
           <div class="col-lg-12" style="margin-top:10px">
          <div class="row">
            <u><b>Post Advertise</b></u> 
            <a href="" class="btn btn-primary pull-right">Post your advertise</a>
            
              <h5 style="color: #03A9F4; font-weight: bold;margin-top:20px"><i>[if advertiser click on “Post Ads” or click on “Post your ads now button” they will be  directed to below page (attached file “Post Ads Page for khmer‐job.com.”)] 
            </i></h5>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>