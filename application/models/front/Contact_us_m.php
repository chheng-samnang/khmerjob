<?php
class Contact_us_m extends CI_Model
{					
	public function __construct()
	{
		parent::__construct();
	}
	public function index($id="")
	{
		if($id=="")
		{
			$this->db->order_by('cnt_us_id', 'DESC');
			$query=$this->db->get("tbl_contact_us");
			if($query->num_rows()>0){return $query->result();}			
		}
	}
	
}
?>