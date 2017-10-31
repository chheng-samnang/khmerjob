
            <style>
                .td{
                  padding-top:10px;
                }
                .pd{
                  padding-top: 3px;
                  text-indent: 20px;
                }
                 .capt_cha{
                  background-image: url("<?php echo base_url('assets/photo_captchar.jpg')?>");
                  /*background-color:#ffe4b5;*/
                  width:180px; 
                  color:#a05959;
                  border-left-style: dotted;
                 text-shadow: 1px 3px red;
                 font-size:70px;
               }
            </style>
            <?php 
              foreach ($contacts as $contact){
                $phone1 =$contact->phone1;
                $phone2 = $contact->phone2;
                $phone3 = $contact->phone3;
                $email  = $contact->email;
                $addr = $contact->addr;
                $fb_smg = $contact->fb_messager;
                $whatsApp = $contact->whatApp;
                $line = $contact->line;
                $viber = $contact->viber;                
              }
            ?>


            <div class="col-md-12">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><u>Contact Us</u></b> Welcome to<a href="<?php echo base_url("home")?>"> Khmer-job.com</a> you can reach us by the following means
                        </div>
                        <div class="panel-body">
                          <div class="row td">
                            <div class="col-sm-4"><b style="margin-top:20px"><u>Phone Contact</u></a></b></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">Tel1:</div>
                            <div class="col-sm-2 pd"><?php echo $phone1; ?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">Tel2:</div>
                            <div class="col-sm-2 pd"><?php echo $phone2;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">Tel3:</div>
                            <div class="col-sm-2 pd"><?php echo $phone3;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd"><u>Email:</u></div>
                            <div class="col-sm-2 pd"><?php echo $email;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd"><u>Address:</u></div>
                            <div class="col-sm-6 pd"><?php echo $addr;?></div>
                          </div>
                          <u><b>Contact Online</b>
                           <div  class="row">
                            <div class="col-sm-4 pd">Facebook Messeger:</div>
                            <div class="col-sm-2 pd"><?php echo $fb_smg ;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">WhatsApp</div>
                            <div class="col-sm-2 pd"><?php echo $whatsApp;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">Line:</div>
                            <div class="col-sm-2 pd"><?php echo $line;?></div>
                          </div>
                          <div  class="row">
                            <div class="col-sm-4 pd">Viber:</div>
                            <div class="col-sm-2 pd"><?php echo $viber;?></div>

                          </div>
                          <div class="panel-body">
                            <div class="row td">
                              <div class="col-sm-4"><b style="margin-top:20px"><u>Phone Contact</u></a></b></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">Tel1:</div>
                              <div class="col-sm-2 pd"><?php echo $phone1; ?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">Tel2:</div>
                              <div class="col-sm-2 pd"><?php echo $phone2;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">Tel3:</div>
                              <div class="col-sm-2 pd"><?php echo $phone3;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd"><u>Email:</u></div>
                              <div class="col-sm-2 pd"><?php echo $email;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd"><u>Address:</u></div>
                              <div class="col-sm-6 pd"><?php echo $addr;?></div>
                            </div>
                            <u><b>Contact Online</b>
                             <div  class="row">
                              <div class="col-sm-4 pd">Facebook Messeger:</div>
                              <div class="col-sm-2 pd"><?php echo $fb_smg ;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">WhatsApp</div>
                              <div class="col-sm-2 pd"><?php echo $whatsApp;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">Line:</div>
                              <div class="col-sm-2 pd"><?php echo $line;?></div>
                            </div>
                            <div  class="row">
                              <div class="col-sm-4 pd">Viber:</div>
                              <div class="col-sm-2 pd"><?php echo $viber;?></div>
                            </div>
                              <div class="row" style="margin-top:10px"> 
                                <form action="<?php echo base_url("home/send_email"); ?>" method="post" name="form" id="form">
                                    <div class="col-md-12" > 
                                      <u><b>You can use bellow form for more enquiries:</b></u>
                                      <div class="row">
                                        <div class="col-md-12">
                                           <div class="thumbnail" style="padding: 29px 10px 32px;">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                     Your Name
                                                     <input type="text" name="txtName" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                    Your mail ddress
                                                     <input type="text" name="txtYourEmail" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                    Subject
                                                    <input type="text" name="txtSubject" id="txtSubject" class="form-control">
                                                  </div>
                                              </div>
                                               <div class="row">
                                                  <div class="col-md-12">
                                                      Your Message
                                                      <textarea name="areaMessage" id="areaMessage" class="form-control" placeholder="Enter Your Message.." rows="10" style="height:100px"></textarea><br />
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4">
                                                    <div class="text-center capt_cha">
                                                          <h1 style="font-family:Parchment;font-size:44px"><b style="font-family:Parchment"><i><?php echo $rand= rand(1000000,20000000);?></i></b></h1>
                                                          <input type="hidden" value="<?php echo $rand; ?>" name="txtCaptcha1" id="txtCaptcha1">
                                                    </div>
                                                    <?php echo form_input("txtCaptcha1","",array("class"=>"form-control","placeholder"=>"enter number","ng-model"=>"txtCaptcha2","valid-txtCaptcha2","id"=>"txtCaptcha2","required"=>"","onkeyup"=>"captcha(); return false"));?>                                          
                                                    <!-- <input type="narrow text input" value="" placeholder="enter number" name="txtCaptcha2" id="txtCaptcha2" class="form-control" style="background-color:#ddd; "> -->
                                                  </div>
                                                  <div class="col-sm-8">
                                                    <div class="pull-right" style="margin-top:75px;">
                                                    <?php echo form_button("btnSend","Send",array("class"=>"btn btn-success btn-sm disabled","id"=>"btnSend","onclick"=>"SendEmail()"));?>                                   
                                                    </div>
                                                  </div>
                                              </div>                                  
                                           </div>
                                        </div>
                                      </div>
                                    </div>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            <?php echo form_close();?>
            <script type="text/javascript">
              function captcha(){
                var capt1 = document.getElementById('txtCaptcha1');
                var capt2 = document.getElementById('txtCaptcha2');
                  if(capt1.value==capt2.value)
                  {
                    $("#btnSend").removeAttr("disabled");
                    $('#btnSend').removeClass('disabled');
                  }
              }
              function SendEmail(){
                document.getElementById("form").submit();
              }
            </script>