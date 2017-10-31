<?php
class Promotion_m extends CI_Model
{			
	var $userCrea;		
	public function __construct()
	{
		parent::__construct();
		$this->userCrea = isset($this->session->userLogin)?$this->session->userLogin:"N/A";				
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$this->db->where("key_type",'promotion');
			$this->db->order_by('key_id', 'DESC');
			$query=$this->db->get("tbl_sysdata");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("key_id",$id);
			$query=$this->db->get("tbl_sysdata");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{
		$data= array(	
						"key_code" => $this->input->post("txtBannerName"),
						"key_data" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",					
						"key_data2" => $this->input->post("txtDesc"),
						"key_type"	=>'promotion',						
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_sysdata",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			if(!empty($this->input->post('txtImgName')))
			{		
				$row=$this->index($id);			
				unlink("assets/uploads/".$row->key_data);	
				$data= array(
					"key_code" => $this->input->post("txtBannerName"),
					"key_data" =>!empty($this->input->post('txtImgName'))?$this->input->post('txtImgName'):"",						
					"key_data2" => $this->input->post("txtDesc"),
					"key_type"	=>'promotion',					
					"user_updt" => $this->userCrea,
					"date_updt" => date('Y-m-d')
					 );	
			}
			else
			{
				$data= array(
					"key_code" => $this->input->post("txtBannerName"),					
					"key_data2" => $this->input->post("txtDesc"),
					"key_type"	=>'promotion',					
					"user_updt" => $this->userCrea,
					"date_updt" => date('Y-m-d')
					 );	
			}	
			$this->db->where("key_id",$id);
			$query=$this->db->update("tbl_sysdata",$data);
			if($query==TRUE){return $query;}
		}				
	}	
	public function delete($id)
	{
		if($id==TRUE)
		{	
			$row=$this->index($id);			
			unlink("assets/uploads/".$row->key_data);					
			$this->db->where("key_id",$id);
			$query=$this->db->delete("tbl_sysdata");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>