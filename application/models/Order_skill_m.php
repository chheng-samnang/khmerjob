<?php
class Order_skill_m extends CI_Model
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
			
			$query=$this->db->query("SELECT post_skill_id,skill_code,acc_code,acc_name,acc_photo,post_skill_status FROM tbl_post_skill AS sk INNER JOIN tbl_account AS acc ON sk.acc_id=acc.acc_id WHERE (post_skill_status='Published' OR post_skill_status='Pending') OR post_skill_status='Expired' ORDER BY post_skill_status='Pending' DESC,post_skill_status ASC");
			if($query->num_rows()>0){return $query->result();}			
		}
		else
		{
			$query=$this->db->query("SELECT post_skill_status,post_skill_id FROM tbl_post_skill AS sk 
				WHERE post_skill_id='$id'");	
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function detail($id="")
	{
		if($id!="")
		{
			$query=$this->db->query("SELECT skill_code,rate_det_type,det.duration,det.price,loc_name,cat_name,post_skill_status,service_provider,employee,sk.name,sk.addr,sk.phone,sk.email,sk.line,sk.whatapp,sk.website,sk.about_me,sk.img,googleMap,acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount
				 FROM tbl_payment_detail AS pay_det 
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_post_skill AS sk ON pay_det.post_code=sk.skill_code  
				INNER JOIN tbl_account AS acc ON sk.acc_id=acc.acc_id 
				INNER JOIN tbl_rate_detail AS det ON sk.priority=det.rate_det_id 
				LEFT JOIN tbl_category AS cat ON sk.cat_id=cat.cat_id
				LEFT JOIN tbl_location AS loc ON sk.loc_id=loc.loc_id 				
				WHERE sk.post_skill_id={$id}");	
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function detail1($id="")
	{
		$query=$this->db->query("SELECT skill_det_name FROM tbl_post_skill_detail WHERE post_skill_id='$id'");
		if($query->num_rows()>0){return $query->result();}
	}	
	public function edit($id)
	{
		if($id==TRUE)
		{									
			$status=$this->input->post("ddlStatus");
			$data= array(
					"post_skill_status" =>$status,
					"date_crea"=>date("Y-m-d"),
					"date_update"=>date("Y-m-d"),					
					 );					
			$this->db->where("post_skill_id",$id);
			$query=$this->db->update("tbl_post_skill",$data);
			if($query==TRUE){return $query;}
		}				
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_post_skill AS sk ON acc.acc_id=sk.acc_id WHERE sk.post_sk_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}		
}
?>