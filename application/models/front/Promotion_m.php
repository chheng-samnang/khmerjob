<?php
class Promotion_m extends CI_Model
{					
	public function __construct()
	{
		parent::__construct();
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$this->db->where("key_type",'promotion');
			$this->db->order_by('key_id', 'ASC');
			$query=$this->db->get("tbl_sysdata");
			if($query->num_rows()>0){return $query->result();}			
		}
	}
}
?>