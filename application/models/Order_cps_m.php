<?php
class Order_cps_m extends CI_Model
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

			$query=$this->db->query("SELECT cps_id,cps_code,acc_code,acc_name,acc_photo,cps_status FROM tbl_cv_paid_search AS cps INNER JOIN tbl_account AS acc ON cps.acc_id=acc.acc_id WHERE type!='Free' ORDER BY cps_status='Pending' DESC,cps_status ASC");
			if($query->num_rows()>0){return $query->result();}
		}
		else
		{
			$query=$this->db->query("SELECT
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount,
				acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				cps.cps_code,cps.date_from,cps.cps_status,cps.cps_action,
				s.key_code,s.key_data FROM tbl_payment_detail AS pay_det
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_cv_paid_search AS cps ON pay_det.post_code=cps.cps_code
				INNER JOIN tbl_account AS acc ON cps.acc_id=acc.acc_id
				INNER JOIN tbl_sysdata AS s ON cps.hour=s.key_code
				WHERE cps.cps_id={$id} AND key_type='cv_paid_search'");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$status=$this->input->post("ddlStatus");
			$data= array(
					"cps_status" =>$status,
					"cps_action" =>$status=="Published"?"Done":($status=="Pending"?"Payment":"Renew")
					 );
			$this->db->where("cps_id",$id);
			$query=$this->db->update("tbl_cv_paid_search",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_cv_paid_search AS cps ON acc.acc_id=cps.acc_id WHERE cps.cps_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
}
?>
