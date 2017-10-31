<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">


    <!--==== Title Header ====-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Form Pay walk in</h1>
            </div>            
        </div>
    <!--==== End Title Header ====-->
       
    <!--==== Form ====-->
      <?php echo form_open(base_url("admin/pay_walk_in_c/add"));?>
        <div class="row">
            <div class="col-lg-6">                     
                <div class="panel panel-primary">
                    <div class="panel-heading">Pay walk in </div>
                    <div class="panel-body">


                    <?php if(validation_errors() OR !empty($error_msg)){?>
              <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-12">                      
                          <span ng-show="form_error"> 
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong><?php if(validation_errors()){echo validation_errors();}if(!empty($error_msg)){echo $error_msg;}?>                                                               
                            </div>
                          </span>                        
                        </div>              
                    </div>                    
              <!--==== end msg error =====-->
                    <?php }?>                                            
                      
                <!--== form ==-->
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Account ID</label>
                            <input type="text" value="<?php set_value("acc_code");?>" name="acc_code" class="form-control" id="acc_code" placeholder="Please Enter account ID">
                          </div>
                        </div>
                         <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Post Type</label>
                            <select class="form-control" name="post_type" id="post_type">
                                <option value="">Choose One</option>
                                <option value="job">Job</option>
                                <option value="cv">Cv</option>
                                <option value="skill">Skill</option>
                                <option value="ads">Advertisement</option>
                                <option value="bp">Bundle Package</option>
                                <option value="cps">Cv Paid Search</option>
                            </select>
                          </div>
                        </div>
                      </div>
                <!--=== End form===-->

                <!--==Button==-->
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="pull-right">
                           <input type="submit" name="submit" id="submit" value="Go!" class="btn btn-success">
                           <a href="<?php echo base_url("main");?>" class="btn btn-default">Cancel</a>
                          </div>
                        </div>                         
                      </div>  
                <!--== End Button ==--> 

                    </div>    
                </div>            
            </div>                
        </div>
      <?php form_close();?>
    <!--==== End Form ====-->


    </div>  
  </div><!--== End wrapper ==-->
</body>
</html>

