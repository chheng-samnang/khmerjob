<?php
class Main_m extends CI_Model
{					
	public function __construct()
	{
		parent::__construct();						
	}
	public function index($type="")
	{
		$query=$this->db->query("SELECT COUNT(cat_id) AS value FROM tbl_category WHERE cat_type='$type'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function sub_cat($id="",$table="",$status="")
	{
		$query=$this->db->query("SELECT COUNT($id) AS value FROM $table WHERE $status='Published'");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	public function account()
	{
		$query=$this->db->query("SELECT COUNT(acc_id) AS value FROM tbl_account");
		if($query->num_rows()>0){return $query->row()->value;}
		else{return 0;}
	}
	
	
}
?>