<?php
class Search_cv_setup_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Search cv Setup';
		$this->page_redirect="admin/search_cv_setup_c";										
		$this->load->model("search_cv_setup_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Search cv type","Duration","Price","See applicant(photo,name,job position)","Full view applicant detail","Print applicant's cv out","Sent email to applicant");		
		$row=$this->search_cv_setup_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/search_cv_detail/'.$value->rate_det_id)." title='Searcg cv Detail'>".$value->rate_det_type."</a>",																																																																						
										$value->key_id==0?"Unlimited":$value->key_code." hours",										
										$value->key_id==0?"Free":$value->key_data." $",
										$value->scv_see_app_position=="1"?"Enable":"Disable",
										$value->scv_full_app_det=="1"?"Enable":"Disable",
										$value->scv_print_app_cv=="1"?"Enable":"Disable",
										$value->scv_send_email_app=="1"?"Enable":"Disable",
										$value->rate_det_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer1');
	}
	public function	search_cv_detail($id)
	{		
		$data["detail"]=$this->search_cv_setup_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/search_cv_detail.php',$data);
		$this->load->view('template/footer');	
	}		
	public function add()
	{									
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;	
		$data['cps']=$this->search_cv_setup_m->cps();		
		$this->load->view('template/header');		
		$this->load->view('admin/search_cv_setup_add',$data);
		$this->load->view('template/footer1');		
	}
	public function add_value()
	{
		$row=$this->search_cv_setup_m->add();															              
        if($row==TRUE)
        {	                		                	
			redirect("{$this->page_redirect}/");	
        }
        else $this->add();		
	}
	public function edit($id="")
	{		
		if($id!="")
		{
			$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
			$data['cps']=$this->search_cv_setup_m->cps();			
			$data['row']=$this->search_cv_setup_m->index($id);
			$data['pageHeader'] = $this->pageHeader;		
			$data['cancel'] = $this->page_redirect;
			$this->load->view('template/header');				
			$this->load->view("admin/search_cv_setup_edit",$data);
			$this->load->view('template/footer1');		
			
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{
		$row=$this->search_cv_setup_m->edit($id);
		if($row==TRUE)
		{
			redirect("{$this->page_redirect}/");		
		}						
	}
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->search_cv_setup_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}	
}
?>