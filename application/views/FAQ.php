
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
         $i=1; $j=1; 
          foreach($FAQ as $value){
          ?>
            <div role="tab" id="h<?php echo $i;?>" style="margin-top:15px;">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#c<?php echo $j;?>" aria-expanded="false" aria-controls="c<?php echo $j;?>" style="color:#056f05;">
                 <?php echo  $value->key_code;  ?>
                </a>
            </div>
           <div class="panel panel-default">
            <div id="c<?php echo $j;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h<?php echo $i;?>">
              <div class="panel-body">
                <p><?php echo  $value->key_data2;?></p>
              </div>
            </div>
          </div>
        <?php  $i++;  $j++; } ?>
      </div>
    </div>
  </div>
</div>
          
