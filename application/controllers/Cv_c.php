<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Cv_c extends CI_Controller
	{
		var $account_login;
		public function __construct()
		{
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->account_login=$this->session->acc_log1;
			$this->load->model('front/cv_m');
			$this->load->model('front/advertising_m');
			
		}
		public function logout()
		{
			$logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
			$this->session->unset_userdata('acc_log1');
			$this->session->unset_userdata('start_count');
			redirect($logout_url);
		}
		public function generateDate($date){
			$tmp  = date_create($date);
			return $result = date_format($tmp,"d/m/Y");
		}
		public function cv_detail($id)
		{
			$data["acc_head"]=$this->acc->acc_head();
			if($this->account_login)
			{
				$row=$this->cv_m->check_hour();
				if($row==TRUE)
				{
					$this->session->start_count=TRUE;
					// when click cv view countdown start
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav2",$data);
					$data["cv_det"]=$this->cv_m->cv_detail($id);
					$data["dob"]  = $this->generateDate($data["cv_det"]->dob);
					$cv_det=$this->cv_m->cv_detail($id);
					$this->session->set_userdata("position",$cv_det->position);
					$data["right_ads"]=$this->advertising_m->right_ads();
					$this->load->view("cv/cv_detail",$data);
					$this->load->view('template_frontend/advertising',$data);
					$this->load->view('template_frontend/footer');
				}
				else
				{
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav",$data);
					$this->load->view("cv/hour_msg");
					$this->load->view('template_frontend/footer');
				//$data["hour_msg"]=" Sorry! Your Hour Expired.Please Purchase New!";
					#redirect("cv_paid_search_c/index");
				}
			}
			else
			{
				$this->session->url="home/cv_thumbnail";
				$this->session->cancel="home/cv_thumbnail";
				redirect("home/form_log");
			}
		}
		public function update_countdown()
		{
			if($this->session->acc_log1 && $this->session->start_count)
			{
				$this->cv_m->update_countdown();
				$this->session->unset_userdata('start_count');
			}
		}
		public function validation()
		{
			$this->form_validation->set_rules('ddlPriority','Priority','required');

			$this->form_validation->set_rules('txtPosition','Position Matched','trim|required');
			$this->form_validation->set_rules('ddlExpSalary','Expected Salary','trim|required');
			$this->form_validation->set_rules('ddlCategory','Category','trim|required');
			$this->form_validation->set_rules('ddlYearExp','Years of Experience','trim|required');
			$this->form_validation->set_rules('txtName','Name','trim|required');
			$this->form_validation->set_rules('txtAddr',' Current Address','trim|required');
			$this->form_validation->set_rules('txtEmail','Email','trim|valid_email|required');
			$this->form_validation->set_rules('txtPhone','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
			$this->form_validation->set_rules('txtFacebook','Facebook','trim');
			$this->form_validation->set_rules('txtTwitter','Twitter','trim');
			$this->form_validation->set_rules('txtG+1','G+1','trim');
			$this->form_validation->set_rules('txtDOB','Date of Birth','trim|required');
			$this->form_validation->set_rules('txtPOB','Place of Birth','trim|required');
			$this->form_validation->set_rules('ddlGender','Gender','required');
			$this->form_validation->set_rules('ddlMaritalSta','Marital Status','required');
			$this->form_validation->set_rules('txtNationality','Nationality','trim|required');
			$this->form_validation->set_rules('txtExperience','Work Experience','trim');
			$this->form_validation->set_rules('txtEducation','Education','trim');
			$this->form_validation->set_rules('txtLanguage','Language','trim');
			$this->form_validation->set_rules('txtComputer','Computer','trim');
			$this->form_validation->set_rules('txtOtherSkill','ther Skil','trim');
			$this->form_validation->set_rules('txtShortCouseTr','Short Couse Transation','trim');
			$this->form_validation->set_rules('txtReference','Reference','trim');
			$this->form_validation->set_rules('txtHobby','Hobby','trim');
			$this->form_validation->set_rules('txtAboutMe','About Me','trim');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function validation1()
		{
			$this->form_validation->set_rules('ddlPriority','Priority','required');
			$this->form_validation->set_rules('txtPosition','Position Matched','trim|required');
			$this->form_validation->set_rules('ddlExpSalary','Expected Salary','trim|required');
			$this->form_validation->set_rules('ddlCategory','Category','trim|required');
			$this->form_validation->set_rules('ddlYearExp','Years of Experience','trim|required');
			$this->form_validation->set_rules('txtName','Name','trim|required');
			$this->form_validation->set_rules('txtAddr',' Current Address','trim|required');
			$this->form_validation->set_rules('txtEmail','Email','trim|valid_email|required');
			$this->form_validation->set_rules('txtPhone','Phone','trim|required|regex_match[/^[0-9\-\+]{9,15}+$/]');
			$this->form_validation->set_rules('txtFacebook','Facebook','trim');
			$this->form_validation->set_rules('txtTwitter','Twitter','trim');
			$this->form_validation->set_rules('txtG+1','G+1','trim');
			$this->form_validation->set_rules('txtDOB','Date of Birth','trim|required');
			$this->form_validation->set_rules('txtPOB','Place of Birth','trim|required');
			$this->form_validation->set_rules('ddlGender','Gender','required');
			$this->form_validation->set_rules('ddlMaritalSta','Marital Status','required');
			$this->form_validation->set_rules('txtNationality','Nationality','trim|required');
			$this->form_validation->set_rules('txtExperience','Work Experience','trim');
			$this->form_validation->set_rules('txtEducation','Education','trim');
			$this->form_validation->set_rules('txtLanguage','Language','trim');
			$this->form_validation->set_rules('txtComputer','Computer','trim');
			$this->form_validation->set_rules('txtOtherSkill','ther Skil','trim');
			$this->form_validation->set_rules('txtShortCouseTr','Short Couse Transation','trim');
			$this->form_validation->set_rules('txtReference','Reference','trim');
			$this->form_validation->set_rules('txtHobby','Hobby','trim');
			$this->form_validation->set_rules('txtAboutMe','About Me','trim');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function post_cv($back_url="")
		{
			if($this->account_login)
			{
				if($row=$this->cv_m->get_saved()==TRUE)
				{
					$row=$this->cv_m->get_saved();
					redirect("cv_c/post_cv_edit/".$row->cv_code);
				}
				else
				{
				  $data["acc_head"]=$this->acc->acc_head();
					$data["ads_top"]=$this->advertising_m->ads_top();
					$this->load->view("template_frontend/herder_and_nav",$data);
					$row=$this->cv_m->cv_code();
					if($row=="KJCV-000001"){$row1=$row;}
					else
					{
						$cv_code=substr($row->cv_code,5);
						$row1='KJCV-'.str_pad($cv_code+1, 6, "0", STR_PAD_LEFT);
					}
					$data["cv_code"]=$row1;
					$data['cv_setup']=$this->cv_m->cv_setup();
					$data["category"]=$this->cv_m->category();
					$data["account"]=$this->cv_m->account();
					$data["logout_url"]="cv_c/logout/home/cv_thumbnail";
					//$this->load->view("account_welcom/account_welcom",$data);
					$this->load->view("cv/post_cv",$data);
					$this->load->view('template_frontend/footer');
				}
			}
			else
			{

				$this->session->url="cv_c/post_cv";
				$this->session->cancel="home/cv_thumbnail";
				redirect("home/form_log");
			}
		}
		public function add()
		{
			if(isset($_POST['btnSave']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->cv_m->add('Saved');
					if($row==TRUE){redirect("cv_c/post_cv_edit/".$this->input->post("txtCvID"));}
				}
				else{$this->post_cv();}
			}
			elseif(isset($_POST['btnUpdate']))
			{
				if($this->cv_m->check_published()==TRUE)//how every it published can be upate acecpt priority
				{
					if($this->validation1()==TRUE)
					{
						$row=$this->cv_m->edit_published();
						//$process_payment = $this->cv_m->check_payment_status($this->input->post("ddlPriority"));
						$this->session->set_flashdata('msg', 'Congratulation');

						if($row==TRUE){
							redirect("cv_c/post_cv_edit/".$this->input->post("txtCvID"));
						}
						// if($row==TRUE&&$process_payment==TRUE){
						// 		redirect("cv_c/billing_info");
						// }elseif($row==TRUE&&$process_payment==FALSE)
						// {
						// 		redirect(base_url()."cv_c/post_cv_edit");
						// }
					}
					else{$this->post_job_edit($this->session->id);}
				}
				else
				{
					if($this->validation()==TRUE)
					{
						$row=$this->cv_m->edit('Saved');
						if($row==TRUE){redirect("cv_c/post_cv_edit/".$this->input->post("txtCvID"));}
					}
					else{$this->post_job_edit($this->session->id);}
				}
			}
			elseif(isset($_POST['btnDelete']))
			{
				$row=$this->cv_m->delete($this->input->post('txtCvID'));
				if($row==TRUE){redirect("cv_c/post_cv");}
			}
			elseif(isset($_POST['btnSubmit']))
			{
				if($this->validation()==TRUE)
				{
					$this->session->set_flashdata('msg', 'Congratulation');
					if($this->cv_m->check_standard()==TRUE)
					{
						$row=$this->cv_m->add('Published');
						if($row==TRUE){redirect("cv_c/post_cv_edit/".$this->input->post("txtCvID"));}
					}
					else
					{
						$row=$this->cv_m->add('Submited');
						if($row==TRUE){redirect("cv_c/billing_info");}
					}
				}
				else{$this->post_cv();}
			}
			elseif(isset($_POST['btnSubmit_edit']))
			{
				if($this->validation()==TRUE)
				{
					$this->session->set_flashdata('msg', 'Congratulation');
					if($this->cv_m->check_standard()==TRUE)
					{
						$row=$this->cv_m->edit('Published');
						if($row==TRUE){redirect("cv_c/post_cv_edit/".$this->input->post("txtCvID"));}
					}
					else
					{
						$row=$this->cv_m->edit('Submited');
						if($row==TRUE){redirect("cv_c/billing_info");}
					}
				}
				else{$this->post_cv_edit($this->session->id);}
			}
			elseif(isset($_POST['btnPreview']))
			{
				if($this->validation()==TRUE)
				        {		$data["modify"]=$this->input->post("txtModify");	
								$data["cv_id"]	=	$this->input->post("txtCvID");
				        		$data['acc_info'] =$this->cv_m->account();//slect tbl_account
				        		$data['cat_name'] =$this->cv_m->pCV_category($this->input->post("ddlCategory"));//slect category
								$data["ddlPriority"]=$this->cv_m->preview_priority($this->input->post("ddlPriority"));
								$data["txtPosition"]=$this->input->post("txtPosition");
								$data["ddlExpSalary"]=$this->input->post("ddlExpSalary");
								$data["ddlYearExp"]=$this->input->post("ddlYearExp");
								$data["txtName"] =$this->input->post("txtName");
								$data["txtImgName"] =$this->input->post("txtImgName");
								$data["txtPhone"] =$this->input->post("txtPhone");
								$data["txtTel2"] = $this->input->post("txtPhone2");
								$data["txtAddr"] =$this->input->post("txtAddr");
								$data["txtEmail"] =$this->input->post("txtEmail");
								$data["txtFacebook"] =$this->input->post("txtFacebook");
								$data["txtTwitter"] =$this->input->post("txtTwitter");
								$data["txtG"] =$this->input->post("txtG+1");
								$data["txtLinkedIn"] = $this->input->post("txtLinkedIn");
								$data["txtDOB"] =$this->input->post("txtDOB");
								$data["txtPOB"] =$this->input->post("txtPOB");
								$data["ddlGender"] =$this->input->post("ddlGender");
								$data["ddlMaritalSta"] = $this->input->post("ddlMaritalSta");
								$data["txtNationality"] = $this->input->post("txtNationality");
								$data["txtExperience"] = $this->input->post("txtExperience");
								$data["txtEducation"] =$this->input->post("txtEducation");
								$data["txtLanguage"] = $this->input->post("txtLanguage");
								$data["txtComputer"] = $this->input->post("txtComputer");
								$data["txtOtherSkill"] = $this->input->post("txtOtherSkill");
								$data["txtShortCouseTr"] = $this->input->post("txtShortCouseTr");
								$data["txtReference"] = $this->input->post("txtReference");
								$data["txtHobby"] =$this->input->post("txtHobby");
								$data["txtAboutMe"] =$this->input->post("txtAboutMe");
								$data["cv_code"] = $this->input->post("txtCvID");
								$data["back_url"] = $this->input->post("txtUrl");
								$this->load->view("cv/preview",$data);
				} //get value to preview
				else{
					$url=$this->uri->segment(3).'/'.$this->uri->segment(4);
					if($url=="cv_c/post_cv_edit"){
						$this->post_cv_edit($this->session->id);
					}else{
						$this->post_cv();
					}
				}//get value to preview
			}
		}
		public function delete($cv_code="")
		{
			$row=$this->cv_m->delete($cv_code);
				if($row==TRUE){redirect("cv_c/post_cv");}
		}

		public function get_date_to($duration)
		{
			$date = date("Y-m-d");
			$date = date_create($date);
			return date_add($date,date_interval_create_from_date_string($duration.	" days"));
		}
		public function billing_info()
		{
			if($this->account_login)
			{
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data["VAT"]=$this->cv_m->VAT();
				$data["billing_info"]=$this->cv_m->billing_info();
				$duration = $data["billing_info"][0]->duration;
				//process_url
				$data["account"]=$this->cv_m->account();
				$data["logout_url"]="cv_c/logout/home/cv_thumbnail";
				$data["date_f"] = date("d-M-Y");
				$date = $this->get_date_to($duration);
				$data["date_t"] = date_format($date,"d-M-Y");
				//$data["date_t"] = date_create($date);
				// $data["date_t"] =
				//$this->load->view("account_welcom/account_welcom",$data);
				if(isset($_POST["btnBack"])){$data["check_value"]=$this->input->post("txtVAT"); }
				$this->load->view("cv/billing_info",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="cv_c/post_cv";
				$this->session->cancel="home/cv_thumbnail";
				redirect("home/form_log");
			}
		}
		public function add_billing_info($id)
		{
			$row=$this->cv_m->add_billing_info($id);
			if($row==TRUE){
				//redirect("cv_c/post_cv");
				redirect(base_url()."process_payment_c/way_to_payment");
			}
		}
		public function post_cv_edit($id="")
		{	
			if($this->account_login)
			{	
				if(isset($_POST["btnBack"])){ $data["modify"]= $this->input->post("modify"); }		
				$this->session->id=$id;
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->cv_m->cv_code($id);
				if($row=="KJCV-000001"){$row1=$row;}else{$row1=$row->cv_code;}
				$data["cv_code"]=$row1;
				$data['cv_setup']=$this->cv_m->cv_setup();
				$data["category"]=$this->cv_m->category();
				$data["edit"]=$this->cv_m->get_saved($id);
				$data["account"]=$this->cv_m->account();
				$data["logout_url"]="cv_c/logout/home/cv_thumbnail";
				// $this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("cv/post_cv_edit",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="cv_c/post_cv";
				$this->session->cancel="home/cv_thumbnail";
				redirect("home/form_log");
			}
		}
		public function invoice_preview($VAT="")
		{		
			echo $this->input->post("txtImgName");
			$data['acc_info'] =$VAT;//slect tbl_account
			$data["VAT"]=$this->uri->segment(3);
			$data["chech_value"]=$VAT;
			$data["billing_info"]=$this->cv_m->billing_info();
			$data["premium"]=$this->cv_m->count_premium();
			$data["standard"]=$this->cv_m->count_standard();
			$data["date_f"] = date("d-M-Y");
			$duration = $data["billing_info"][0]->duration;
			$date = $this->get_date_to($duration);
			$data["date_t"] =  date_format($date,"d-M-Y");
			$this->load->view("cv/invoice_preview",$data);
		}

	}
