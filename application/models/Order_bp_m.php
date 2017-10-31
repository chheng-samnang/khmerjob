<?php
class Order_bp_m extends CI_Model
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

			// $query=$this->db->query("SELECT bp_id,bp_code,acc_code,acc_name,bp_status,acc_photo FROM tbl_bundle_package AS bp INNER JOIN tbl_account AS acc ON bp.acc_id=acc.acc_id WHERE (bp_status='Published' OR bp_status='Pending' OR bp_status='Expired') AND type!='Free' ORDER BY bp_status='Pending' DESC,bp_status ASC");
			$query=$this->db->query("SELECT bp_id,bp_code,acc_code,acc_name,bp_status,acc_photo FROM tbl_bundle_package AS bp INNER JOIN tbl_account AS acc ON bp.acc_id=acc.acc_id WHERE type!='Free' ORDER BY bp_status='Pending' DESC,bp_status ASC");
			if($query->num_rows()>0){return $query->result();}
		}
		else
		{
			$query=$this->db->query("SELECT
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount,
				acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				bp.bp_code,bp.date_from,bp.bp_status,bp.bp_action,
				s.key_code,s.key_data FROM tbl_payment_detail AS pay_det
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_bundle_package AS bp ON pay_det.post_code=bp.bp_code
				INNER JOIN tbl_account AS acc ON bp.acc_id=acc.acc_id
				INNER JOIN tbl_sysdata AS s ON bp.key_id=s.key_id
				WHERE bp.bp_id={$id}");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$status=$this->input->post("ddlStatus");
			$data= array(
					"bp_status" =>$status,
					"bp_action" =>$status=="Published"?"Done":($status=="Pending"?"Payment":"Renew"),
					"date_crea" =>date("Y-m-d"),
					 );
			$this->db->where("bp_id",$id);
			$query=$this->db->update("tbl_bundle_package",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_bundle_package AS bp ON acc.acc_id=bp.acc_id WHERE bp.bp_id='$id'");
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
			$this->db->where("bp_id",$id);
			$query=$this->db->update("tbl_cv_paid_search",$data);
			if($query==TRUE){return TRUE;}
		}
	}
}
?>
