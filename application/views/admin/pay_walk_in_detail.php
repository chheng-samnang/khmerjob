<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
    <!--==== Title Header ====-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Form Pay walk in Detail</h1>
            </div>            
        </div>
    <!--==== End Title Header ====-->
       
    <!--==== Form ====-->
      <?php echo form_open(base_url("admin/pay_walk_in_c/add"));?>
        <div class="row">
            <div class="col-lg-7"><!--==left==-->                     
                <div class="panel panel-primary">
                    <div class="panel-heading">Pay walk in </div>
                    <div class="panel-body">                                                            
                      
                <!--== form ==-->
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="table table-border">
                            <tr>
                              <th>Post ID</th>
                              <th>Price</th>
                              <th>Duration</th>
                              <th>Discount</th>
                              <th>Post Type</th>
                            </tr>
                            <?php if($val){foreach($val as $val1){?>
                              <tr>
                                <td><?php echo $val1->job_code;?></td>
                                <td><?php echo $val1->price;?></td>
                                <td><?php echo $val1->duration;?></td>
                                <td><?php echo $val1->job_code;?></td>
                                <td><?php echo $val1->rate_det_type;?></td>
                              </tr>
                            <?php }}?>

                          </table>
                        </div>
                      </div>
                <!--=== End form===-->                

                    </div>    
                </div>            
            </div><!--==left==-->


            <div class="col-lg-5"><!--==left==-->                     
                <div class="panel panel-primary">
                    <div class="panel-heading">Pay walk in </div>
                    <div class="panel-body">


                    <?php if(validation_errors()){?>
              <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-12">                      
                          <span ng-show="form_error"> 
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong><?php echo validation_errors();?>                                                               
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
                            <label class="control-label">Sub Total($)</label>
                            <input type="" name="" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Discount(%)</label>
                            <input type="" name="" class="form-control" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="control-label">Total($)</label>
                            <input type="" name="" class="form-control" readonly>
                          </div>
                        </div>
                        <div class="col-lg-6" style="margin-top:30px;">
                          <label class="radio-inline">
                            <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="<?php if(isset($VAT)){echo $VAT->key_code;}?>" checked ng-click="value1(<?php if(isset($VAT)){echo $VAT->key_code;}?>)"> Need VAT
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="VAT" id="VAT" ng-model="VAT" value="0" ng-click="value2(0)"> No Need VAT                  
                          </label>       
                        </div>                       
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label class="control-label">Grand Total($)</label>
                            <input type="" name="" class="form-control" readonly>
                          </div>
                        </div>                                             
                      </div><hr>

                       <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Cash($)</label>
                            <input type="" name="" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Exchange($)</label>
                            <input type="" name="" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="control-label">Total($)</label>
                            <input type="" name="" class="form-control">
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
            </div><!--==left==-->


        </div>
      <?php form_close();?>
    <!--==== End Form ====-->


    </div>  
  </div><!--== End wrapper ==-->
</body>
</html>

