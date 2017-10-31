<style type="text/css">
    .premium{background-color:#ffa500;color:#fff;padding:0px 10px;}
    .th{background-color:green;color:#fff; width: 25%;}
    .filter_search{height:60px;}
</style>
<?php echo form_open("home/home_search");?>
<!--==== Search and Filter ====-->
    <div class="row" style="margin-bottom: 40px">
        <div class="col-sm-9 col-md-9" style="padding-right: 0px;">
            <div class="input-group">
                <input type="text" name="txtSearch" id="txtSearch" class="form-control filter_search" placeholder="Search for..." style="background-color:rgba(204, 204, 204, 0.28);">
                <span class="input-group-btn" >
                    <button class="btn btn-success filter_search" type="submit" name="btn_submit" id="btn_submit" style="border-radius: 0px;"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                </span>
            </div>
        </div>
        <div class="col-sm-3 col-md-3" style="padding-right:30px;">
            <div class="row">
                <select class="form-control filter_search" style="background-color:rgba(204, 204, 204, 0.28)" name="ddlFilterSearch" id="ddlFilterSearch">
                    <option value="job" selected>JOB</option>
                    <option value="cv">CV</option>
                    <option value="skill">SKILL</option>
                </select>
            </div>
        </div>
    </div>
<!--==== End Search and Filter ====-->
<?php form_close();?>
<style type="text/css">
    .featur{background-color: green;color:#fff;text-align: center;padding:4px 0px;}
</style>
<div class="row">

<!--==== Featur Company && Recruitemnt Agency ====-->
    <div class="col-md-2">
        <div class="row">
            <div class="col-md-12">
                <h5 class="featur">Featured Employers</h5>
            </div>
        </div>
        <div class="row">
        <?php if($feature_emp){foreach($feature_emp as $feature_emp1){?>
            <div class="col-md-6 col-sm-7 col-xs-9">
                <a href="<?php echo base_url("home/job_thumbnail_freature/".$feature_emp1->acc_name);?>" title="<?php echo $feature_emp1->acc_name?>"><img src="<?php echo base_url('assets/uploads/'.$feature_emp1->acc_photo);?>" style="width: 90px;height:80px;margin-bottom: 10px;" class="thumbnail"></a>
            </div>
        <?php }}?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5 class="featur">Featured Recruitement Agencies</h5>
            </div>
        </div>
         <div class="row">
        <?php if($feature_recruit){foreach($feature_recruit as $feature_recruit1){?>
             <div class="col-md-6 col-sm-7 col-xs-9">
                <a href="<?php echo base_url("home/job_thumbnail_freature/".$feature_recruit1->acc_name);?>" title="<?php echo $feature_recruit1->acc_name?>"><img src="<?php echo base_url('assets/uploads/'.$feature_recruit1->acc_photo);?>" style="width: 90px;height:80px;margin-bottom: 10px;" class="thumbnail"></a>
            </div>
        <?php }}?>
        </div>
    </div>
<!--==== End Feature Company  && Recruitemnt Agency ====-->

<!--==== Premium Job,CV,Skill ====-->
    <div class="col-md-8">

    <!--==Premium Job ==-->
        <div class="row">
            <div class="col-md-3"><h4><b class="premium">Premium Job</b></h4></div>
        </div>
         <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <tr>
                    <td class="th">Priority</td>
                    <td class="th">Function</td>
                    <td class="th">Company</td>
                    <td class="th">Close Date</td>
                </tr>
            <?php if($premium_job==TRUE){foreach($premium_job as $premium_job1){?>
                <tr style="text-align:center;">
                    <td><img src="<?php echo base_url('assets/premium.gif')?>" style="width:60px"></td>
                    <td><a href="<?php echo base_url("job_c/job_detail/".$premium_job1->post_job_id);?>" title="Job Detail"><?php echo $premium_job1->job_title;?></a></td>
                    <td><a href="<?php echo base_url("home/job_thumbnail/".$premium_job1->post_job_id)?>/<?php echo $premium_job1->acc_id?>"><?php echo $premium_job1->acc_name;?></a></td>
                    <td><?php echo $this->input->date_new($premium_job1->end_date);?></td>
                </tr>
            <?php }}?>
                </table>
            </div>
        </div>
    <!--==End Premium Job ==-->

    <!--==Premium CV ==-->
        <div class="row">
            <div class="col-md-3"><h4><b class="premium">Premium CV</b></h4></div>
        </div>
         <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <tr>
                    <td class="th">Priority</td>
                    <td class="th">Function</td>
                    <td class="th">Name</td>
                    <td class="th">Photo</td>
                </tr>
            <?php if($premium_cv==TRUE){foreach($premium_cv as $premium_cv1){?>
                <tr style="text-align:center;">
                    <td><img src="<?php echo base_url('assets/premium.gif')?>" style="width:60px"></td>
                    <td><?php echo $premium_cv1->position;?></td>
                    <td><a href="<?php echo base_url("cv_c/cv_detail/".$premium_cv1->post_cv_id);?>" title="CV Detail" style="width:80px;height: 60px;margin:0px"><?php echo $premium_cv1->name;?></a></td>
                    <td><a href="<?php echo base_url("cv_c/cv_detail/".$premium_cv1->post_cv_id);?>" title="CV Detail" style="width:80px;height: 60px;margin:0px"><img class="img-responsive" style="width:90px;margin:auto;display:block;" src="<?php echo base_url("assets/uploads/".$premium_cv1->photo)?>"></a></td>
                </tr>
            <?php }}?>
                </table>
            </div>
        </div>
    <!--==End Premium CV ==-->

    <!--==Premium Skill ==-->
        <div class="row">
            <div class="col-md-3"><h4><b class="premium">Premium Skill</b></h4></div>
        </div>
         <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <tr>
                    <td class="th">Priority</td>
                    <td class="th">Skill</td>
                    <td class="th">Name</td>
                    <td class="th">Location</td>
                </tr>
                </tr>
            <?php if($premium_skill==TRUE){foreach($premium_skill as $premium_skill1){?>
                <tr style="text-align:center;">
                    <td><img src="<?php echo base_url('assets/premium.gif')?>" style="width:60px"></td>
                    <td><a href="<?php echo base_url("skill_c/skill_detail/".$premium_skill1->skill_det_id);?>" title="Skill Detail"><?php echo $premium_skill1->skill_det_name;?></a></td>
                    <td><a href="<?php echo base_url("skill_c/skill_detail/".$premium_skill1->skill_det_id);?>" title="Skill Detail"><?php echo $premium_skill1->name;?></a></td>
                    <td><?php echo $premium_skill1->loc_name;?></td>
                </tr>
            <?php }}?>
                </table>
            </div>
        </div>
    <!--==End Premium Skill ==-->
    </div>
<!--==== End Premium Job,CV,Skill ====-->
