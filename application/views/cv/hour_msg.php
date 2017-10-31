 <!--==== start error =====-->
                    <div class="row">
                        <div class="col-lg-12 ">
                          <span ng-show="form_error">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Warning!</strong> Please Purchase CV Paid Search to be granted to view and print the detail.
                            </div>
                          </span>
                        </div>
                    </div>
              <!--==== end msg error =====-->
              <div class="row">
                <div class="col-lg-12">
                  <div class="pull-right" style="margin-bottom: 20px">
                    <a href="<?php echo base_url("cv_paid_search_c/index");?>" class="btn btn-success">Purchase Now</a>
                    <a href="<?php echo base_url("home/index");?>" class="btn btn-default">Close</a>
                  </div>
                </div>
              </div>
