<?php
class Skill_setup_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Skill Setup';
		$this->page_redirect="admin/skill_setup_c";										
		$this->load->model("skill_setup_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(0=>"{$this->page_redirect}/add",1=>"{$this->page_redirect}/edit",2=>"{$this->page_redirect}/delete"/*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Skill type","Duration","Price/skill","Homepage display","Toprow display","Photo/logo space display");		
		$row=$this->skill_setup_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/skill_detail/'.$value->rate_det_id)." title='Skill Detail'>".$value->rate_det_type."</a>",																																																																						
										$value->duration==0?"Unlimited":$value->duration." days",										
										$value->price==0?"Free":$value->price." $",
										$value->homepage_display=="1"?"Enable":"Disable",
										$value->toprow_display=="1"?"Enable":"Disable",
										$value->photo_space_display=="1"?"Enable":"Disable",
										$value->rate_det_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer1');
	}
	public function	skill_detail($id)
	{		
		$data["detail"]=$this->skill_setup_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/skill_detail.php',$data);
		$this->load->view('template/footer');	
	}		
	public function add()
	{									
		$data['action'] = "{$this->page_redirect}/add_value";
		$data['pageHeader'] = $this->pageHeader;		
		$data['cancel'] = $this->page_redirect;		
		$this->load->view('template/header');		
		$this->load->view('admin/skill_setup_add',$data);
		$this->load->view('template/footer1');		
	}
	public function add_value()
	{
		$row=$this->skill_setup_m->add();															              
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
			$data['row']=$this->skill_setup_m->index($id);
			$data['pageHeader'] = $this->pageHeader;		
			$data['cancel'] = $this->page_redirect;
			$this->load->view('template/header');				
			$this->load->view("admin/skill_setup_edit",$data);
			$this->load->view('template/footer1');		
			
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{
		$row=$this->skill_setup_m->edit($id);
		if($row==TRUE)
		{
			redirect("{$this->page_redirect}/");		
		}						
	}
	public function delete($id="")
	{
		if($id!="")
		{
			$row=$this->skill_setup_m->delete($id);
			if($row==TRUE){redirect("{$this->page_redirect}/");}
		}
		else{return FALSE;}
	}	
}
?>