
<!--Pulling Awesome Font -->
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/style1.css">
<link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
      
        <div class="col-md-offset-3 col-md-3 log" style="width:473px;">

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
                    <p>     
                      An email has been sent to <?php echo $email?> with instructions on how to change your password. Please check your email inbox.
                    </p>

                    <div class="wrapper">
                        <span class="group-btn">
                            <input type="button" name="btnBack" onclick="back()" class="btn btn-primary btn-md" value="Back to Homepage">
                        </span>
                        
                    </div>

                </div>
           </form>
        </div>
    </div>
</div>

<script type="text/javascript">
  function back(){
    window.location.assign("<?php echo base_url()?>");
  }
  
</script>