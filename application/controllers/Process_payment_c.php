<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Process_payment_c extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->load->model('front/job_m');
			$this->load->model('front/advertising_m');
			$this->account_login=$this->session->acc_log1;
		}
		public function index()
		{
			if($this->account_login)
			{
				$data["post_id"]=$this->input->post("post_id");
				$data["VAT"]=$this->input->post("VAT");
				$this->session->post_id=$this->input->post("post_id");
				$this->session->type_post=$this->input->post("type_post");
				$this->load->view("process_payment",$data);
			}
			else
			{
				$this->session->url="home/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function payment_success($result=1)
		{
			if($result==1)
			{
				// redirect($this->session->type_post."/"."add_billing_info/".$this->session->post_id);
				$this->job_m->updateProcessPayment();
				redirect(base_url()."process_payment_c/way_to_payment");
			}
		}
		public function way_to_payment()
		{
      $data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view("way_to_payment");
			$this->load->view('template_frontend/footer');
		}


	}
