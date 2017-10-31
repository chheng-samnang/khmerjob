<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Job_c extends CI_Controller
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
		public function logout()
		{
			$logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
			$this->session->unset_userdata('acc_log1');
			$this->session->unset_userdata('start_count');
			redirect($logout_url);
		}
		public function job_detail($id="")
		{

			$this->job_m->update_notify($id);
			$data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data["job_det"]=$this->job_m->job_detail($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$this->load->view("job/job_detail",$data);
			$this->load->view('template_frontend/advertising',$data);
			$this->load->view('template_frontend/footer');
		}
		public function validation()
		{
			$this->form_validation->set_rules('ddlPriority','Priority','required');
			$this->form_validation->set_rules('txtJobTitle','Job Title','trim|required');
			$this->form_validation->set_rules('txtJobDes','Job Description','trim');
			$this->form_validation->set_rules('txtJobRequirement','Job Requirement','trim');
			$this->form_validation->set_rules('txtContactName','Contact name','trim|required');
			$this->form_validation->set_rules('txtPhone','Phone','required');
			$this->form_validation->set_rules('txtEmail','Email','trim|required');
			$this->form_validation->set_rules('txtAddr','Address','trim|required');
			$this->form_validation->set_rules('ddlLang1','Language','trim|required');
			$this->form_validation->set_rules('txtPostingDate','Posting Date','trim|required');
			$this->form_validation->set_rules('txtEndDate','End Date','trim|required');
			$this->form_validation->set_rules('ddlContract','Contract','required');
			$this->form_validation->set_rules('ddlGender','Gender','required');
			$this->form_validation->set_rules('ddlAge','Age','required');
			$this->form_validation->set_rules('ddlSalaryRange','Salary Range','required');
			$this->form_validation->set_rules('ddlYearExp','Year of Experient','required');
			$this->form_validation->set_rules('ddlEducation','Education','required');
			$this->form_validation->set_rules('txtHiringQty','Hiring Quantity','required|integer');
			$this->form_validation->set_rules('txtHiringQty','Hiring Quantity','required|callback_validate_qty');
			$this->form_validation->set_rules('ddlLocation','Location','required');
			$this->form_validation->set_rules('ddlCategory','Category','required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function validate_qty($qty)
		{
			if($qty!=""&&$qty!="0")
			{
				return true;
			}else {
				$this->form_validation->set_message('validate_qty', 'The {field} field can not be "0"');
				return false;
			}
		}
		public function validation1()
		{
			//$this->form_validation->set_rules('ddlPriority','Priority','required');
			$this->form_validation->set_rules('txtJobTitle','Job Title','trim|required');
			$this->form_validation->set_rules('txtJobDes','Job Description','trim');
			$this->form_validation->set_rules('txtJobRequirement','Job Requirement','trim');
			$this->form_validation->set_rules('txtContactName','Contact name','trim|required');
			$this->form_validation->set_rules('txtPhone','Phone','required');
			$this->form_validation->set_rules('txtEmail','Email','trim|required');
			$this->form_validation->set_rules('txtAddr','Address','trim|required');
			$this->form_validation->set_rules('ddlLang1','Language','trim|required');
			$this->form_validation->set_rules('txtPostingDate','Posting Date','trim|required');
			$this->form_validation->set_rules('txtEndDate','End Date','trim|required');
			$this->form_validation->set_rules('ddlContract','Contract','required');
			$this->form_validation->set_rules('ddlGender','Gender','required');
			$this->form_validation->set_rules('ddlAge','Age','required');
			$this->form_validation->set_rules('ddlSalaryRange','Salary Range','required');
			$this->form_validation->set_rules('ddlYearExp','Year of Experient','required');
			$this->form_validation->set_rules('ddlEducation','Education','required');
			$this->form_validation->set_rules('txtHiringQty','Hiring Quantity','required|integer');
			$this->form_validation->set_rules('txtHiringQty','Hiring Quantity','required|callback_validate_qty');
			$this->form_validation->set_rules('ddlLocation','Location','required');
			$this->form_validation->set_rules('ddlCategory','Category','required');
			if($this->form_validation->run()==TRUE){return TRUE;}
			else{return FALSE;}
		}
		public function post_history()
		{
			return $this->job_m->post_history();
		}
		public function preview($id)
		{
			$data['job_setup']=$this->job_m->job_setup();
			$data["category"]=$this->job_m->category();
			$data["location"]=$this->job_m->location();
			$data["account"]=$this->job_m->account();
			$data['acc_info'] =$this->job_m->account();

			$job=$this->job_m->get_saved($id);
			$data['loc_name'] =$this->job_m->job_location($job->loc_id);//slect location
			$data['cat_name'] =$this->job_m->job_category($job->cat_id);//slect category
			$data["job_id"] = $job->job_code;
			$data['ddlPriority'] = $job->priority;
			$data['txtJobDes'] = $job->job_desc;
			$data['txtJobTitle'] = $job->job_title;
			$data['txtJobRequirement'] = $job->job_requirement;
			$data['txtOtherBenefit'] = $job->other_benefit;
			$data['txtContactName'] = $job->contact_name;
			$data['txtPhone'] = $job->phone;
			$data['txtPhone2'] = $job->phone2;
			$data['txtEmail'] = $job->email;
			$data['txtAddr'] = $job->addr;
			$data['txtPostingDate'] = $job->posting_date;
			$data['txtEndDate'] = $job->end_date;
			$data['ddlContract'] = $job->contract;
			$data['ddlEducation'] = $job->edu;
			$data['ddlGender'] = $job->gender;
			$data['ddlAge'] = $job->age;
			$data['ddlSalaryRange'] = $job->salary_range;
			$data['ddlYearExp'] = $job->year_exp;
			$data['ddlLang1'] = $job->lang1;
			$data['ddlLang2'] = $job->lang2;
			$data['ddlLang3'] = $job->lang3;
			$data['ddlLang4'] = $job->lang4;
			$data['txtHiringQty'] = $job->hiring_qty;
			$this->load->view("job/preview",$data);
		}
		public function post_job()
		{
			if($this->account_login)
			{

		    $data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->job_m->job_code();
				if($row=="KJJB-000001"){$row1=$row;}
				else
				{
					$job_code=substr($row->job_code,5);
					$row1='KJJB-'.str_pad($job_code+1, 6, "0", STR_PAD_LEFT);
				}
				$data["job_code"]=$row1;
				$num=$this->job_m->count_job_by_acc();
				if($num=="01"){$num1=$num;}
				else
				{
					$num1=str_pad(($num->numbers)+1, 2, "0", STR_PAD_LEFT);
				}
				$data["number"]=$num1;
				//show post history
				$data['post_history']=$this->post_history();
				$data['job_setup']=$this->job_m->job_setup();
				$data["category"]=$this->job_m->category();
				$data["location"]=$this->job_m->location();
				$data["account"]=$this->job_m->account();
				$data["logout_url"]="job_c/logout/home/job_thumbnail";

				$this->load->view("job/post_job",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="job_c/post_job";
				$this->session->cancel="home/job_thumbnail";
				redirect("home/form_log");
			}
		}
		public function add()
		{
			if(isset($_POST['btnSave']))
			{
				if($this->validation()==TRUE)
				{
					$row=$this->job_m->add('Saved','Edit');
					if($row==TRUE){redirect("job_c/post_job");}
				}
				else{$this->post_job();}
			}
			elseif(isset($_POST['btnUpdate']))//if($this->cv_m->check_published()==TRUE)//how every it published can be upate acecpt priority
			{
				if($this->job_m->check_published()==TRUE)
				{
					if($this->validation1()==TRUE)
					{
						$row=$this->job_m->edit_published();
						if($row==TRUE){redirect("job_c/post_job");}
					}
					else{$this->post_job_edit($this->session->id);}
				}
				else
				{
					if($this->validation()==TRUE)
					{
						$row=$this->job_m->edit('Saved','Edit');
						if($row==TRUE){redirect("job_c/post_job");}
					}
					else{$this->post_job_edit($this->session->id);}
				}
			}
			elseif(isset($_POST['btnDelete']))
			{
				$row=$this->job_m->delete($this->input->post('txt_post_job_id'));
				if($row==TRUE){redirect("job_c/post_job");}
			}
			elseif(isset($_POST['btnSubmit']))
			{
				if($this->validation()==TRUE)
				{
					$pr_id = $this->input->post("ddlPriority");
					$query = $this->job_m->check_priority_type($pr_id);
					$pr_type = $query->rate_det_type;
					if($pr_type=="Premium")
					{
						if($this->job_m->check_bundle_package()==TRUE)
						{
							$row=$this->job_m->check_premium_3();

							if($row->pre_3!="0")
							{
								if($row->pre_3>=3)
								{
									$row=$this->job_m->add('Submited','Pending');
									if($row==TRUE)
									{
										redirect("job_c/billing_info");
									}
								}
								else
								{
									$row=$this->job_m->add('Published','Done');
									if($row==true){redirect("job_c/post_job");}
								}
							}
							else
							{
								$pr_id = $this->input->post("ddlPriority");
								$query = $this->job_m->check_priority_type($pr_id);
								$pr_type = $query->rate_det_type;
								if($pr_type=="Standard"){
									$row=$this->job_m->add('Published','Done');
									if($row==true){redirect("job_c/post_job");}
								}else{
									$pre_3=$this->job_m->check_premium_3();
									if($pre_3>3)
									{
										$row=$this->job_m->add('Submited','Pending');
										if($row==TRUE){redirect("job_c/billing_info");}
									}else {
										$row=$this->job_m->add('Published','Done');
										if($row==true){redirect("job_c/post_job");}
									}
								}
							}
							// $row=$this->job_m->add('Pending','Payment');
							// if($row==TRUE){redirect("job_c/post_job");}
						}
						else
						{
							$row=$this->job_m->add('Submited','Pending');
							if($row==TRUE){redirect("job_c/billing_info");}
						}
					}else
					{
						if($this->job_m->check_bundle_package()==TRUE)
						{
							$check_submited_job = $this->job_m->billing_info();
							if($check_submited_job!=null)
							{
								$row=$this->job_m->add('Published','Done');
								if($row==TRUE){redirect("job_c/billing_info");}
							}else{
								$row=$this->job_m->add('Published','Done');
								if($row==true){redirect("job_c/post_job");}
							}

						}else{
							$row=$this->job_m->add('Submited','Pending');
							if($row==TRUE){redirect("job_c/billing_info");}
						}
					}
				}
				else{$this->post_job();}
			}
			elseif(isset($_POST['btnSubmit_edit']))
			{
				if($this->validation()==TRUE)
				{
					if($this->job_m->check_bundle_package()==TRUE)
					{
						$row=$this->job_m->add('Pending','Payment');
						if($row==TRUE){redirect("job_c/post_job");}
					}
					else
					{
						$row=$this->job_m->add('Submited','Pending');
						if($row==TRUE){redirect("job_c/billing_info");}
					}
				}
				else{$this->post_job_edit($this->session->id);}
			}
			elseif(isset($_POST['btnPreview']))
			{
				if($this->validation()==TRUE)
		        {
							$data["job_id"] = $this->input->post("txtJobID");
		        	$data['acc_info'] =$this->job_m->account();//slect tbl_account
		        	$data['loc_name'] =$this->job_m->job_location($this->input->post("ddlLocation"));//slect location
		        	$data['cat_name'] =$this->job_m->job_category($this->input->post("ddlCategory"));//slect category
							$data['ddlPriority'] = $this->input->post("ddlPriority");
							$data['txtJobDes'] = $this->input->post("txtJobDes");
							$data['txtJobTitle'] =$this->input->post("txtJobTitle");
							$data['txtJobRequirement'] = $this->input->post("txtJobRequirement");
							$data['txtOtherBenefit'] = $this->input->post("txtOtherBenefit");
							$data['txtContactName'] =$this->input->post("txtContactName");
							$data['txtPhone'] =$this->input->post("txtPhone");
							$data['txtPhone2'] = $this->input->post("txtPhone2");
							$data['txtEmail'] =$this->input->post("txtEmail");
							$data['txtAddr'] =$this->input->post("txtAddr");
							$data['txtPostingDate'] =$this->input->post("txtPostingDate");
							$data['txtEndDate'] = $this->input->post("txtEndDate");
							$data['ddlContract'] = $this->input->post("ddlContract");
							$data['ddlEducation'] = $this->input->post("ddlEducation");
							$data['ddlGender'] =$this->input->post("ddlGender");
							$data['ddlAge'] = $this->input->post("ddlAge");
							$data['ddlSalaryRange'] = $this->input->post("ddlSalaryRange");
							$data['ddlYearExp'] = $this->input->post("ddlYearExp");
							$data['ddlEducation'] =$this->input->post("ddlEducation");
							$data['ddlLang1'] = $this->input->post("ddlLang1");
							$data['ddlLang2'] = $this->input->post("ddlLang2")!=""?",".$this->input->post("ddlLang2"):"";
							$data['ddlLang3'] = $this->input->post("ddlLang3")!=""?",".$this->input->post("ddlLang3"):"";
							$data['ddlLang4'] = $this->input->post("ddlLang4")!=""?",".$this->input->post("ddlLang4"):"";
							$data['txtHiringQty'] = $this->input->post("txtHiringQty");
							$data['url']=$this->uri->segment(1).'/'.$this->uri->segment(2);
							$this->load->view("job/preview",$data);
				} //get value to preview
				else{
					$url=$this->uri->segment(3).'/'.$this->uri->segment(4);
					if($url=="job_c/post_job_edit"){
						$this->post_job_edit($this->session->id);
					}else{$this->post_job();}
				} //get value to preview
			}//--=======preview post job=====----
		}
		public function invoice_preview($VAT="")
		{
			$data['acc_info'] =$this->job_m->account();//slect tbl_account
			$data["VAT"]=$VAT;
			$data["billing_info"]=$this->job_m->billing_info();
			$data["premium"]=$this->job_m->count_premium();
			$data["standard"]=$this->job_m->count_standard();
			$this->load->view("job/invoice_preview",$data);
		}
		public function billing_info()
		{
			if($this->account_login)
			{
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data["VAT"]=$this->job_m->VAT();
				$data["billing_info"]=$this->job_m->billing_info();
				$data["premium"]=$this->job_m->count_premium();
				$data["standard"]=$this->job_m->count_standard();
				$data["account"]=$this->job_m->account();
				//logout and welcom
				$data["logout_url"]="job_c/logout/home/job_thumbnail";
				// $this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("job/billing_info",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="job_c/post_job";
				$this->session->cancel="home/job_thumbnail";
				redirect("home/form_log");
			}
		}
		public function billing_info_no_standard()
		{
			if($this->account_login)
			{
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data["VAT"]=$this->job_m->VAT();
				$data["billing_info"]=$this->job_m->billing_info_no_standard();
				$data["premium"]=$this->job_m->count_premium();
				$data["standard"]=$this->job_m->count_standard();
				$data["account"]=$this->job_m->account();
				//logout and welcom
				$data["logout_url"]="job_c/logout/home/job_thumbnail";
				// $this->load->view("account_welcom/account_welcom",$data);
				$this->load->view("job/billing_info",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="job_c/post_job";
				$this->session->cancel="home/job_thumbnail";
				redirect("home/form_log");
			}
		}
		public function add_billing_info($id)
		{
			$row=$this->job_m->add_billing_info($id);
			redirect("job_c/post_job");
		}
		public function post_job_edit($id="")
		{
			if($this->account_login)
			{
				$data["acc_head"]=$this->acc->acc_head();
				$this->session->id=$id;
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$row=$this->job_m->job_code($id);
				if($row=="KJJB-000001"){$row1=$row;}else{$row1=$row->job_code;}
				$data["job_code"]=$row1;
				$num=$this->job_m->count_job_by_acc();
				if($num=="01"){$num1=$num;}
				else
				{
					$num1=str_pad(($num->numbers), 2, "0", STR_PAD_LEFT);
				}
				$data["number"]=$num1;
				//show post history
				$data['post_history']=$this->post_history();
				$data['job_setup']=$this->job_m->job_setup();
				$data["category"]=$this->job_m->category();
				$data["location"]=$this->job_m->location();
				$data["account"]=$this->job_m->account();
				$data["edit"]=$this->job_m->get_saved($id);
				$data["logout_url"]="job_c/logout/home/job_thumbnail";
				$this->load->view("job/post_job_edit",$data);
				$this->load->view('template_frontend/footer');
			}
			else
			{
				$this->session->url="job_c/post_job";
				$this->session->cancel="home/job_thumbnail";
				redirect("home/form_log");
			}
		}
		public function delete($id)
		{
			$row=$this->job_m->delete($id);
			if($row==TRUE){redirect("job_c/post_job");}
		}
	}
