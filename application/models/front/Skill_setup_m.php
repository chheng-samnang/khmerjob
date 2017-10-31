<?php
class Skill_setup_m extends CI_Model
{				
	public function __construct()
	{
		parent::__construct();
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT rate_det_id,rate_det_type,duration,price,homepage_display,toprow_display,photo_space_display FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id WHERE r.rate_type='skill' ORDER BY rd.rate_det_id DESC");
			if($query->num_rows()>0){return $query->result();}			
		}
	}
	public function rate_desc()
	{
		$query=$this->db->query("SELECT rate_desc FROM tbl_rate WHERE rate_type ='skill' ORDER BY rate_id DESC limit 1");
		if($query->num_rows()>0){return $query->result();}

	}//select rate description			
}
?>
