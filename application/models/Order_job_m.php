<?php
class Order_job_m extends CI_Model
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

			$query=$this->db->query("SELECT post_job_id,job_code,acc_code,acc_name,acc_photo,posting_date,post_job_status FROM tbl_post_job AS job INNER JOIN tbl_account AS acc ON job.acc_id=acc.acc_id ORDER BY post_job_status='Pending' DESC,post_job_status ASC");
			if($query->num_rows()>0){return $query->result();}
		}
		else
		{
			$query=$this->db->query("SELECT
				pay.VAT,pay.pay_date,pay.pay_by,
				pay_det.price,pay_det.duration,pay_det.discount,
				acc.acc_code,acc.acc_name,acc.acc_company,acc.acc_gender,acc.acc_email,acc.acc_phone,acc.acc_addr,acc.acc_website,acc.acc_status,acc.acc_photo,acc.acc_desc,
				job.job_code,job.contact_name,job.phone,job.email,job.addr,job.job_title,job.job_desc,job.job_requirement,job.other_benefit,job.posting_date,job.end_date,job.contract,job.gender,job.age,job.salary_range,job.year_exp,job.edu,job.lang1,job.lang2,job.lang3,job.lang4,job.hiring_qty,job.post_job_status,job.post_job_action,
				det.rate_det_type,det.duration,det.price,cat.cat_name,loc.loc_name FROM tbl_payment_detail AS pay_det
				INNER JOIN tbl_payment AS pay ON pay_det.pay_id=pay.pay_id
				RIGHT JOIN tbl_post_job AS job ON pay_det.post_code=job.job_code
				INNER JOIN tbl_account AS acc ON job.acc_id=acc.acc_id
				INNER JOIN tbl_rate_detail AS det ON job.priority=det.rate_det_id
				LEFT JOIN tbl_category AS cat ON job.cat_id=cat.cat_id
				LEFT JOIN tbl_location as loc ON job.loc_id=loc.loc_id
				WHERE job.post_job_id={$id}");
			if($query->num_rows()>0){return $query->row();}
		}
	}
	public function edit($id)
	{
		if($id==TRUE)
		{
			$status=$this->input->post("ddlStatus");
			$data= array(
					"post_job_status" =>$status,
					"post_job_action" =>$status=="Published"?"Done":($status=="Pending"?"Payment":"Renew"),
					"date_crea" =>date("Y-m-d"),
					 );
			$this->db->where("post_job_id",$id);
			$query=$this->db->update("tbl_post_job",$data);
			if($query==TRUE){return $query;}
		}
	}
	public function get_email($id="")
	{
		$query=$this->db->query("SELECT acc_email FROM tbl_account AS acc INNER JOIN tbl_post_job AS job ON acc.acc_id=job.acc_id WHERE job.post_job_id='$id'");
		if($query->num_rows()>0){return $query->row();}
	}
}
?>
