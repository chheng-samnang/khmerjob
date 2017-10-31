<?php
class Search_cv_setup_m extends CI_Model
{					
	public function __construct()
	{
		parent::__construct();
	}
	public function index($id="")
	{
		if($id=="")
		{			
			$query=$this->db->query("SELECT s.key_code,s.key_data,rate_det_id,rate_det_type,scv_see_app_position,scv_full_app_det,scv_print_app_cv,scv_send_email_app FROM tbl_rate_detail AS rd 
				LEFT JOIN tbl_sysdata AS s ON rd.duration=s.key_id
				INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id 
				WHERE r.rate_type='search_cv' 
				ORDER BY s.key_data ASC");
			if($query->num_rows()>0){return $query->result();}			
		}
	}	
	public function rate_desc()
	{
		$query=$this->db->query("SELECT rate_desc FROM tbl_rate WHERE 
			rate_type ='search_cv' ORDER BY rate_id DESC limit 1");
		if($query->num_rows()>0){return $query->result();}

	}//select rate description		
	 
}
?>
