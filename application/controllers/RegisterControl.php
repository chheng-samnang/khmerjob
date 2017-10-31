<?php
	class RegisterControl extends CI_Controller
	{
		public function __construct()
		{	
			parent::__construct();
			$this->pageHeader='Member';		
			$this->page_redirect="registerControl";							
			$this->load->model("front/account_m","am");
			$this->load->model('front/advertising_m');			
			$this->load->library("image_lib");
			$this->load->helper(array('captcha'));
			
		}

		function index(){
			$row=$this->am->account_code();
			if($row==TRUE){ $data["acc_code"] = $row->acc_code;}else{
				$data["acc_code"] ='KJ-000000';
			}
			$data['action'] = "{$this->page_redirect}/add";		
			$data['pageHeader'] = $this->pageHeader;
			$data['cancel'] = "{$this->page_redirect}/acc_log";	
			$data["ads_top"]=$this->advertising_m->ads_top();
			$this->load->view("template_frontend/herder_and_nav",$data);
			$this->load->view('register/register',$data);
			$this->load->view('template/footer1');
		}// redirect to register page
		function add()
		{	
			$this->form_validation->set_rules('txtAccPass',' password','required');	
			$this->form_validation->set_rules('txtConPasswd','Confirm','required');
			$this->form_validation->set_rules('txtAccName','Name','required');	
			$this->form_validation->set_rules('txtAddr','Address','required');
			$this->form_validation->set_rules('txtEmail','Email','required');	
			$this->form_validation->set_rules('txtDesc','Description','required');
			$this->form_validation->set_rules('txtPhone','Number','required');	
			if($this->form_validation->run()==false){
				$this->index();
			}else{
				$result = $this->am->add();
				if(!$result==""){
					redirect($this->session->url);
				}
			}
	}
}
?>