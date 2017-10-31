
<!--Pulling Awesome Font -->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/style1.css">
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
      <div class="col-md-offset-5 col-md-3">
        <div class="alert alert-success" role="alert">
          <p><i class="glyphicon glyphicon-info-sign"></i> Please enter your email here, so that we can send a link to reset your password.</p>
        </div>
      </div>
        <div class="col-md-offset-5 col-md-3 log">

           <form name="form" id="form" action="<?php echo base_url();?>home/forgot_password" method="POST">
                <div class="form-login">
                    <h4 class="text-center">Reset Password</h4>

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
                          <?php if(!empty($error)){echo $error;}if(validation_errors()){echo validation_errors();}?>
                        </div>
                      <?php }?>
                    </div>
                    </div>
                    <span style="font-weight:bold;color:red;"><?php if(!empty($msg)){echo $msg;}?></span>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-envelope" aria-hidden="true" style="width: auto"></i>
                            </span>
                            <input name="txtEmail" id="txtEmail" runat="server" type="text" ng-model="txtEmail" class="form-control" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" id="txtEmail"  placeholder="email" required/>
                        </div>
                        <!-- <span style="color:Red" ng-show="form.txtEmail.$dirty&&form.txtEmail.$error.pattern">Please enter valid email</span> -->
                    </div>

                    <div class="wrapper">
                        <span class="group-btn">
                            <input type="submit" name="btnSubmit" class="btn btn-primary btn-md" value="Submit">
                        </span>
                        <span class="group-btn">
                            <a class="btn btn-default btn-md" href="<?php echo base_url( $this->session->cancel); ?>">Canel<i></i></a>
                        </span>
                    </div>

                     <span class="group-btn " style="margin-left:200px">
                            <a href="<?php echo base_url();?>registerControl">Register<i class=""  aria-hidden="true"></i></a>
                        </span>

                </div>
           </form>
        </div>
    </div>
</div>
