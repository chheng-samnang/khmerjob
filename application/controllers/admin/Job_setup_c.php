<?php
class Job_setup_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Job Setup';
		$this->page_redirect="admin/job_setup_c";								
		$this->load->model("job_setup_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Job type","Duration","Price/job","From 2 posting job discount","Free/month");		
		$row=$this->job_setup_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/job_detail/'.$value->rate_det_id)." title='Job Detail'>".$value->rate_det_type."</a>",																																																																						
										($value->bp_duration==NULL||$value->bp_duration=='')?$value->duration. " days":$value->bp_duration." days",										
										($value->bp_price==NULL||$value->bp_price=='')?$value->price. " $":$value->bp_price." $",																														
										$value->job_2post_discount." %",
										($value->cps_duration!=NULL||$value->cps_duration!="")?$value->cps_duration." hours":"0 hour",
										$value->rate_det_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer1');
	}
	public function	job_detail($id)
	{		
		$data["detail"]=$this->job_setup_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/job_detail.php',$data);
		$this->load->view('template/footer');	
	}		
	public function add()
	{									
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;		
		$this->load->view('template/header');		
		$this->load->view('admin/job_setup_add',$data);
		$this->load->view('template/footer1');		
	}
	public function add_value()
	{
		$row=$this->job_setup_m->add();															              
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
			$data['bundle_package']=$this->job_setup_m->purchase("bundle_package");
			$data['cv_paid_search']=$this->job_setup_m->purchase("cv_paid_search");						
			$data['row']=$this->job_setup_m->index($id);
			$data['pageHeader'] = $this->pageHeader;		
			$data['cancel'] = $this->page_redirect;
			$this->load->view('template/header');				
			$this->load->view("admin/job_setup_edit",$data);
			$this->load->view('template/footer1');		
			
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{
		$row=$this->job_setup_m->edit($id);
		if($row==TRUE)
		{
			redirect("{$this->page_redirect}/");		
		}						
	}
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->job_setup_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}	
}
?>