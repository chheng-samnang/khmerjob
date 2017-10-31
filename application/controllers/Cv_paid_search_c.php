<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Cv_paid_search_c extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->account_login=$this->session->acc_log1;
			$this->load->model('front/cv_paid_search_m');
			$this->load->model('front/advertising_m');
		}
		public function logout()
		{
			$logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
			$this->session->unset_userdata('acc_log1');
			$this->session->unset_userdata('start_count');
			redirect($logout_url);
		}
		public function validation()
		{
			$this->form_validation->set_rules('ddlCvpsDuration','CV Paid Search Duration','required|is_natural',array('is_natural' => 'You must choose a CV Paid Search Duration in order to Submit.'));
			//$this->form_validation->set_rules('txtPurchaseDate','Purchase Date','trim|required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function validation1()
		{
			$this->form_validation->set_rules('ddlCvpsDuration','CV Paid Search Duration','required|is_natural',array('is_natural' => 'You must choose a CV Paid Search Duration in order to Submit.'));
			// $this->form_validation->set_rules('txtPurchaseDate','Purchase Date','trim|required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{
				return FALSE;
			}
		}
		public function post_history()
		{
			return $this->cv_paid_search_m->post_history();
		}
		public function index()
		{
			if($this->account_login)
			{
				if($row=$this->cv_paid_search_m->get_saved()==TRUE)
				{

				    $row = $this->cv_paid_search_m->get_saved();
				    redirect("cv_paid_search_c/cv_paid_search_edit/".$row->cps_code);
				}
				else
				{

				  $data["acc_head"]=$this->acc->acc_head();
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav",$data);
					$row=$this->cv_paid_search_m->cps_code();
					if($row=="KJCPS-000001"){$row1=$row;}
					else
					{
						$cps_code=substr($row->cps_code,6);
						$row1='KJCPS-'.str_pad($cps_code+1, 6, "0", STR_PAD_LEFT);
					}
					$data["cps_code"]=$row1;
					//show post history
					$data['post_history']=$this->post_history();
					$data['cps_setup']=$this->cv_paid_search_m->cps_setup();
					$data["cus_info"]=$this->acc->index($this->session->acc_log1);
					$data["logout_url"]="cv_paid_search_c/logout/home/index";
					//$this->load->view("account_welcom/account_welcom",$data);
					$this->load->view("cv_paid_search/cv_paid_search",$data);
					$this->load->view('template_frontend/footer');
				}
			}
			else
			{
				$this->session->url="cv_paid_search_c/index";
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
					$row=$this->cv_paid_search_m->add('Saved','Edit');
					if($row==TRUE){redirect("cv_paid_search_c/add/cv_paid_search_c/cv_paid_search_edit/".$this->input->post('txtCvpsID'));}
				}
				else{$this->index();}
			}
			elseif(isset($_POST['btnUpdate']))
			{
				if($this->cv_paid_search_m->check_published()==TRUE)
				{
					if($this->validation1()==TRUE)
					{
						$row=$this->cv_paid_search_m->edit_published();
						if($row==TRUE){redirect("cv_paid_search_c/billing_info");}
					}
					else{$this->cv_paid_search_edit($this->session->id);}
				}
				else
				{
					if($this->validation()==TRUE)
					{
						$row=$this->cv_paid_search_m->edit('Saved','Edit');
						if($row==TRUE){redirect("cv_paid_search_c/cv_paid_search_edit/".$this->input->post('txtCvpsID'));}
					}
					else{$this->bundle_package_edit($this->session->id);}
				}
			}
			elseif(isset($_POST['btnDelete']))
			{
				$row=$this->cv_paid_search_m->delete($this->input->post('txtCvpsID'));
				if($row==TRUE){redirect("cv_paid_search_c/index");}
			}
			elseif(isset($_POST['btnSubmit']))
			{
				if($this->validation()==TRUE)
				{

					$row=$this->cv_paid_search_m->add('Submited','Pending');
					if($row==TRUE){redirect("cv_paid_search_c/billing_info");}
				}
				else{$this->index();}
			}
			elseif(isset($_POST['btnSubmit_edit']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->cv_paid_search_m->edit('Submited','Pending');
					if($row==TRUE){redirect("cv_paid_search_c/billing_info");}
				}
				else{
					$this->cv_paid_search_edit($this->session->id);
				}
			}
			elseif(isset($_POST['btnPreview']))
			{
				if($this->validation()==TRUE)
		        {
							$price = $this->cv_paid_search_m->get_price($this->input->post('ddlCvpsDuration'));
							$data["price"] = floatval($price->key_data);
							$data["cps_code"] = $this->input->post("txtCvpsID");
		        	//$data["acc_info"]=$this->cv_paid_search_m->account();
							$data["cus_name"] = $this->input->post("txtCusName");
							$data["cus_phone"] = $this->input->post("txtPhone");
							$data["cus_email"] = $this->input->post("txtEmail");
							$data["cus_addr"] = $this->input->post("txtAddr");
		        	$data["cv_pu_Duration"]=$this->input->post('ddlCvpsDuration');

		        	//$data["puDate"]= $this->input->post("txtPurchaseDate");
		        	$this->load->view("cv_paid_search/preview",$data);
				} //get value to preview
				else{
					$url=$this->uri->segment(3).'/'.$this->uri->segment(4);
					if($url=="cv_paid_search_c/cv_paid_search_edit"){
						$this->cv_paid_search_edit($this->session->id);
					}else{
						$this->index();
					}
				} //get value to preview
			}

		}
		public function invoice_preview($VAT="")
		{	
				$data["VAT"]=$VAT;
				$data["check_value"]=$VAT;
				$data["cp_info"]=$this->cv_paid_search_m->billing_info();
				$data["acc_info"]=$this->cv_paid_search_m->account();
				$this->load->view("cv_paid_search/invoice_preview",$data);
		}
		public function billing_info()
		{
			if($this->account_login)
			{			
					if(isset($_POST["btnBack"])){ $data["check_value"]=$this->input->post("check_value"); }
			    	$data["acc_head"]=$this->acc->acc_head();
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav",$data);
					$data["VAT"]=$this->cv_paid_search_m->VAT();
					$data["billing_info"]=$this->cv_paid_search_m->billing_info();
					$data["account"]=$this->cv_paid_search_m->account();
					$data["logout_url"]="cv_paid_search_c/logout/home/index";
					//$this->load->view("account_welcom/account_welcom",$data);	
					$this->load->view("cv_paid_search/billing_info",$data);
					$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="cv_paid_search_c/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function add_billing_info($id)
		{
			$row=$this->cv_paid_search_m->add_billing_info($id);
			// if($row==TRUE){redirect("cv_paid_search_c/index");}
			if($row==TRUE){redirect(base_url()."process_payment_c/way_to_payment");}
		}
		public function cv_paid_search_edit($id="")
		{
			if($this->account_login)
			{

				$data["id"] = $id;
				if(isset($_POST["btnUpdate"]))
				{
					$this->acc->updateCVPaidSearch($id);
				}elseif(isset($_POST["btnDelete"]))
				{
					$this->acc->deleteCVPaidSearch($id);
					redirect(base_url()."cv_paid_search_c/index");
				}
				$data["cus_info"] = $this->acc->index($this->session->acc_log1);
			  $data["acc_head"]=$this->acc->acc_head();
				$this->session->id=$id;
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->cv_paid_search_m->cps_code($id);
				if($row=="KJCPS-000001"){$row1=$row;}else{$row1=$row->cps_code;}
				$data["cps_code"]=$row1;
				//show post history
				$data['post_history']=$this->post_history();
				$data['cps_setup']=$this->cv_paid_search_m->cps_setup();
				$data["edit"]=$this->cv_paid_search_m->get_saved($id);
				$data["logout_url"]="cv_paid_search_c/logout/home/index";
				$data["account"]=$this->cv_paid_search_m->account();
				//$this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("cv_paid_search/cv_paid_search_edit",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="cv_paid_search_c/index";
				$this->session->cancel="home/index";
				redirect("home/form_log");
			}
		}
		public function delete($id)
		{
			$row=$this->cv_paid_search_m->delete($id);
			if($row==TRUE){redirect("cv_paid_search_c/index");}
		}
	}
