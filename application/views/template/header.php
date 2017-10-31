<?php
    //check validation,expire,alert message to client, and update by auto use the refresh page HTML,....
include("ng/db.php");
date_default_timezone_set("Asia/Phnom_Penh");
//check CV
    $result=$conn->query("SELECT cv.photo,cv.post_cv_id,rd.rate_det_type,rd.duration,cv.date_crea,cv.date_update 
        FROM tbl_post_cv AS cv 
        INNER JOIN tbl_account AS acc ON cv.acc_id=acc.acc_id 
        INNER JOIN tbl_rate_detail AS rd ON cv.priority=rd.rate_det_id 
        WHERE post_cv_status='Published'");    

    while($rs = $result->fetch_array(MYSQLI_ASSOC))
    {   
        //if premium cv is expired duraton of buying change it to standard auto
        $date_crea=$rs["date_crea"];
        $date_update=$rs["date_update"];
        $duration=$rs["duration"];        
        $id=$rs["post_cv_id"];
        $photo=$rs["photo"];
        if($rs["rate_det_type"]=="Premium")
        {
            $expired=date('Y-m-d', strtotime($date_crea."+$duration days"));
            if(date('Y-m-d')>=$expired){$conn->query("UPDATE tbl_post_cv SET post_cv_status='Standard' WHERE post_cv_id='$id'");}            
        }
        if($rs["rate_det_type"]=="Standard")
        {
            //if duration of 2yeare not update it delete auto
           $expired=date('Y-m-d', strtotime($date_update."+2 years"));
            if(date('Y-m-d')>=$expired)
            {                
                unlink("assets/uploads/".$photo);
                $conn->query("DELETE tbl_post_cv WHERE post_cv_id='$id'");
            } 
        }           
    }
//check bundle package
    $result=$conn->query("SELECT bp.date_crea,bp.bp_id,s.key_code 
        FROM tbl_bundle_package AS bp 
        INNER JOIN tbl_sysdata AS s ON bp.key_id=s.key_id 
        WHERE bp.bp_status='Published'");
    while($rs = $result->fetch_array(MYSQLI_ASSOC))
    {
        $duration=$rs["key_code"];
        $date_crea=$rs["date_crea"];
        $id=$rs["bp_id"];
        $expired=date('Y-m-d', strtotime($date_crea."+$duration days"));        
        if(date("Y-m-d")>=$expired){$conn->query("UPDATE tbl_bundle_package SET bp_status='Expired',bp_action='Renew' WHERE bp_id='$id'");}                    
    }
//for cv paid search we are skipp because it define  it while custome click search...ok

//check Advertiment 
    $result=$conn->query("SELECT ads.post_ads_id,ads.date_crea,rd.duration 
        FROM tbl_post_ads AS ads 
        INNER JOIN tbl_rate_detail AS rd ON ads.ads_type=rd.rate_det_id 
        WHERE ads.post_ads_status='Published'");
    while($rs = $result->fetch_array(MYSQLI_ASSOC))
    {
        $duration=$rs["duration"];
        $date_crea=$rs["date_crea"];
        $id=$rs["post_ads_id"];
        $expired=date('Y-m-d', strtotime($date_crea."+$duration days"));        
        if(date("Y-m-d")>=$expired){$conn->query("UPDATE tbl_post_ads SET post_ads_status='Expired',post_ads_action='Renew' WHERE post_ads_id='$id'");}                    
    }

//check job 
    $result=$conn->query("SELECT j.post_job_status 
        FROM tbl_post_job AS j 
        INNER JOIN tbl_bundle_package AS bp ON j.acc_id=bp.acc_id
        WHERE bp.bp_status='Published' AND j.post_job_status='Published'");
    if($result->num_rows>0){NULL;}    
    else
    {
        $result=$conn->query("SELECT j.date_crea,j.post_job_id,j.post_job_status,rd.duration 
        FROM tbl_post_job AS j 
        INNER JOIN tbl_rate_detail AS rd ON j.priority=rd.rate_det_id
        WHERE j.post_job_status='Published'");
        while($rs = $result->fetch_array(MYSQLI_ASSOC))          
        {
            $duration=$rs["duration"];
            $date_crea=$rs["date_crea"];
            $id=$rs["post_job_id"];
            $expired=date('Y-m-d', strtotime($date_crea."+$duration days"));        
            if(date("Y-m-d")>=$expired){$conn->query("UPDATE tbl_post_job SET post_job_status='Expired',post_job_action='Renew' WHERE post_job_id='$id'");}                    
        }   
    }

    //check SKILL
    $result=$conn->query("SELECT sk.img,sk.post_skill_id,rd.rate_det_type,rd.duration,sk.date_crea,sk.date_update
        FROM tbl_post_skill AS sk 
        INNER JOIN tbl_account AS acc ON sk.acc_id=acc.acc_id 
        INNER JOIN tbl_rate_detail AS rd ON sk.priority=rd.rate_det_id 
        WHERE post_skill_status='Published'");   

    while($rs = $result->fetch_array(MYSQLI_ASSOC))
    {   
        //if premium cv is expired duraton of buying change it to standard auto
        $date_crea=$rs["date_crea"];
        $date_update=$rs["date_update"];
        $duration=$rs["duration"];        
        $id=$rs["post_skill_id"];
        $photo=$rs["img"];
        if($rs["rate_det_type"]=="Premium")
        {
            $expired=date('Y-m-d', strtotime($date_crea."+$duration days"));
            if(date('Y-m-d')>=$expired){$conn->query("UPDATE tbl_post_skill SET post_skill_status='Standard' WHERE post_skill_id='$id'");}            
        }
        if($rs["rate_det_type"]=="Standard")
        {
            //if duration of 2yeare not update it delete auto
           $expired=date('Y-m-d', strtotime($date_update."+2 years"));
            if(date('Y-m-d')>=$expired)
            {
                unlink("assets/uploads/".$photo);
                $conn->query("DELETE tbl_post_skill WHERE post_skill_id='$id'");
                $conn->query("DELETE tbl_post_skill_detail WHERE post_skill_id='$id'");
            }

        }           
    }
?>


<?php
    if(!isset($this->session->userLogin))
    {
        redirect("Logout");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="600">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Khmer Job</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/dist/css/bootstrap-datetimepicker.css">
    <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/moment-with-locals.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/dist/js/angular-route.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        .border:hover{border:solid 1px blue;}
        .borders{border:solid 1px blue;}
        #page-wrapper{background-color:#fbfbfb;}
        .panel-default{box-shadow: 2px 5px 5px #888888;}
        .panel-primary{box-shadow: 2px 5px 5px #888888;}
    </style>       
	
</head>
<body>

    <div id="wrapper" style="margin-top: 40px;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
                <a class="navbar-brand" href="<?php echo base_url('main');?>"><i class="fa fa-home"></i> Khmer Job</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><strong>Welcome <?php echo strtoupper($this->session->userLogin)?></strong></li>
                <li><a href="<?php echo base_url()?>home/" target="_blank"><i class="fa fa-eye"></i> Preview</a>
                <li><a href="<?php echo base_url()?>logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                
              
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
