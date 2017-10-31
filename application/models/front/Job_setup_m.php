<?php
class Job_setup_m extends CI_Model
{			
	public function __construct()
	{
		parent::__construct();
	}
	public function index($id="")
	{
		if($id=="")

		{						
			$query=$this->db->query("SELECT CONCAT(s1.key_code) AS cps_duration,CONCAT(s.key_code) AS bp_duration,CONCAT(s.key_data) AS bp_price,rate_det_id,rate_det_type,rd.rate_id,duration,price,job_2post_discount,job_alert_job_to_cv,job_receive_cv_app,job_alert_job_to_register,job_fb_boosting,homepage_display,toprow_display,job_com_logo_display,free_per_month_job,bp_for_job,r.user_crea,r.date_crea,r.user_updt,r.date_updt,r.rate_desc
				FROM tbl_rate_detail AS rd 
				INNER JOIN tbl_rate AS r ON rd.rate_id=r.rate_id 
				LEFT JOIN tbl_sysdata AS s ON rd.bp_for_job=s.key_id 
				LEFT JOIN tbl_sysdata AS s1 ON rd.free_per_month_job=s1.key_id 
				WHERE r.rate_type='job' ORDER BY rd.rate_det_id DESC");

			if($query->num_rows()>0){return $query->result();}			
		}
	}
	public function rate_desc()
	{
		$query=$this->db->query("SELECT rate_desc FROM tbl_rate WHERE rate_type ='job' ORDER BY rate_id DESC limit 1");
		if($query->num_rows()>0){return $query->result();}

	}//select rate description
}
?>
