<?php
class Pay_walk_in_c extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();											
		$this->load->model("pay_walk_in_m");
	}
	public function index($error_msg="")
	{	$data["error_msg"]=$error_msg;
		$this->load->view('template/header');
		$this->load->view('template/left');												
		$this->load->view('admin/pay_walk_in',$data);
		$this->load->view('template/footer1');
	}
	public function validation()
	{		
		$this->form_validation->set_rules('acc_code','Account ID','trim|required');		
		$this->form_validation->set_rules('post_type','Post Type','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}		
	public function add()
	{
		if($this->validation()==TRUE)
		{	
			$acc_code=$this->input->post("acc_code");
			$data["acc_info"]=$this->pay_walk_in_m->account($acc_code);
			if(($data["acc_info"])!='')
			{
				$type=$this->input->post("post_type");
				$err['error_msg']="Your Account ID and Post type are Invalid!";
				$data["post_type"]=$this->input->post("post_type");
				$data["top"]=$this->pay_walk_in_m->count_top();
				$data["side"]=$this->pay_walk_in_m->count_side();
				if($row=$this->pay_walk_in_m->$type()==TRUE)
				{	$data["VAT"]=$this->pay_walk_in_m->VAT();
					$data["premium"]=$this->pay_walk_in_m->count_premium();
					$data["standard"]=$this->pay_walk_in_m->count_standard();
					$this->load->view('template/header');
					$this->load->view('template/left');	

					if($type=="job")
					{	
						$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view('admin/job_ads_pay_walk_in_detail',$data);
					}elseif($type=="ads")
					{	
						$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view('admin/job_ads_pay_walk_in_detail',$data);	
					}elseif($type=="cv")
					{	
						$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view('admin/cv_skill_pay_walk_in_detail',$data);
					}
					elseif($type=="skill")
					{
						$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view('admin/cv_skill_pay_walk_in_detail',$data);
					}elseif($type=="bp")
					{	$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view("admin/bp_pay_walk_in_detail",$data);
					}else
					{	$data['val']=$this->pay_walk_in_m->$type();
						$this->load->view("admin/cps_pay_walk_in_detail",$data);
					}

					$this->load->view('template/footer1');
				}
				else
				{
					$this->load->view('template/header');
					$this->load->view('template/left');												
					$this->load->view('admin/pay_walk_in',$err);
					$this->load->view('template/footer1');
				}				
			}else{ $this->index("Your Account ID and Post type are Invalid!");}
		}
		else{$this->index();}																	
	}	
	public function pay_walk_validation()
	{	
		$this->form_validation->set_rules('txtSubtotal','Subtotal','trim|required');		
		$this->form_validation->set_rules('txtDiscount','Discount','trim|required');
		$this->form_validation->set_rules('txtTotal','tTotal','trim|required');
		$this->form_validation->set_rules('VAT','VAT','trim|required');
		$this->form_validation->set_rules('txtGandTotal','GandTotal','trim|required');
		$this->form_validation->set_rules('txtCash','Cash','trim|required');
		$this->form_validation->set_rules('txtEchange','txtEchange','trim|required');
		$this->form_validation->set_rules('txtExtotal','Extotal','trim|required');
		if($this->form_validation->run()==TRUE){return TRUE;}
		else{return FALSE;}
	}
    public function addPay_walk()
    {
    	if($this->pay_walk_validation()==TRUE)
    	{	
    		$row=$this->pay_walk_in_m->addPay_walk();
    		if($row==TRUE){$this->index();}
    	}else{$this->add();}
    }
}
?>