<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class MainController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('main_m');
	}
	function index()
	{
		//category
		$data['job']=$this->main_m->index("jb");
		$data['cv']=$this->main_m->index("cv");
		$data['skill']=$this->main_m->index("sk");
		//sub category
		$data['s_job']=$this->main_m->sub_cat("post_job_id","tbl_post_job","post_job_status");
		$data['s_cv']=$this->main_m->sub_cat("post_cv_id","tbl_post_cv","post_cv_status");
		$data['s_skill']=$this->main_m->sub_cat("post_skill_id","tbl_post_skill","post_skill_status");
		$data['s_ads']=$this->main_m->sub_cat("post_ads_id","tbl_post_ads","post_ads_status");
		$data['s_bp']=$this->main_m->sub_cat("bp_id","tbl_bundle_package","bp_status");
		$data['s_cps']=$this->main_m->sub_cat("cps_id","tbl_cv_paid_search","cps_status");
		//account
		$data['acc']=$this->main_m->account();
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/main',$data);
		$this->load->view('template/footer');
	}
}
?>