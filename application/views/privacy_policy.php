
<div class="col-md-12">
  <div class="panel panel-default">
  <div class="panel-heading">
                <b>Privacy Policy</b>
      </div>
    <div class="panel-body">
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php
          foreach($privacy_policy as $value){
          ?>
            <div role="tab" style="margin-top:15px;">
                 <?php echo  $value->descr;  ?>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
          
