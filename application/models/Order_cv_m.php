<?php
class Order_cv_m extends CI_Model
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

			$query=$this->db->query("SELECT post_cv_id,cv_code,acc_code,acc_name,acc_photo,post_cv_status FROM tbl_post_cv AS cv INNER JOIN tbl_account AS acc ON cv.acc_id=acc.acc_id ORDER BY post_cv_status='Pending' DESC,post_cv_status ASC");
			if($query->num_rows()>0){return $query->result();}
		}
		else
		{
			$query=$this->db->query("SELECT
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount,
				acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				cv.cv_code,cv.position,cv.salary,cv.year_exp,cv.name,cv.photo,cv.addr,cv.phone,cv.email,cv.fb,cv.twitter,cv.G1,cv.dob,cv.pob,cv.marital_status,cv.nationality,cv.gender,cv.work_exp,cv.edu,cv.lang,cv.computer,cv.other_skill,cv.short_course,cv.ref,cv.hobby,cv.about_me,cv.post_cv_status,
				det.rate_det_type,det.duration,det.price,cat.cat_name FROM tbl_payment_detail AS pay_det
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_post_cv AS cv ON pay_det.post_code=cv.cv_code
				INNER JOIN tbl_account AS acc ON cv.acc_id=acc.acc_id
				INNER JOIN tbl_rate_detail AS det ON cv.priority=det.rate_det_id
				LEFT JOIN tbl_category AS cat ON cv.cat_id=cat.cat_id
				WHERE cv.post_cv_id={$id}");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$status=$this->input->post("ddlStatus");
			$data= array(
					"post_cv_status" =>$status,
					"date_crea"=>date("Y-m-d"),
					"date_update"=>date("Y-m-d"),
					 );
			$this->db->where("post_cv_id",$id);
			$query=$this->db->update("tbl_post_cv",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_post_cv AS cv ON acc.acc_id=cv.acc_id WHERE cv.post_cv_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
}
?>
