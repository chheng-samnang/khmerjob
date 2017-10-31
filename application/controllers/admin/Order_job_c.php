<?php
class Order_job_c extends CI_Controller
{
	var $pageHeader,$page_redirect;
	public function __construct()
	{
		parent::__construct();
		$this->pageHeader='JOB';
		$this->page_redirect="admin/order_job_c";
		$this->load->model("order_job_m");
	}
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/left');
		$data['pageHeader'] = $this->pageHeader;
		$data["action_url"]=array(/*0=>"{$this->page_redirect}/add",*/1=>"{$this->page_redirect}/edit"/*,2=>"{$this->page_redirect}/delete"*//*,"{$this->page_redirect}/change_password"*/);
		$data["tbl_hdr"]=array("Job ID","Account ID","Account name","Photo","Purchase Date","Status");
		$row=$this->order_job_m->index();
		$i=0;
		if($row==TRUE)
		{
			foreach($row as $value):
			$data["tbl_body"][$i]=array(
										"<a href=".base_url($this->page_redirect.'/detail/'.$value->post_job_id)." title='Job Detail'>".$value->job_code."</a>",
										$value->acc_code,
										$value->acc_name,
										"<img class='img-thumbnail' src='".base_url("assets/uploads/".$value->acc_photo)."' style='width:70px;' />",
										date("d-m-Y",strtotime($value->posting_date)),
										$value->post_job_status,
										$value->post_job_id
									);
			$i=$i+1;
		endforeach;
		}
		$this->load->view('admin/page_view',$data);
		$this->load->view('template/footer');
	}
	public function detail($id="")
	{
		$data["detail"]=$this->order_job_m->index($id);
		$data['cancel'] = $this->page_redirect;
		$this->load->view('template/header');
		$this->load->view('template/left');
		$this->load->view('admin/order_job_detail.php',$data);
		$this->load->view('template/footer');
	}
	public function edit($id="")
	{
		if($id!="")
		{
			$row=$this->order_job_m->index($id);
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
			$row=$this->order_job_m->edit($id);
			if($row==TRUE)
            {
            	if($this->input->post("ddlStatus"=="Published"))
            	{
            		$row=$this->order_job_m->get_email($id);
            		if($row==TRUE)
            		{
            			$this->email->from('choumengit@gmail.com', 'Khmer-job');
						$this->email->to($row->acc_email);
						$this->email->subject('From Khmer-Job Notification!');
						$this->email->message('Congratulate on! Your Job was Actived!');
						$this->email->send();
            		}
            	}
				redirect("{$this->page_redirect}/");
            }
		}
	}
	public function createCtrl($row="",$option)
		{
			if($row!="")
			{
				$row1=$row->post_job_status;
			}
			//$ctrl = array();
			$ctrl = array(
							array(
									'type'=>'dropdown',
									'name'=>'ddlStatus',
									'option'=>$option,
									'selected'=>$row==""? NULL : $row1,
									'class'=>'class="form-control"',
									'label'=>'Job Status'
								),
							);
			return $ctrl;
		}
}
?>
