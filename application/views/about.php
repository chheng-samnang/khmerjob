            <style>
                .text_style{
                   text-indent:50px;
                   line-height: 2;
                }
            </style>
            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>About Us</b>
                        </div>
                        <div class="panel-body">
                            <p class="text_style"><?php foreach ($about as $value) {
                                echo $value->key_data2."</p>";
                              } ?>
                            </p>
                              <p><h3><a class="" href="<?php echo base_url("home");?>">Khmer-job.com team </a></h3></p>
                        </div>
                    </div>
                </div>
            </div>
            