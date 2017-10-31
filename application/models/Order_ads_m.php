<?php
class Order_ads_m extends CI_Model
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
			
			$query=$this->db->query("SELECT post_ads_id,ads_code,acc_code,acc_name,acc_photo,post_ads_status FROM tbl_post_ads AS ads INNER JOIN tbl_account AS acc ON ads.acc_id=acc.acc_id WHERE (post_ads_status='Published' OR post_ads_status='Pending') OR post_ads_status='Expired' ORDER BY post_ads_status='Pending' DESC,post_ads_status ASC");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT 
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount,				
				acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				ads.ads_code,ads.post_ads_date,ads.ads_img,ads.ads_url,ads.post_ads_status,ads.post_ads_action,
				det.rate_det_type,det.duration,det.price FROM tbl_payment_detail AS pay_det 
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_post_ads AS ads ON pay_det.post_code=ads.ads_code  
				INNER JOIN tbl_account AS acc ON ads.acc_id=acc.acc_id 
				INNER JOIN tbl_rate_detail AS det ON ads.ads_type=det.rate_det_id 				 				
				WHERE ads.post_ads_id={$id}");	
			if($query->num_rows()>0){return $query->row();}
		}
	}	
	public function edit($id)
	{
		if($id==TRUE)
		{			
			$status=$this->input->post("ddlStatus");
			$data= array(
					"post_ads_status" =>$status,
					"post_ads_action" =>$status=="Published"?"Done":($status=="Pending"?"Payment":"Renew"),
					"date_crea" =>date("Y-m-d"),
					 );				
			$this->db->where("post_ads_id",$id);
			$query=$this->db->update("tbl_post_ads",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_post_ads AS ads ON acc.acc_id=ads.acc_id WHERE ads.post_ads_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
	public function edit_cps_free($id="")
	{
		if($id==TRUE)
		{												
			$data= array(
					"date_from" =>date("Y-m-d"),
					"cps_status"=>"Published",
					"cps_action"=>"Done",					
					 );					
			$this->db->where("ads_id",$id);			
			$query=$this->db->update("tbl_cv_paid_search",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function edit_bp_free($id="")
	{
		if($id==TRUE)
		{												
			$data= array(					
					"date_crea" =>date("Y-m-d"),
					"bp_status"=>"Published",
					"bp_action"=>"Done",					
					 );					
			$this->db->where("ads_id",$id);			
			$query=$this->db->update("tbl_bundle_package",$data);
			if($query==TRUE){return $query;}
		}				
	}		
}
?>