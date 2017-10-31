<?php
class Ads_setup_m extends CI_Model
{						
	public function __construct()
	{
		parent::__construct();					
	}
	public function index($id="")
	{
		if($id=="")
		{			

			$query=$this->db->query("SELECT rate_det_id,rate_det_type,duration,price,key_code,key_type,ads_size,ads_discount FROM tbl_rate_detail AS rd INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id INNER JOIN tbl_sysdata AS sd ON rd.free_per_month=sd.key_id ORDER BY rd.rate_det_id DESC");			

			if($query->num_rows()>0){return $query->result();}			
		}
	}
	public function rate_desc()
		{
			$query=$this->db->query("SELECT rate_desc FROM tbl_rate WHERE 
				rate_type ='ads' ORDER BY rate_id DESC limit 1");
			if($query->num_rows()>0){ return $query->result();}
		}//select rate description
}
?>
