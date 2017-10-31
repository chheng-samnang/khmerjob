<?php
class Order_bp_c extends CI_Controller
{
	var $pageHeader,$page_redirect;	
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='Bundle Package';
		$this->page_redirect="admin/Order_bp_c";								
		$this->load->model("order_bp_m");
	}
	public function index()
	{		
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(/*0=>"{$this->page_redirect}/add",*/1=>"{$this->page_redirect}/edit"/*,2=>"{$this->page_redirect}/delete"*//*,"{$this->page_redirect}/change_password"*/);							
		$data["tbl_hdr"]=array("Bundle Package ID","Account ID","Account name","Photo","Status");		
		$row=$this->order_bp_m->index();		
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(				
										"<a href=".base_url($this->page_redirect.'/detail/'.$value->bp_id)." title='Bundle Package Detail'>".$value->bp_code."</a>",																																																																										
										$value->acc_code,
										$value->acc_name,
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$value->acc_photo)."' style='width:70px;' />",																														
										$value->bp_status,										
										$value->bp_id
									);
			$i=$i+1;
		endforeach;
		}											
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function detail($id="")
	{
		$data["detail"]=$this->order_bp_m->index($id);		
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');		
		$this->load->view('admin/order_bp_detail.php',$data);
		$this->load->view('template/footer');	
	}				
	public function edit($id="")
	{		
		if($id!="")
		{
			$row=$this->order_bp_m->index($id);			
			if($row==TRUE)
			{		
				$option= array('Pending'=>'Pending','Published'=>'Published','Expired'=>'Expired');																																			
				$data['ctrl'] = $this->createCtrl($row,$option);			
				$data['action'] = "{$this->page_redirect}/edit_value/{$id}";
				$data['pageHeader'] = $this->pageHeader;		
				$data['cancel'] = $this->page_redirect;
				$this->load->view('template/header');
				$this->load->view('template/left');
				$this->load->view("admin/page_edit",$data);
				$this->load->view('template/footer');
			}
		}
		else{return FALSE;}
	}
	public function edit_value($id="")
	{		
		if(isset($_POST["btnSubmit"]))
		{									
			$row=$this->order_bp_m->edit($id);	
			if($row==TRUE)
            {
            	if($this->input->post("ddlStatus"=="Published"))
            	{
            		$row=$this->order_bp_m->get_email($id);
            		if($row==TRUE)
            		{
            			$this->email->from('choumengit@gmail.com', 'Khmer-job');
						$this->email->to($row->acc_email);				
						$this->email->subject('From Khmer-Job Notification!');
						$this->email->message('Congratulate on! Your Bundle Package was Actived!');
						$this->email->send();
            		}            		
            	} 
            	$this->order_bp_m->edit_cps_free($id);	                		                	
				redirect("{$this->page_redirect}/");	
            }																												 																				            	                	                                																					
		}
	}		
	public function createCtrl($row="",$option)
		{	
			if($row!="")
			{								
				$row1=$row->bp_status;																																	
			}											
			//$ctrl = array();
			$ctrl = array(																					
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'option'=>$option,
									'selected'=>$row==""? NULL : $row1,																		
									'class'=>'class="form-control"',
									'label'=>'Bundle Package Status'
								),
							);
			return $ctrl;
		}
}
?>