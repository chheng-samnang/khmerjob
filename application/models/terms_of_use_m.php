<?php
class terms_of_use_m extends CI_Model
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
			$this->db->order_by('id', 'DESC');
			$query=$this->db->get("tbl_terms_of_use");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$this->db->where("id",$id);
			$query=$this->db->get("tbl_terms_of_use");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function add()
	{
		$data= array(
						"descr" => $this->input->post("taeDescr"),
						"user_crea" => $this->userCrea,
						"date_crea" => date('Y-m-d')
						 );
		$query=$this->db->insert("tbl_terms_of_use",$data);		
		if($query){return $query;}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{			
			$data= array(
					"descr" => $this->input->post("taeDescr"),
						"user_updae" => $this->userCrea,
						"date_updae" => date('Y-m-d')
					 );				
			$this->db->where("id",$id);
			$query=$this->db->update("tbl_terms_of_use",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function delete($id)
	{
		if($id==TRUE)
		{						
			$this->db->where("id",$id);
			$query=$this->db->delete("tbl_terms_of_use");
			if($query==TRUE){return $query;}
		}
	}
	
}
?>