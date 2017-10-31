<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Home extends CI_Controller
	{
	    var $account_login;
		private $thumbnail_url="";
		function __construct(){
			parent::__construct();
			$this->load->model('front/account_m','acc');
			$this->load->model('front/contact_us_m','ct');
			$this->load->model('front/about_us_m','au');
			$this->load->model('front/ads_setup_m',"ads");
			$this->load->model('front/promotion_m',"pt");
			$this->load->model('front/FAQ_m');
			$this->load->model('front/cv_setup_m');
			$this->load->model("front/search_cv_setup_m");
			$this->load->model("front/search_job_setup_m");
			$this->load->model("front/skill_setup_m");
			$this->load->model("front/search_skill_setup_m");
			$this->load->model("front/job_setup_m");
			$this->load->model("terms_of_use_m");
			$this->load->model("privacy_policy_m");
			//don't delete below
			
      		$this->load->model('front/job_m');
      		$this->load->model('front/cv_m');
      		$this->load->model('front/skill_m');
      		$this->load->model('front/home_m');
      		$this->load->model('front/advertising_m');
      		$this->account_login=$this->session->acc_log1;
					
		}
		public function process_payment(){$this->load->view("process_payment");}

		public function index()
		{
		    $data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$data['acc_info'] = $this->acc->index();//slect tbl_account
				$data["premium_job"]=$this->home_m->premium_job();
				$data["premium_cv"]=$this->home_m->premium_cv();
				$data["premium_skill"]=$this->home_m->premium_skill();
				$data["feature_emp"]=$this->home_m->feature_emp();
				$data["feature_recruit"]=$this->home_m->feature_recruit();
				$data["right_ads"]=$this->advertising_m->right_ads();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$this->load->view('template_frontend/cv_job_skill');
				$this->load->view('content_home_page',$data);
				$this->load->view('template_frontend/advertising',$data);
				$this->load->view('template_frontend/footer');
			//var_dump($this->session->acc_log);
		}
		public function home_search()
		{
			$filter=$this->input->post("ddlFilterSearch");
			$value_search=$this->input->post("txtSearch");
			if($filter=='job'){$this->job_thumbnail($value_search);}
			elseif($filter=='cv'){$this->cv_thumbnail($value_search);}
			elseif($filter=='skill'){$this->skill_thumbnail($value_search);}
		}
		public function cv_thumbnail($id="")
		{	
			$this->session->active_id=$id;
			$data["ads_top"]=$this->advertising_m->ads_top();
			$data["acc_head"]=$this->acc->acc_head();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="cv_c/post_cv";
			$data['cv_category']=$this->cv_m->index();
			$data['sub_category']=$this->cv_m->sub_category($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["premium_cv"]=$this->home_m->premium_cv();
			$this->load->view('cv/cv_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);
			$this->load->view('template_frontend/footer');

		}
		public function job_thumbnail($id="",$acc_id="")
		{	
			if($acc_id=="")
			{ 

				$this->session->active_id=$id;
				$data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data['thumbnail_url']=$this->thumbnail_url="job_c/post_job";
				$data['job_location']=$this->job_m->location();
				$data['job_category']=$this->job_m->index();
				$data['sub_category']=$this->job_m->sub_category($id);
				$data["right_ads"]=$this->advertising_m->right_ads();
				$data["feature_emp"]=$this->home_m->feature_emp();
				$data["feature_recruit"]=$this->home_m->feature_recruit();

				$this->load->view('job/job_search_v',$data);
				$this->load->view('template_frontend/advertising',$data);
				$this->load->view('template_frontend/footer');
			}else{
				$this->session->active_id=$id;
			    $data["acc_head"]=$this->acc->acc_head();
				$data["ads_top"]=$this->advertising_m->ads_top();
				$this->load->view("template_frontend/herder_and_nav",$data);
				$data['thumbnail_url']=$this->thumbnail_url="job_c/post_job";
				$data['job_location']=$this->job_m->location();
				$data['job_category']=$this->job_m->index();
				$data['sub_category']=$this->job_m->sub_category_by_acc_id($acc_id);
				$data["right_ads"]=$this->advertising_m->right_ads();
				$data["feature_emp"]=$this->home_m->feature_emp();
				$data["feature_recruit"]=$this->home_m->feature_recruit();
				$this->load->view('job/job_search_v',$data);
				$this->load->view('template_frontend/advertising',$data);
				$this->load->view('template_frontend/footer');
			}

		}
		public function skill_thumbnail($id="")
		{
			$this->session->active_id=$id;
			$data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="skill_c/post_skill";
			$data['skill_location']=$this->skill_m->location();
			$data['skill_category']=$this->skill_m->get_category();
			$data['sub_category']=$this->skill_m->get_subCategory($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["premium_skill"]=$this->home_m->premium_skill();
			$this->load->view('skill/skill_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);
			$this->load->view('template_frontend/footer');
		}
		public function job_thumbnail_freature($id="")
		{	$this->session->active_id=$id;
		    $data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$data['thumbnail_url']=$this->thumbnail_url="job_c/post_job";
			$data['job_location']=$this->job_m->location();
			$data['job_category']=$this->job_m->index();
			$data['sub_category']=$this->job_m->feature($id);
			$data["right_ads"]=$this->advertising_m->right_ads();
			$data["feature_emp"]=$this->home_m->feature_emp();
			$data["feature_recruit"]=$this->home_m->feature_recruit();
			$this->load->view('job/job_search_v',$data);
			$this->load->view('template_frontend/advertising',$data);
			$this->load->view('template_frontend/footer');
		}

		public function service($value)
		{
		    $data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('template_frontend/cv_job_skill');
			if($value=="p_cv")
			{
				$data["row"]=$this->cv_setup_m->index();
				$data["desc"]=$this->cv_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('cv_setup',$data);}
			}else if($value=="s_cv")
			{
				$data["row"]=$this->search_cv_setup_m->index();
				$data["desc"]=$this->search_cv_setup_m->rate_desc();
				if($data["row"]!=""){$this->load->view('search_cv_setup',$data);}

			}else if($value=="p_job")
			{
				$data["row"]=$this->job_setup_m->index();
				$data["desc"]=$this->job_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('job_setup',$data);}

			}else if($value=="s_job")
			{
				$data["row"]=$this->search_job_setup_m->index();
				if($data["row"]==TRUE){$this->load->view('search_job_setup',$data);}
			}else if($value=="p_skill")
			{
				$data["row"]=$this->skill_setup_m->index();
				$data["desc"]=$this->skill_setup_m->rate_desc();
				if($data["row"]==TRUE){$this->load->view('skill_setup',$data);}
			}else
			{
				$data["row"]=$this->search_skill_setup_m->index();
				if($data["row"]==TRUE){$this->load->view('search_skill_setup',$data);}
			}

			$this->load->view('template_frontend/footer');
		}
		public function promotion()
		{
		    $data["acc_head"]=$this->acc->acc_head();
			$data["promotion"]=$this->pt->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["promotion"]==TRUE){
			$this->load->view('promotion',$data);
			}
			$this->load->view('template_frontend/footer');
		}
		public function advertise_rate()
		{
		    $data["acc_head"]=$this->acc->acc_head();
			$data["ads"]=$this->ads->index();
			$data["desc"]=$this->ads->rate_desc();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('template_frontend/cv_job_skill');
			if($data["ads"]==TRUE){
				$this->load->view("advertise_rate",$data);
			}
			$this->load->view('template_frontend/footer');
		}
		public function payment(){
		    $data["acc_head"]=$this->acc->acc_head();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('template_frontend/cv_job_skill');
			$this->load->view('template_frontend/footer');
		}
		public function form_log($msg=""){
			$data["error"]=$msg ;
			$this->load->view("acc_log",$data);
		}
		public function acc_log()
		{
			$this->form_validation->set_rules('txtEmail','Email','required');
			$this->form_validation->set_rules('txtPassword','Password','required');
			if($this->form_validation->run()==false){
				$this->load->view("acc_log");
			}else
			{
				$email = $this->input->post('txtEmail');
				$pass = $this->input->post('txtPassword');
				$result = $this->acc->validateemail($email);

				if($result==0)
				{
					$this->form_log('incorrect email / password..!');
				}else
				{
					$result = $this->acc->validatePassword($pass,$email);

					if($result!==0)
					{
						$this->session->acc_log1 = $result->acc_id;
						$this->session->acc_name = $result->acc_name;
						if(isset($this->session->url)){
							redirect($this->session->url);
						}else{
							redirect("home");
						}
					}else
					{
						$this->form_log('incorrect email / password..!');
					}
				}
			}
		}
		public function about()
		{
		    $data["acc_head"]=$this->acc->acc_head();
			$data["about"]=$this->au->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["about"]==TRUE){
			$this->load->view('about',$data);
			}
			$this->load->view("template_frontend/footer");
		}
		public function contact_us($error="")
		{	$data["error"]=$error;
		    $data["acc_head"]=$this->acc->acc_head();
			$data["contacts"] = $this->ct->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["contacts"]==TRUE){
			$this->load->view('contact_us',$data);
			}
			$this->load->view('template_frontend/footer');
		}
		public function send_email()
		{
			$this->form_validation->set_rules('txtName','Name','required');
			$this->form_validation->set_rules('txtYourEmail','Email','required');
			$this->form_validation->set_rules('areaMessage','Massage','required');
			if($this->form_validation->run()==TRUE)
			{
				$email=$this->input->post('txtYourEmail');
				$row=$this->acc->validateemail($email);
				if($row==true){
					$this->email->from($this->input->post('txtYourEmail'));
					$this->email->to('Khmerjob@gmail.com');
					$this->email->subject($this->input->post('txtSubject'));
					$this->email->message($this->input->post('areaMessage'));
					$this->email->send();
				}else{
				 $this->contact_us('your email invalides');
				}
			}else{$this->contact_us();}
		}
		public function FAQ()
		{
		    $data["acc_head"]=$this->acc->acc_head();
			$data["FAQ"] = $this->FAQ_m->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["FAQ"]==TRUE){
				$this->load->view('FAQ',$data);
			}
			$this->load->view("template_frontend/footer");
		}
		public function privacy_policy(){
			$data["acc_head"]=$this->acc->acc_head();
			$data["privacy_policy"] = $this->privacy_policy_m->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["privacy_policy"]==TRUE){
				$this->load->view('privacy_policy',$data);
			}
			$this->load->view("template_frontend/footer");
		}
		public function term_of_use(){
			$data["acc_head"]=$this->acc->acc_head();
			$data["term_of_use"] = $this->terms_of_use_m->index();
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			if($data["term_of_use"]==TRUE){
				$this->load->view('terms_of_use',$data);
			}
			$this->load->view("template_frontend/footer");
		}
		public function send_mail($email,$username,$acc_id)
		{
			$config = Array(
							  'mailtype' => 'html',
							  'charset' => 'iso-8859-1',
							  'wordwrap' => TRUE
							);
			$this->load->library('email',$config);
			$this->email->initialize($config);
			$this->email->from('info@khmer-job.com', 'Khmer Job');
			$this->email->to($email);
            $message = "";
			$message .= "<div style='border:1px solid grey; padding:20px;background:#efefef'>";
			$message .= "<p>Hello $username,</p>";
			$message .= "<p>Click this link to reset your old password:</p>";
			$message .= base_url()."Home/reset_password/".$acc_id;
			$message .= "</div>";
			$this->email->subject('Reset Password');
			$this->email->message($message);

			$this->email->send();
			echo $this->email->print_debugger();
		}

		public function forgot_password()
		{
			if(isset($_POST["btnSubmit"]))
			{
				$email = $this->input->post("txtEmail");
				$data["email"] = $email;
				$username = $this->acc->get_acc_name($email);
				$accID = $this->acc->get_acc_id($email);
				$this->send_mail($email,$username,$accID);
				$this->load->view("inbox",$data);
			}else {
				$this->load->view("forgot_password");
			}

		}

		public function reset_password($acc_id)
		{
			if(isset($_POST["btnSave"]))
			{
				$result = $this->acc->reset_password($acc_id);
				redirect(base_url());
			}else
			{
				$data["acc_id"] = $acc_id;
				$this->load->view("reset_password",$data);
			}
		}

		public function log_out()
	    {
	      $logout_url=$this->uri->segment(3)."/".$this->uri->segment(4);
	      $this->session->unset_userdata('acc_log1');
	      $this->session->unset_userdata('register');
	      $this->session->unset_userdata('start_count');
	      redirect($logout_url);
	    }
	}//end class
