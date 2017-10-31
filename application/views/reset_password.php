
<!--Pulling Awesome Font -->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/style1.css">
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
      <div class="col-md-offset-5 col-md-3">

      </div>
        <div class="col-md-offset-5 col-md-3 log">

           <form name="form" id="form" action="<?php echo base_url();?>home/reset_password/<?php echo $acc_id?>" method="POST">
                <div class="form-login">


                    <div class="row">
                      <div class="col-lg-12">
                      <?php
                        if(!empty($error) OR validation_errors())
                        {
                      ?>

                      <?php }?>
                    </div>
                    </div>
                    <input type="hidden" name="txtEmail" value="<?php echo $acc_id?>">
                    <span style="font-weight:bold;color:red;"><?php if(!empty($msg)){echo $msg;}?></span>
                    <div class="form-group">
                        <div class="input-group">

                            <label for="">New Password</label>
                            <input type="password" name="txtNewPassword" value="" placeholder="Enter New Password here..." class="form-control" required>
                        </div>
                        <!-- <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span> -->
                    </div>
                    <div class="form-group">
                        <div class="input-group">

                            <label for="">Confirm Password</label>
                            <input type="password" name="txtConfirm" value="" placeholder="Enter Confirm Password here..." class="form-control" required>
                        </div>
                        <!-- <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span> -->
                    </div>

                    <div class="wrapper">
                        <span class="group-btn">
                            <input type="submit" name="btnSave" class="btn btn-success btn-md" value="Save">
                        </span>
                        <span class="group-btn">
                            <a class="btn btn-default btn-md" href="<?php echo base_url( $this->session->cancel); ?>">Canel<i></i></a>
                        </span>
                    </div>

                </div>
           </form>
        </div>
    </div>
</div>
