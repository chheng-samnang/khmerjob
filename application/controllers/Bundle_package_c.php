<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Bundle_package_c extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->account_login=$this->session->acc_log1;
			$this->load->model('front/bundle_package_m');
			$this->load->model('front/advertising_m');
		}
		public function validation()
		{
			$this->form_validation->set_rules('ddlBpDuration','Bundle Package Duration','required');
			$this->form_validation->set_rules('txtPurchaseDate','Purchase Date','trim|required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function validation1()
		{
			//$this->form_validation->set_rules('ddlBpDuration','Bundle Package Duration','required');
			$this->form_validation->set_rules('txtPurchaseDate','Purchase Date','trim|required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function logout()
		{
			$logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
			$this->session->unset_userdata('acc_log1');
			$this->session->unset_userdata('start_count');
			redirect($logout_url);
		}
		public function post_history()
		{
			return $this->bundle_package_m->post_history();
		}
		public function index()
		{
			if($this->account_login)
			{
				$row=$this->bundle_package_m->get_saved();
				if($row==TRUE)
				{redirect("bundle_package_c/bundle_package_edit/".$row->bp_code);}
				else
				{
				  $data["acc_head"]=$this->acc->acc_head();
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav",$data);
					$row=$this->bundle_package_m->bp_code();
					if($row=="KJBP-000001"){$row1=$row;}
					else
					{
						$bp_code=substr($row->bp_code,5);
						$row1='KJBP-'.str_pad($bp_code+1, 6, "0", STR_PAD_LEFT);
					}
					$data["bp_code"]=$row1;
					//show post history
					$data['post_history']=$this->post_history();
					$data['bp_setup']=$this->bundle_package_m->bp_setup();
					$data["account"]=$this->bundle_package_m->account();
					$data["logout_url"]="bundle_package_c/logout/home/index";
					//$this->load->view("account_welcom/account_welcom",$data);
					$this->load->view("bundle_package/bundle_package",$data);
					$this->load->view('template_frontend/footer');
				}
			}
			else
			{
				$this->session->url="bundle_package_c/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function add()
		{
			if(isset($_POST['btnSave']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->bundle_package_m->add('Saved','Edit');
					if($row==TRUE){redirect("bundle_package_c/index");}
				}
				else{$this->index();}
			}
			elseif(isset($_POST['btnUpdate']))
			{
				if($this->bundle_package_m->check_published()==TRUE)
				{
					if($this->validation1()==TRUE)
					{
						$row=$this->bundle_package_m->edit_published();
						if($row==TRUE){redirect("bundle_package_c/index");}
					}
					else{$this->bundle_package_edit($this->session->id);}
				}
				else
				{
					if($this->validation()==TRUE)
					{
						$row=$this->bundle_package_m->edit('Saved','Edit');
						if($row==TRUE){redirect("bundle_package_c/index");}
					}
					else{$this->bundle_package_edit($this->session->id);}
				}
			}
			elseif(isset($_POST['btnDelete']))
			{
				$row=$this->bundle_package_m->delete($this->input->post('txtBpID'));
				if($row==TRUE){redirect("bundle_package_c/index");}
			}
			elseif(isset($_POST['btnSubmit']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->bundle_package_m->add('Submited','Pending');
					if($row==TRUE)
					{
						$this->bundle_package_m->free_cps();
						redirect("bundle_package_c/billing_info");
					}
				}
				else{$this->index();}
			}
			elseif(isset($_POST['btnSubmit_edit']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->bundle_package_m->edit('Submited','Pending');
					if($row==TRUE)
					{
						$this->bundle_package_m->free_cps();
						redirect("bundle_package_c/billing_info");
					}
				}
				else{$this->bundle_package_edit($this->session->id);}
			}
			elseif(isset($_POST['btnPreview']))
			{
				if($this->validation()==TRUE)
		        {
		        	$data["acc_info"]=$this->bundle_package_m->account();
		        	$data["puDuration"] = $this->bundle_package_m->bu_pa_duration($this->input->post('ddlBpDuration'));
		        	$data["puDate"] = $this->input->post('txtPurchaseDate');
					$this->load->view("bundle_package/preview",$data);
				}else{
					$url=$this->uri->segment(3).'/'.$this->uri->segment(4);
					if($url=="bundle_package_c/bundle_package_edit"){
						$this->bundle_package_edit($this->session->id);
					}else{
						$this->index();
					}
				} //get value to preview
			}
		}
		public function invoice_preview($VAT="")
		{
			$data["VAT"]=$VAT;
			$data["bp_info"]=$this->bundle_package_m->billing_info();
			$data["acc_info"]=$this->bundle_package_m->account();
			$this->load->view("bundle_package/invoice_preview",$data);
		}
		public function billing_info()
		{
			if($this->account_login)
			{
				$data["ads_top"]=$this->advertising_m->ads_top();
				$data["acc_head"]=$this->acc->acc_head();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data["VAT"]=$this->bundle_package_m->VAT();
				$data["billing_info"]=$this->bundle_package_m->billing_info();
				$data["account"]=$this->bundle_package_m->account();

				$data["logout_url"]="bundle_package_c/logout/home/index";
				// $this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("bundle_package/billing_info",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="bundle_package_c/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function add_billing_info($id)
		{
			$row=$this->bundle_package_m->add_billing_info($id);
			if($row==TRUE){redirect("bundle_package_c/index");}
		}
		public function bundle_package_edit($id="")
		{
			if($this->account_login)
			{
				$this->session->id=$id;
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->bundle_package_m->bp_code($id);
				if(!empty($row))
				{
					if($row=="KJBP-000001"){$row1=$row;}else{$row1=$row->bp_code;}
					$data["bp_code"]=$row1;
					//show post history
					$data['post_history']=$this->post_history();
					$data['bp_setup']=$this->bundle_package_m->bp_setup();
					$data["account"]=$this->bundle_package_m->account();
					$data["logout_url"]="bundle_package_c/logout/home/index";
					// $this->load->view("account_welcom/account_welcom",$data);
					$data["edit"]=$this->bundle_package_m->get_saved($id);
					$this->load->view("bundle_package/bundle_package_edit",$data);
					$this->load->view('template_frontend/footer');
				}
			}
			else
			{
				$this->session->url="bundle_package_c/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function delete($id)
		{
			$row=$this->bundle_package_m->delete($id);
			if($row==TRUE){redirect("bundle_package_c/index");}
		}
	}
