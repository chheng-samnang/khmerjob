<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Ads_c extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->account_login=$this->session->acc_log1;
			$this->load->model('front/ads_m');
			$this->load->model('front/advertising_m');
		}
		public function validation()
		{
			$this->form_validation->set_rules('ddlAdsLoc','Advertisement Location','required');
			$this->form_validation->set_rules('txtPostingDate','Posting date','trim|required');
			$this->form_validation->set_rules('txtAdsURL','Advertisement URL','trim');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function validation1()
		{
			//$this->form_validation->set_rules('ddlAdsLoc','Advertisement Location','required');
			$this->form_validation->set_rules('txtPostingDate','Posting date','trim|required');
			$this->form_validation->set_rules('txtAdsURL','Advertisement URL','trim');
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
			return $this->ads_m->post_history();
		}
		public function post_ads()
		{
			if($this->account_login)
			{
			    $data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->ads_m->ads_code();
				if($row=="KJAD-000001"){$row1=$row;}
				else
				{
					$ads_code=substr($row->ads_code,5);
					$row1='KJAD-'.str_pad($ads_code+1, 6, "0", STR_PAD_LEFT);
				}
				$data["ads_code"]=$row1;
				$num=$this->ads_m->count_ads_by_acc();
				if($num=="01"){$num1=$num;}
				else
				{
					$num1=str_pad(($num->numbers)+1, 2, "0", STR_PAD_LEFT);
				}
				$data["number"]=$num1;
				//check_ads type top
				$data['Top']=$this->ads_m->check_type_top();
				//show post history
				$data['post_history']=$this->post_history();
				$data['ads_setup']=$this->ads_m->ads_setup();
				$data["account"]=$this->ads_m->account();
				$data["logout_url"]="ads_c/logout/home/index";
				//$this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("ads/post_ads",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="ads_c/post_ads";
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
					$row=$this->ads_m->add('Saved','Edit');
					if($row==TRUE){redirect("ads_c/post_ads");}
				}
				else{$this->post_ads();}
			}
			elseif(isset($_POST['btnUpdate']))
			{
				if($this->ads_m->check_published()==TRUE)
				{
					if($this->validation1()==TRUE)
					{
						$row=$this->ads_m->edit_published();
						if($row==TRUE){redirect("ads_c/post_ads");}
					}
					else{$this->post_ads_edit($this->session->id);}
				}
				else
				{
						if($this->validation()==TRUE)
					{
						$row=$this->ads_m->edit('Saved','Edit');
						if($row==TRUE){redirect("ads_c/post_ads");}
					}
					else{$this->post_ads_edit($this->session->id);}
				}
			}
			elseif(isset($_POST['btnDelete']))
			{
				$row=$this->ads_m->delete($this->input->post('txt_post_ads_id'));
				if($row==TRUE){redirect("ads_c/post_ads");}
			}
			elseif(isset($_POST['btnSubmit']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->ads_m->add('Submited','Pending');
					if($row==TRUE)
					{
						$this->ads_m->free_cps();
						$this->ads_m->free_bp();
						redirect("ads_c/billing_info");
					}
				}
				else{$this->post_ads();}
			}
			elseif(isset($_POST['btnSubmit_edit']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->ads_m->edit('Submited','Pending');
					if($row==TRUE)
					{
						$this->ads_m->free_cps();
						$this->ads_m->free_bp();
						redirect("ads_c/billing_info");
					}
				}
				else{$this->post_ads_edit($this->session->id);}
			}
			elseif(isset($_POST['btnPreview']))
			{
				if($this->validation()==TRUE)
				{		$data["acc_info"]=$this->ads_m->account();
						$data["loc_name"]= $this->ads_m->pr_ads_location($this->input->post("ddlAdsLoc"));
						$img=$this->input->post("txtImgName");
						$data["post_date"]=$this->input->post("txtPostingDate");

						if($img!=NULL || $img!=''){$data["image"]=$this->input->post("txtImgName");}else{if(isset($this->session->id)){$data["image"]=$this->ads_m->get_saved($this->session->id)->ads_img;}}

						$data["url"]= $this->input->post("txtAdsURL");
						$this->load->view("ads/preview",$data);
				}
				else{
					$url=$this->uri->segment(3).'/'.$this->uri->segment(4);
					if($url=="ads_c/post_ads_edit"){
						$this->post_ads_edit($this->session->id);
					}else{$this->post_ads();}
				} //get value to preview
			}
		}
		public function billing_info()
		{
			if($this->account_login)
			{
			    $data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data["VAT"]=$this->ads_m->VAT();
				$data["billing_info"]=$this->ads_m->billing_info();
				$data["top"]=$this->ads_m->count_top();
				$data["side"]=$this->ads_m->count_side();
				$data["account"]=$this->ads_m->account();
				$data["logout_url"]="ads_c/logout/home/index";
				// $this->load->view("account_welcom/account_welcom",$data);														 
				$this->load->view("ads/billing_info",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="ads_c/post_ads";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function add_billing_info($id)
		{
			$row=$this->ads_m->add_billing_info($id);
			redirect("ads_c/post_ads");
		}
		public function post_ads_edit($id="")
		{
			if($this->account_login)
			{
			    $data["acc_head"]=$this->acc->acc_head();
				$this->session->id=$id;
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->ads_m->ads_code($id);
				if($row=="KJAD-000001"){$row1=$row;}else{$row1=$row->ads_code;}
				$data["ads_code"]=$row1;
				$num=$this->ads_m->count_ads_by_acc();
				if($num=="01"){$num1=$num;}
				else
				{
					$num1=str_pad(($num->numbers), 2, "0", STR_PAD_LEFT);
				}
				$data["number"]=$num1;
				//show post history
				$data['post_history']=$this->post_history();
				//check_ads type top
				$data['Top']=$this->ads_m->check_type_top();
				$data['ads_setup']=$this->ads_m->ads_setup();
				$data["edit"]=$this->ads_m->get_saved($id);
				$data["account"]=$this->ads_m->account();
				$data["logout_url"]="ads_c/logout/home/index";
				$this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("ads/post_ads_edit",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="ads_c/post_ads";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function invoice_preview($VAT="")
		{
			$data["VAT"]=$VAT;
			$data["top"]=$this->ads_m->count_top();
			$data["side"]=$this->ads_m->count_side();
			$data["billing_info"]=$this->ads_m->billing_info();
			$data["acc_info"]=$this->ads_m->account();
			$this->load->view("ads/invoice_preview",$data);

		}
		public function delete($id)
		{
			$row=$this->ads_m->delete($id);
			if($row==TRUE){redirect("ads_c/post_ads");}
		}
	}
