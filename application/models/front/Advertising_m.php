<?php
class Advertising_m extends CI_Model
{			
	var $account_login;			
	public function __construct()
	{
		parent::__construct();
		$this->account_login=$this->session->acc_log1;					
	}
	public function ads_top()
	{
		$query=$this->db->query("SELECT ads_img,ads_url FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE post_ads_status='Published' AND rd.rate_det_type='Top' ORDER BY post_ads_id DESC");
		if($query->num_rows()>0){return $query->row();}		
	}
	public function right_ads()	
	{
		$query=$this->db->query("SELECT ads_img,ads_url FROM tbl_post_ads AS pads INNER JOIN tbl_rate_detail AS rd ON pads.ads_type=rd.rate_det_id WHERE post_ads_status='Published' AND rd.rate_det_type='Side' ORDER BY post_ads_id DESC");
		if($query->num_rows()>0){return $query->result();}	
	}	
}
?>
