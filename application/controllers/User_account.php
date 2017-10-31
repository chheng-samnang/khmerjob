<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_account extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m');
			$this->page_redirect="user_account";
			$this->load->model('front/advertising_m');
			$this->load->model('front/job_m');
			$this->load->model('front/skill_m');
			$this->load->model('front/bundle_package_m');
			$this->load->model('front/cv_paid_search_m');
			$this->load->model('front/ads_m');
			$this->account_login=$this->session->acc_log1;
		}

		public function add_date($date,$day)
		{
			$date = date_create($date);
			date_add($date,date_interval_create_from_date_string($day." days"));
			return date_format($date,"Y-m-d");
		}
		public function account_info()
		{	if($this->session->acc_log1!="")
			{

        $data["acc_head"]=$this->account_m->acc_head();
				$data['job']=$this->job_m->post_history();
				$data['cv']=$this->account_m->post_history();
				$date =  !empty($data['cv'][0]->date_update)?$data['cv'][0]->date_update:$data['cv'][0]->date_crea;
				$data["date"] = substr($date,0,10);
				echo $time = strtotime("25/08/2017");
				$duration = $data["cv"][0]->duration;
				$data["expired"] = $this->add_date($date,$duration);
				$data['ads']=$this->ads_m->post_history();
				$data['skill']=$this->skill_m->post_history();
				$data['bp']=$this->bundle_package_m->post_history();
				$data['cps']=$this->cv_paid_search_m->post_history();
				$data['acc_info'] = $this->account_m->index($this->account_login);//slect tbl_account
				$data["ads_top"]=$this->advertising_m->ads_top();
				//get free hour from tbl_cv_paidserach referent with bunldle Package && advertisement
				$ads=$this->account_m->free_cps_ads();
				$bp=$this->account_m->free_cps_bp();
				$data["free_cps"]=$ads+$bp;
				//get free post_job reference with advertisment(top)
				$data["free_premium"]=$this->account_m->free_premium_bp();
				$this->load->view('template_frontend/herder_and_nav',$data);
				$this->load->view('user_account',$data);
				$this->load->view('template_frontend/footer');
			}else{required("home/acc_log");}
		}
		public function validation()
		{
			$this->form_validation->set_rules('txtAccPass',' password','required');
			$this->form_validation->set_rules('txtConPasswd','Confirm','required');
			$this->form_validation->set_rules('txtAccName','Name','required');
			$this->form_validation->set_rules('txtAddr','Address','required');
			$this->form_validation->set_rules('txtEmail','Email','required');
			$this->form_validation->set_rules('txtDesc','Description','required');
			$this->form_validation->set_rules('txtPhone','Number','required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function get_acc($error="")
		{
			$data["acc_head"]=$this->account_m->acc_head();
			$data["error"]=$error;
			$data['action'] = "{$this->page_redirect}/acc_edit";
			$data['acc_info'] = $this->account_m->index($this->account_login);
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view('template_frontend/herder_and_nav',$data);
			$this->load->view("account_edit",$data);
			$this->load->view('template/footer1');
		}
		public function acc_edit()
		{
			if($this->validation()==TRUE)
			{
				$acc_pass=$this->input->post("acc_pass");
				$newpass=$this->input->post("txtAccPass");

				$old_pass=do_hash($this->input->post("acc_pass1"));
				$txtcon=$this->input->post("txtConPasswd");
				if($old_pass==$acc_pass)
				{
					if($newpass==$txtcon){
						$row=$this->account_m->edit($this->account_login);
						if($row==TRUE){redirect("user_account/account_info");}

					}else{$this->get_acc("Confirm password Not match..!");}
				}else{$this->get_acc("Incorrect Old password ..!");}
			}
			else{$this->get_acc();}
		}

	}
